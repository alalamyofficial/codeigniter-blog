<?php

namespace App\Controllers\Admin;
use App\Models\User;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Post;
use App\Controllers\BaseController;

class PostController extends BaseController
{

    public function __construct()
    {
        helper(['form']);
        $this->session = \Config\Services::session();
    }

    public function index(){
        $post = new Post();
        $category = new Category();
        $posts = $post->getPostsWithUserName();
        $categories = $category->findAll();

        $userModel = model('User');
        $user = $userModel->find($this->session->get('id')); 

        if ($user['role'] == 0) {
            return redirect('/');
        } else if ($user['role'] == 2 || $user['role'] == 1) { 
            return view('admin\posts\index',[
                'posts' => $posts,
                'categories' => $categories
            ]);
        } else {
            return redirect('/');
        }

    }

    public function trashed_posts(){
        $post = new Post();
        $category = new Category();
        $posts = $post->getTrashedPostsWithUserName();
        $categories = $category->findAll();

        $userModel = model('User');
        $user = $userModel->find($this->session->get('id')); 

        if ($user['role'] == 0) {
            return redirect('/');
        } else if ($user['role'] == 2 || $user['role'] == 1) { 
            return view('admin\trashed\index',[
                'posts' => $posts,
                'categories' => $categories
            ]);
        } else {
            return redirect('/');
        }

    }

    public function create()
    {
        $category = new Category();
        $categories = $category->where('deleted_at', null)->findAll();
        
        $userModel = model('User');
        $user = $userModel->find($this->session->get('id')); 

        if ($user['role'] == 0) {
            return redirect('/');
        } else if ($user['role'] == 2 || $user['role'] == 1) { 
            return view('admin\posts\create',['categories' => $categories]);
        } else {
            return redirect('/');
        }
    }


    public function store()
    {
        $session = session();

        if (!$session->has('id')) {
            return redirect()->to('/login');
        }

        $user_id = $session->get('id');

        // Load the validation library
        \Config\Services::validation()->reset();

        $validationRules = [
            'title' => 'required',
            'desc' => 'required',
            'category_id' => 'required',
            'tags' => 'required',
            'status' => 'required',
            'post_cover' => 'uploaded[post_cover]|max_size[post_cover,1024]|is_image[post_cover]'
        ];

        if (!$this->validate($validationRules)) {
            // If validation fails, redirect back with validation errors
            return redirect()->back()->withInput()->with('validation_errors', $this->validator->getErrors());
        }

        $data = [
            'title' => $this->request->getVar('title'),
            'desc' => $this->request->getVar('desc'),
            'user_id' => $user_id,
            'category_id' => $this->request->getVar('category_id'),
            'tags' => $this->request->getVar('tags'),
            'status' => $this->request->getVar('status'),
        ];

        // Image Upload
        $image = $this->request->getFile('post_cover');
        if ($image !== null && $image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move('./uploads', $newName);

            $data['post_cover'] = $newName;
        }

        $userModel = model(User::class);
        $user = $userModel->find($this->session->get('id'));

        if ($user['role'] == 0) {
            return redirect('/');
        } else if ($user['role'] == 2 || $user['role'] == 1) {
            $post = new Post();
            $post->insert($data);
        } else {
            return redirect('/');
        }

        session()->setFlashdata('success_message', 'Post has been stored successfully.');

        return redirect()->to('/admin/posts');
    }


    public function show($id){

        $postModel = new Post();
        $post = $postModel->find($id);

        if (!empty($post) && is_array($post)) {
            $post = (object) $post; // Convert the array to an object
            // $post_user = $postModel->getPostsWithUserName();
            // $post_category = $postModel->getPostsWithCategoryName();

            $post_user_name = $postModel->getPostWithUser($id);
            $post_category_name = $postModel->getPostWithCategory($id);
            
            $userModel = model('User');
            $user = $userModel->find($this->session->get('id')); 

            if ($user['role'] == 0) {
                return redirect('/');
            } else if ($user['role'] == 2 || $user['role'] == 1) { 
                return view('admin/posts/show', [
                    'post' => $post, 
                    'post_user_name' => $post_user_name,
                    'post_category_name' => $post_category_name,
                ]);
            } else {
                return redirect('/');
            }
            
        }      
    }


    public function edit($id): string
    {
        $postModel = new Post();
        $post = $postModel->find($id);

        $category = new Category();
        $categories = $category->findAll();

        $userModel = model('User');
        $user = $userModel->find($this->session->get('id')); 

        if ($user['role'] == 0) {
            return redirect('/');
        } else if ($user['role'] == 2 || $user['role'] == 1) { 
            return view('admin\posts\edit',[
                'post' => $post,
                'categories' => $categories
            ]);
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
            'title' => 'required',
            'desc' => 'required',
            'category_id' => 'required',
            'tags' => 'required',
            'post_cover' => 'max_size[post_cover,1024]|is_image[post_cover]'
        ];
    
        if (!$this->validate($validationRules)) {
            // If validation fails, redirect back with validation errors
            return redirect()->back()->withInput()->with('validation_errors', $this->validator->getErrors());
        }
    
        $data = [
            'title' => $this->request->getVar('title'),
            'desc' => $this->request->getVar('desc'),
            'user_id' => $user_id,
            'category_id' => $this->request->getVar('category_id'),
            'tags' => $this->request->getVar('tags'),
        ];
    
        // Image Upload
        $image = $this->request->getFile('post_cover');
        if ($image !== null && $image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move('./uploads', $newName);
    
            $data['post_cover'] = $newName;
        }
    
        $userModel = model(User::class);
        $user = $userModel->find($this->session->get('id'));
    
        if ($user['role'] == 0) {
            return redirect('/');
        } else if ($user['role'] == 2 || $user['role'] == 1) {
            $postModel = new Post();
            $postModel->update($id, $data, $image);
        } else {
            return redirect('/');
        }
    
        session()->setFlashdata('edit_success_message', 'Post has been updated successfully.');
    
        return redirect()->to('/admin/posts');
    }
    


    public function delete($id)
    {
        $postModel = model('Post');

        $userModel = model('User');
        $user = $userModel->find($this->session->get('id')); 

        if ($user['role'] == 0) {
            return redirect('/');
        } else if ($user['role'] == 2 || $user['role'] == 1) { 
            $postModel->update($id, ['deleted_at' => date('Y-m-d H:i:s')]);
        } else {
            return redirect('/');
        }

        
        session()
            ->setFlashdata('delete_success_message', 
                'Post has been deleted successfully.');
        return redirect()->to('/admin/trashed/posts');
    }


    public function force_delete($id){
        $postModel = model('Post');

        $userModel = model('User');
        $user = $userModel->find($this->session->get('id')); 

        if ($user['role'] == 0) {
            return redirect('/');
        } else if ($user['role'] == 2 || $user['role'] == 1) { 
            $postModel->delete($id);        
        } else {
            return redirect('/');
        }
        return redirect()->to('/admin/posts');
    }

    public function restore($id)
    {
        $postModel = model('Post');

        $userModel = model('User');
        $user = $userModel->find($this->session->get('id')); 

        if ($user['role'] == 0) {
            return redirect('/');
        } else if ($user['role'] == 2 || $user['role'] == 1) { 
            $postModel->update($id, ['deleted_at' => null]);
        } else {
            return redirect('/');
        }

        return redirect()->to('/admin/posts');
    }

    public function view($id)
    {
        $postModel = new Post();
        $postModel->incrementViews($id);

        // Load the post view and pass necessary data
        // $data['post'] = $postModel->find($id);
        // return view('post_view', $data);
    }

    public function uploadImage()
    {
        $uploadedFile = $this->request->getFile('image');

        if ($uploadedFile->isValid() && !$uploadedFile->hasMoved()) {
            $newName = $uploadedFile->getRandomName();
            $uploadedFile->move(ROOTPATH . 'public/uploads', $newName);

            $response = [
                'success' => true,
                'url' => base_url('uploads/' . $newName)
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Image upload failed'
            ];
        }

        return $this->response->setJSON($response);
    }


}
