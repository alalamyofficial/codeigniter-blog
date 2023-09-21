<?php

namespace App\Controllers\Admin;
use App\Models\User;
use App\Models\Category;
use App\Controllers\BaseController;

class CategoryController extends BaseController
{
    public function __construct()
    {
        helper(['form']);
        $this->session = \Config\Services::session();
    }

    // show users list
    public function index(){
        $category = new Category();
        $categories = $category->getCategoriesWithUserName();

        $userModel = model('User');
        $user = $userModel->find($this->session->get('id')); 
        // Assuming you have a 'userId' stored in the session
        
        if ($user['role'] == 0) {
            return redirect('/');
        } else if ($user['role'] == 2 || $user['role'] == 1) { 
            return view('admin\categories\index', ['categories' => $categories]);
        } else {
            return redirect('/');
        }

    }

    public function create()
    {
        $userModel = model('User');
        $user = $userModel->find($this->session->get('id')); 

        if ($user['role'] == 0) {
            return redirect('/');
        } else if ($user['role'] == 2 || $user['role'] == 1) { 
            return view('admin\categories\create');
        } else {
            return redirect('/');
        }
    }

    public function store()
    {
        $session = session();
    
        if (!$session->has('id')) {
            // Redirect to login page or show error
            return redirect()->to('/login');
        }
    
        $user_id = $session->get('id');
    
        // Load the validation library
        \Config\Services::validation()->reset();
    
        $validationRules = [
            'name' => 'required',
        ];
    
        if (!$this->validate($validationRules)) {
            // If validation fails, redirect back with validation errors
            return redirect()->back()->withInput()->with('validation_errors', $this->validator->getErrors());
        }
    
        $data = [
            'name' => $this->request->getVar('name'),
            'user_id' => $user_id
        ];
    
        $userModel = model(User::class);
        $user = $userModel->find($this->session->get('id'));
    
        if ($user['role'] == 0) {
            return redirect('/');
        } else if ($user['role'] == 2 || $user['role'] == 1) {
            $category = new Category();
            $category->insert($data);
        } else {
            return redirect('/');
        }
    
        session()
            ->setFlashdata('success_message', 'Category has been stored successfully.');
    
        return redirect()->to('/admin/categories');
    }


    public function edit($id)
    {
        $categoryModel = new Category();
        $category = $categoryModel->find($id);
        
        $userModel = model('User');
        $user = $userModel->find($this->session->get('id')); 

        if ($user['role'] == 0) {
            return redirect('/');
        } else if ($user['role'] == 2 || $user['role'] == 1) { 
            return view('admin\categories\edit',['category'=> $category]);
        } else {
            return redirect('/');
        }

    }

    public function update($id)
    {
        $session = session();
    
        if (!$session->has('id')) {
            return redirect()->to('/login');
        }
    
        $user_id = $session->get('id');
    
        // Load the validation library
        \Config\Services::validation()->reset();
    
        $validationRules = [
            'name' => 'required',
        ];
    
        if (!$this->validate($validationRules)) {
            // If validation fails, redirect back with validation errors
            return redirect()->back()->withInput()->with('validation_errors', $this->validator->getErrors());
        }
    
        $data = [
            'name' => $this->request->getVar('name'),
            'user_id' => $user_id
        ];
    
        $userModel = model(User::class);
        $user = $userModel->find($this->session->get('id'));
    
        if ($user['role'] == 0) {
            return redirect('/');
        } else if ($user['role'] == 2 || $user['role'] == 1) {
            $categoryModel = new Category();
            $categoryModel->update($id, $data); // Update the category with the provided ID
        } else {
            return redirect('/');
        }
    
        session()
            ->setFlashdata('edit_success_message', 'Category has been updated successfully.');
    
        return redirect()->to('/admin/categories');
    }

    // public function delete($id)
    // {
    //     $categoryModel = model('Category');
    //     $categoryModel->delete($id);        
    //     return redirect()->to('/admin/categories');
    // }


    
    // public function delete($id){
    //     $categoryModel = model('Category');
    //     $data['category'] = $categoryModel->where('id', $id)->delete($id);
    //     return $this->response->redirect(site_url('/admin/categories'));
    // }


    public function delete($id)
    {
        $categoryModel = model('Category');
        $userModel = model('User');
        $user = $userModel->find($this->session->get('id')); 
        // Instead of deleting the record, update the `deleted_at` column
        if ($user['role'] == 0) {
            return redirect('/');
        } else if ($user['role'] == 2 || $user['role'] == 1) { 
            $categoryModel->update($id, ['deleted_at' => date('Y-m-d H:i:s')]);
        } else {
            return redirect('/');
        }

        session()
            ->setFlashdata('delete_success_message', 
                'Category has been deleted successfully.');

        return redirect()->to('/admin/categories');
    }



}
