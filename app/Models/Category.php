<?php 
namespace App\Models;
use CodeIgniter\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    
    protected $allowedFields = ['name','user_id' ,'created_at', 'updated_at','deleted_at'];
    protected $useTimestamps = true;


    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function getCategoriesWithUserName()
    {
        return $this->join('users', 'users.id = categories.user_id', 'left')
            ->select('categories.*, users.name as user_name')
            ->orderBy('categories.id', 'DESC')
            ->where('categories.deleted_at', null)
            ->findAll();
    }
}