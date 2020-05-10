<?php

namespace App\Controllers;

use App\Models\AdvertModel;
use Config\Pager;

class Home extends BaseController
{
	public function index()
	{
        helper(['html']);
        /** @var $advModel AdvertModel **/
        $advModel = new AdvertModel();

        $data = array(
            'title' => 'Все объявления',
            'adverts' => $advModel->paginate(10, 'p'),
            'pager' => $advModel->pager,
        );

		return view('app/welcome_message', $data);
	}

	//--------------------------------------------------------------------

}
