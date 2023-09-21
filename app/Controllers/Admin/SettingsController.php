<?php

namespace App\Controllers\Admin;
use App\Models\Tag;
use App\Models\User;
use App\Models\Dashboard;
use App\Models\Site;
use App\Controllers\BaseController;

class SettingsController extends BaseController
{
    public function __construct()
    {
        helper(['form']);
        $this->session = \Config\Services::session();
    }

    public function dashboard(){

        $userModel = model('User');
        $user = $userModel->find($this->session->get('id')); 

        if ($user['role'] == 0) {
            return redirect('/');
        } else if ($user['role'] == 2 || $user['role'] == 1) { 
            return view('admin\settings\dashboard');
        } else {
            return redirect('/');
        }

    }

    public function edit_dashboard(){

        $session = session();

        if(!$session->has('id')) {
            return redirect()->to('/login');
        }
        $dashboard = new Dashboard();

        $data = [
            'name' => $this->request->getVar('name'),
            'icon' => $this->request->getVar('icon'),
        ];

        $userModel = model('User');
        $user = $userModel->find($this->session->get('id')); 

        if ($user['role'] == 0) {
            return redirect('/');
        } else if ($user['role'] == 2 || $user['role'] == 1) { 
            $dashboard->insert($data);
        } else {
            return redirect('/');
        }

        session()
            ->setFlashdata('success_message', 
                'Dashboard has been updated successfully.');
        
        return $this->response->redirect(site_url('/admin/dashboard'));

    }


    public function site(){

        $userModel = model('User');
        $user = $userModel->find($this->session->get('id')); 

        if ($user['role'] == 0) {
            return redirect('/');
        } else if ($user['role'] == 2 || $user['role'] == 1) { 
            return view('admin\settings\site');
        } else {
            return redirect('/');
        }
    }


    public function edit_site(){
        $session = session();
        
        if(!$session->has('id')) {
            return redirect()->to('/login');
        }
        $site = new Site();
        
        $data = [
            'about' => $this->request->getVar('about'),
            'ads1' => $this->request->getVar('ads1'),
            'ads2' => $this->request->getVar('ads2'),
            'ads3' => $this->request->getVar('ads3'),
        ];
        
        $userModel = model('User');
        $user = $userModel->find($session->get('id')); 
        
        if ($user['role'] == 0) {
            return redirect('/');
        } else if ($user['role'] == 2 || $user['role'] == 1) { 
    
            // Get the previous logo value from the database
            $db = \Config\Database::connect();
            $query = $db->table('site')
                ->select('logo')
                ->orderBy('id', 'DESC')
                ->limit(1)
                ->get();
            $result = $query->getRow();
            $previousLogo = $result->logo;
            
            $image = $this->request->getFile('logo');
    
            if ($image && $image->isValid()) {
                // Upload the new logo
                $newName = $image->getRandomName();
                $image->move(ROOTPATH . 'public/uploads', $newName);
                $data['logo'] = $newName;
                // Delete the previous logo if a new one is uploaded
                if (!empty($previousLogo)) {
                    unlink(ROOTPATH . 'public/uploads/' . $previousLogo);
                }
            } else {
                // Use the previous logo if a new one is not uploaded
                $data['logo'] = $previousLogo;
            }
            
            $site->insert($data);
        } else {
            return redirect('/');
        }
    
        session()
            ->setFlashdata('success_message', 'Site has been updated successfully.');
    
        return $this->response->redirect(site_url('/admin/dashboard'));
    }
    

}
