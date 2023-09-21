<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\User;

class DashboardController extends BaseController
{
    public function __construct()
    {
        helper(['form']);
        $this->session = \Config\Services::session();
    }

    public function dashboard()
    {
        if(!$this->session->get('isLoggedIn')) // Check if user is not logged in
        {
            return redirect()->to('login'); // Redirect to login page
        }
    

        $userModel = model('User');
        $user = $userModel->find($this->session->get('id')); 
        // Assuming you have a 'userId' stored in the session
        
        if ($user['role'] == 0) {
            return redirect('/');
        } else if ($user['role'] == 2 || $user['role'] == 1) { 
            // Assuming role 2 is for admin
            $data['title'] = 'Dashboard';
            return view('admin/dashboard', $data); 
            // Use forward slashes in the view path
        } else {
            return redirect('/');
        }
    }
}
