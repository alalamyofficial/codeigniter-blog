<?php 
namespace App\Models;
use CodeIgniter\Model;

class Dashboard extends Model
{
    protected $table = 'dashboard';
    protected $primaryKey = 'id';
    
    protected $allowedFields = ['name','icon' ,'created_at', 'updated_at'];
    protected $useTimestamps = true;

}