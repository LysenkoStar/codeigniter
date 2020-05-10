<?php


namespace App\Controllers;


use App\Models\UserModel;

class Users extends BaseController
{
    /**
     * @return \CodeIgniter\HTTP\RedirectResponse|string
     */
    public function login()
    {
        $data = array('title' => 'Вход пользователя');
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'email' => 'required|min_length[5]|max_length[50]|valid_email',
                'password' => 'required|min_length[5]|max_length[255]|validateUser[email,password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => 'Email или пароль не совпадают',
                ],
            ];

            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {
                $uModel = new UserModel();

                $user = $uModel->where('email', $this->request->getVar('email'))
                                        ->first();

                $this->setUserSession($user);

//                $session->setFlashdata('success','Регистрация прошла успешно');
                return redirect()->to('/dashboard');
            }
        }

        return view('app/login', $data);
    }

    /**
     * @return \CodeIgniter\HTTP\RedirectResponse|string
     * @throws \ReflectionException
     */
    public function register()
    {
        $data = array('title' => 'Регистрация пользователя');
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'first_name' => 'required|min_length[3]|max_length[20]',
                'last_name' => 'required|min_length[3]|max_length[20]',
                'email' => 'required|min_length[5]|max_length[50]|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[5]|max_length[255]',
                'password_confirm' => 'matches[password]',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $uModel = new UserModel();
                $newUser = array(
                    'first_name' => $this->request->getVar('first_name'),
                    'last_name' => $this->request->getVar('last_name'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),
                );

                $uModel->save($newUser);
                $session = session();
                $session->setFlashdata('success','Регистрация прошла успешно');
                return redirect()->to('/login');
            }
        }

        return view('app/register', $data);
    }

    public function profile()
    {
        $data = array('title' => 'Профиль пользователя');
        helper(['form']);
        /** @var $uModel UserModel **/
        $uModel = new UserModel();

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'first_name' => 'required|min_length[3]|max_length[20]',
                'last_name' => 'required|min_length[3]|max_length[20]',
                'email' => 'required|min_length[5]|max_length[50]|valid_email',
            ];

            if ($this->request->getPost('password') != '') {
                $rules['password'] = 'required|min_length[5]|max_length[255]';
                $rules['password_confirm'] = 'matches[password]';
            }

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $newUser = array(
                    'id' => session()->get('id'),
                    'first_name' => $this->request->getPost('first_name'),
                    'last_name' => $this->request->getPost('last_name'),
                    'email' => $this->request->getPost('email'),
                );

                if ($this->request->getPost('password') != '') {
                    $newUser['password'] = $this->request->getPost('password');
                }

                $uModel->save($newUser);
                session()->setFlashdata('success','Информация успешно обновленна');
                return redirect()->to('/profile');
            }
        }
        $data['user'] = $uModel->where('id', session()->get('id'))->first();

        return view('admin/profile', $data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

    /**
     * @param $user
     * @return bool
     */
    private function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'first_name' => $user['first_name'],
            'last_name' => $user['last_name'],
            'email' => $user['email'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }
}