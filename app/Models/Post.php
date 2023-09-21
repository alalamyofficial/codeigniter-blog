<?php 
namespace App\Models;
use CodeIgniter\Model;

class Post extends Model
{
    protected $table = 'articles';
    protected $primaryKey = 'id';
    
    protected $allowedFields = 
            ['title','desc','user_id','category_id','post_cover',
                'tags','views','created_at', 'updated_at','deleted_at'];

    protected $useTimestamps = true;


    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function incrementViews($id)
    {
        $this->where('id', $id)->set('views', 'views + 1', false)->update();
    }

    public function getPostsWithUserName()
    {
        return $this->join('users', 'users.id = articles.user_id', 'left')
            ->select('articles.*, users.name as user_name')
            ->orderBy('articles.id', 'DESC')
            ->where('articles.deleted_at',null)
            ->findAll();
    }

    public function getPaginatedBlogPostsWithUserName($perPage = 10, $page = 1)
    {
        $offset = ($page - 1) * $perPage;
        
        $query = $this->join('users', 'users.id = articles.user_id', 'left')
            ->select('articles.*, users.name as user_name')
            ->orderBy('articles.id', 'DESC')
            ->where('articles.deleted_at', null)
            ->limit($perPage, $offset);
        
        $posts = $query->findAll();
        $pager = $query->pager;
        
        return ['posts' => $posts, 'pager' => $pager];
    }
    
    

    public function getTrashedPostsWithUserName()
    {
        return $this->join('users', 'users.id = articles.user_id', 'left')
            ->select('articles.*, users.name as user_name')
            ->orderBy('articles.id', 'DESC')
            ->where('articles.deleted_at IS NOT NULL')
            ->findAll();
    }


    

    public function getPostsWithCategoryName()
    {
        return $this->join('categories', 'categories.id = articles.category_id', 'left')
            ->select('articles.*, categories.name as category_name')
            ->orderBy('articles.id', 'DESC')
            ->findAll();
    }


    public function getPostWithUser($id)
    {
        return $this->select('articles.*, users.name')
                    ->join('users', 'users.id = articles.user_id')
                    ->where('articles.id', $id)
                    ->get()
                    ->getRow();
    }

    public function getPostWithCategory($id)
    {
        return $this->select('articles.*, categories.name')
                    ->join('categories', 'categories.id = articles.category_id')
                    ->where('articles.id', $id)
                    ->get()
                    ->getRow();
    }

    public function getPostsByCategory($id)
    {
        return $this->where('category_id', $id)->findAll();
    }

}