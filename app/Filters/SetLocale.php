<?php namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class SetLocale implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $locale = session('locale') ?? config('App')->defaultLocale;
        Services::request()->setLocale($locale);
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing
    }
}
