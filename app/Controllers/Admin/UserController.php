<?php

namespace App\Controllers\Admin;
use App\Models\User;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Post;
use App\Controllers\BaseController;
use CodeIgniter\Database\ConnectionInterface;

class UserController extends BaseController
{
    public function __construct()
    {
        helper(['form']);
        $this->session = \Config\Services::session();
    }


    public function index()
    {
        $db = \Config\Database::connect();
        $query = $db->table('users')
            ->select('*')
            ->orderBy('id', 'DESC')
            ->get();

        $users = $query->getResult();

        $userModel = model('User');
        $user = $userModel->find($this->session->get('id')); 

        if ($user['role'] == 0) {
            return redirect('/');
        } else if ($user['role'] == 2 || $user['role'] == 1) { 
            return view('admin\users\index', ['users' => $users]);
        } else {
            return redirect('/');
        }
    }

    public function create(): string
    {
        $userModel = model('User');
        $userI = $userModel->find($this->session->get('id')); 

        if ($userI['role'] == 0) {
            return redirect('/');
        } else if ($userI['role'] == 2 || $userI['role'] == 1) { 
            return view('admin\users\create');
        } else {
            return redirect('/');
        }

    }

    public function store(){
        $session = session();

        if(!$session->has('id')) {
            // Redirect to login page or show error
            return redirect()->to('/login');
        }    
        $user = new User();
        $data = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'role' => $this->request->getVar('role'),
        ];

        $password = $this->request->getVar('password');

        // Check if a new password is provided, and hash it
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_BCRYPT);
        }

        $userModel = model('User');
        $userI = $userModel->find($this->session->get('id')); 

        if ($userI['role'] == 0) {
            return redirect('/');
        } else if ($userI['role'] == 2 || $userI['role'] == 1) { 
            $userI->insert($data);
        } else {
            return redirect('/');
        }

        session()
            ->setFlashdata('success_message', 
                'User has been stored successfully.');

        return $this->response->redirect(site_url('/admin/users'));
    }


    public function edit($id): string
    {
        $userModel = new User();
        $user = $userModel->find($id);

        $userModel = model('User');
        $userI = $userModel->find($this->session->get('id')); 

        if ($userI['role'] == 0) {
            return redirect('/');
        } else if ($userI['role'] == 2 || $userI['role'] == 1) { 
            return view('admin\users\edit',['user'=> $userI]);
        } else {
            return redirect('/');
        }
    }

    public function update($id){

        $session = session();

        if (!$session->has('id')) {
            return redirect()->to('/login');
        }

        $userModel = new User();            
        $data = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'role' => (int)$this->request->getVar('role'),
            // 'role' => 2,
        ];


        $password = $this->request->getVar('password');

        // Check if a new password is provided, and hash it
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_BCRYPT);
        } else {
            // If the new password field is empty, retrieve the old password from the database
            $user = $userModel->find($id);
            if ($user) {
                $data['password'] = $user['password'];
            }
        }

        $userModel = model('User');
        $userI = $userModel->find($this->session->get('id')); 

        if ($userI['role'] == 0) {
            return redirect('/');
        } else if ($userI['role'] == 2 || $userI['role'] == 1) { 
            $userModel->update($id, $data); // Update the category with the provided ID
        } else {
            return redirect('/');
        }

        session()
            ->setFlashdata('edit_success_message', 
                'User has been updated successfully.');
        
        return redirect()->to('/admin/users');

    }

    public function delete($id)
    {

        $userModel = model('User');
        // Instead of deleting the record, update the `deleted_at` column

        
        $userModel = model('User');
        $userI = $userModel->find($this->session->get('id'));

        if ($user['role'] == 0) {
            return redirect('/');
        } else if ($user['role'] == 2 || $user['role'] == 1) { 
            $userModel->update($id, ['status' => 0]);
        } else {
            return redirect('/');
        }

        session()
            ->setFlashdata('delete_success_message', 
                'User has been deleted successfully.');

        return redirect()->to('/admin/users');

    }
}
