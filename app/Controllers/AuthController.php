<?php 


namespace App\Controllers;
use App\Models\User;

class AuthController extends BaseController
{
    public function register(){
        return view('auth\register');
    }

    public function doRegister()
    {
        // helper(['form']);
        $data = [];
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'name' => 'required|min_length[3]|max_length[20]',
                'password' => 'required|min_length[8]|max_length[255]',
                'email'    => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]'
            ];
            if ($this->validate($rules)) {
                $model = new User();
                $data = [
                    'name' => $this->request->getVar('name'),
                    'email'    => $this->request->getVar('email'),
                    'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                ];
                $model->save($data);
                return redirect()->to('/admin/dashboard');
            } else {
                $data['validation'] = $this->validator;
            }
        }
        echo view('auth/register', $data);
    }

    public function login(){

        
        return view('auth\login');
    }

    public function doLogin()
    {
        helper(['form']);
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'email' => 'required',
                'password' => 'required'
            ];

            if ($this->validate($rules)) {
                $model = new User();
                $user = $model->where('email', $this->request->getVar('email'))->first();
                $this->setUserSession($user);
                return redirect()->to('/admin/dashboard');
            } else {
                $data['validation'] = $this->validator;
            }
        }
        echo view('auth/login');
    }

    private function setUserSession($user)
    {
        $data = [
            'id' => $user['id'] ?? null,
            'name' => $user['name'] ?? null,
            'email' => $user['email'] ?? null,
            'isLoggedIn' => true,
        ];
        session()->set($data);
        return true;
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}