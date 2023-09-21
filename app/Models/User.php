<?php 

namespace App\Models;
use CodeIgniter\Model;

class User extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['name', 'password','role' ,'email','created_at','updated_at'];

    public function getUserByName($name)
    {
        return $this->where('name', $name)->first();
    }
}