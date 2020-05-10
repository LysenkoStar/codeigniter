<?php

namespace App\Filters;


use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Auth implements FilterInterface
{

    public function before(RequestInterface $request)
    {
        if (!session()->get('isLoggedIn'))
            return redirect()->to('/');
    }

    public function after(RequestInterface $request, ResponseInterface $response)
    {
        // TODO: Implement after() method.
    }
}