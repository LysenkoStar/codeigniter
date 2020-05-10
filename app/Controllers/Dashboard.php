<?php


namespace App\Controllers;


class Dashboard extends BaseController
{
    public function index() {
        $data = array('title' => 'Панель управления');
        return view('admin/main', $data);
    }
}