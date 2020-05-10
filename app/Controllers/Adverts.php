<?php


namespace App\Controllers;


use App\Models\AdvertModel;
use CodeIgniter\HTTP\Files\UploadedFile;

class Adverts extends BaseController
{
    public function index()
    {
        helper(['html']);
        /** @var $advModel AdvertModel **/
        $advModel = new AdvertModel();
        $adverts = $advModel->findByUser(session()->get('id'));

        $data = array(
            'title' => 'Объявления',
            'adverts' => $adverts,
            );

        return view('admin/adverts', $data);
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function create()
    {
        try {
            $advModel = new AdvertModel();
            $data = array(
                'title' => 'Добавить новое бъявление',
                'user_id' => session()->get('id'),
                'author' => session()->get('first_name') . ' ' . session()->get('last_name'),
            );

            if ($this->request->getMethod() == 'post') {
                $validationRules    = [
                    'user_id' => 'required|integer',
                    'title' => 'required|min_length[3]',
                    'author' => 'required|min_length[3]',
                    'description' => 'required|min_length[3]',
                    'thumbnail' => 'uploaded[thumbnail]|mime_in[thumbnail,image/jpg,image/jpeg,image/gif,image/png]|max_size[thumbnail,4096]'
                ];

                if (!$this->validate($validationRules)) {
                    $data['validation'] = $this->validator;
                } else {
                    $file = $this->uploadImage($this->request->getFile('thumbnail'), 'uploads');

                    $newAdvert = array(
                        'user_id' => $this->request->getPost('user_id'),
                        'title' => $this->request->getPost('title'),
                        'description' => $this->request->getPost('description'),
                        'thumbnail' => $file,
                        'author' => $this->request->getPost('author'),
                    );

                    $advModel->save($newAdvert);
                    session()->setFlashdata('success','Объявление успешно созданно');
                    return redirect()->to('/adverts');
                }
            }

            return view('admin/advert_form', $data);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }

    private function uploadImage(UploadedFile $file, string $pathToSave)
    {
        /** @var $fileName string **/
        $fileName = uniqid('adv_');
        $fileExt = $file->getExtension();
        $fullname = $fileName . '.' . $fileExt;
        $file->move(FCPATH . $pathToSave, $fullname);

        return $fullname;
    }
}