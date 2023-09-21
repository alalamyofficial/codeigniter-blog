<?php

namespace App\Controllers;
use App\Models\Tag;
use App\Models\Mail;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use CodeIgniter\Pager\Pager;
use Psr\Log\LoggerInterface;
use CodeIgniter\HTTP\RequestInterface; 
use CodeIgniter\HTTP\ResponseInterface; 
use CodeIgniter\Pager\Views\RendererInterface; 

class BlogController extends BaseController
{
    public function index()
    {
        $post = new Post();
        $category = new Category();

        $posts = $post->join('users', 'users.id = articles.user_id', 'left')
            ->select('articles.*, users.name as user_name')
            ->orderBy('articles.id', 'DESC')
            ->where('articles.deleted_at',null)
            ->paginate(4);
            $categories = $category->where('deleted_at',null)->findAll();
            return view('website/blog',[       
                'posts' => $posts,
                'categories' => $categories,
                'pager' => $post->pager,
            ]);
    }

    
    public function main()
    {
        $post = new Post();
        $category = new Category();
        $all_posts = $post->getPostsWithUserName();
        $posts = array_slice($all_posts, 0, 5);
        $categories = $category->where('deleted_at',null)->findAll();

        return view('website/main',[       
            'posts' => $posts,
            'categories' => $categories
        ]);
    }

    public function single_post($title)
    {
        $postModel = new Post();
        $category = new Category();
    
        $post = $postModel->where('title', $title)->first();
        $all_posts = $postModel->getPostsWithUserName();
        $posts = array_slice($all_posts, 0, 5);
    
        // if (!empty($post) && is_object($post)) {
            $post_user_name = $postModel->getPostWithUser($post['id']);
            $post_category_name = $postModel->getPostWithCategory($post['id']);
            $categories = $category->where('deleted_at',null)->findAll();
            $postModel->incrementViews($post['id']);

            // var_dump($post);

            
            return view('website/single_post', [
                'post' => $post,
                'post_user_name' => $post_user_name,
                'post_category_name' => $post_category_name,
                'categories' => $categories,
                'posts' => $posts,
            ]);
        // }
    }
    
    

    public function getPostBelongsToCategories($name){

        $category_modal = new Category();
        $postModel = new Post();
        $categories = $category_modal->where('deleted_at',null)->findAll();
        $category = $category_modal->where('name', $name)->first();

        if (!$category) {
            return view('website/category', [
                'category' => $category,
                'posts' => $posts,
                'categories' => $categories,
            ]);    
        }
        $posts = $postModel
                    ->select('articles.*, users.name as user_name')
                    ->join('categories', 'articles.category_id = categories.id')
                    ->join('users', 'users.id = articles.user_id')
                    ->where('category_id', $category['id'])
                    ->findAll();

        if (empty($posts)) {
            return view('website/category', [
                'category' => $category,
                'posts' => $posts,
                'categories' => $categories,
            ]);
    
        }
        return view('website/category', [
            'category' => $category,
            'posts' => $posts,
            'categories' => $categories,
        ]);

    }


    public function all_posts(){

        $post = new Post();
        $category = new Category();
        $posts = $post->getPostsWithUserName();
        $posts = array_slice($posts, 0, count($posts));

        $categories = $category->where('deleted_at',null)->findAll();
        return view('website/all_articles',[       
            'posts' => $posts,
            'categories' => $categories
        ]);

    }

    public function contact_form(){

        $post = new Post();
        $category = new Category();
        $posts = $post->getPostsWithUserName();
        $posts = array_slice($posts, 0, count($posts));

        $categories = $category->where('deleted_at',null)->findAll();
        return view('website/contact_form',[       
            'posts' => $posts,
            'categories' => $categories
        ]);

    }

    public function contact_us()
    {
        // Load the validation library
        \Config\Services::validation()->reset();
    
        $validationRules = [
            'name' => 'required',
            'email' => 'required|valid_email',
            'message' => 'required',
        ];
    
        if (!$this->validate($validationRules)) {
            // If validation fails, redirect back with validation errors
            return redirect()->back()->withInput()->with('validation_errors', $this->validator->getErrors());
        }
        // If validation passes, proceed with storing the data
        $mail = new Mail();
    
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'message' => $this->request->getPost('message'),
        ];
    
        $mail->insert($data);
    
        session()->setFlashdata('success_message', 'Message was sent successfully.');
    
        return redirect()->back();
    }
}
