<?php

namespace App\Controllers\Admin;
use App\Models\User;
use App\Models\Category;
use App\Models\Mail;
use App\Controllers\BaseController;

class MailController extends BaseController
{
    public function __construct()
    {
        helper(['form']);
        $this->session = \Config\Services::session();
    }

    // show users list
    public function index(){
        $mail = new Mail();
        $mails = $mail->where('deleted_at', null)->findAll();

        $userModel = model('User');
        $user = $userModel->find($this->session->get('id')); 
        // Assuming you have a 'userId' stored in the session
        
        if ($user['role'] == 0) {
            return redirect('/');
        } else if ($user['role'] == 2 || $user['role'] == 1) { 
            return view('admin\mails\index', ['mails' => $mails]);
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
            return view('admin\mails\create');
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
        

        $mail = new Mail();
        $data = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'message' => $this->request->getVar('message'),
        ];


        $userModel = model('User');
        $user = $userModel->find($this->session->get('id')); 

        if ($user['role'] == 0) {
            return redirect('/');
        } else if ($user['role'] == 2 || $user['role'] == 1) { 
            $mail->insert($data);
        } else {
            return redirect('/');
        }


        session()
            ->setFlashdata('success_message', 
                'Mail has been stored successfully.');
        
        return $this->response->redirect(site_url('/admin/mails'));
    }


    public function edit($id)
    {
        $mailModel = new Mail();
        $mail = $mailModel->find($id);
        
        $userModel = model('User');
        $user = $userModel->find($this->session->get('id')); 

        if ($user['role'] == 0) {
            return redirect('/');
        } else if ($user['role'] == 2 || $user['role'] == 1) { 
            return view('admin\mails\edit',['mail'=> $mail]);
        } else {
            return redirect('/');
        }

    }

    public function update($id){

        $session = session();

        if (!$session->has('id')) {
            return redirect()->to('/login');
        }

        $mailModel = new Mail();
        
        $data = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'message' => $this->request->getVar('message'),
        ];
        
        $userModel = model('User');
        $user = $userModel->find($this->session->get('id')); 

        if ($user['role'] == 0) {
            return redirect('/');
        } else if ($user['role'] == 2 || $user['role'] == 1) { 
            $mailModel->update($id, $data); // Update the mail with the provided ID
        } else {
            return redirect('/');
        }

        session()
            ->setFlashdata('edit_success_message', 
                'Category has been updated successfully.');
                
        return redirect()->to('/admin/mails');


    }

    public function delete($id)
    {
        $mailModel = model('Category');
        $userModel = model('User');
        $user = $userModel->find($this->session->get('id')); 
        // Instead of deleting the record, update the `deleted_at` column
        if ($user['role'] == 0) {
            return redirect('/');
        } else if ($user['role'] == 2 || $user['role'] == 1) { 
            $mailModel->update($id, ['deleted_at' => date('Y-m-d H:i:s')]);
        } else {
            return redirect('/');
        }

        session()
            ->setFlashdata('delete_success_message', 
                'Mail has been deleted successfully.');

        return redirect()->to('/admin/mails');
    }



}
