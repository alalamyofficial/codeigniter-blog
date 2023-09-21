<?php 
namespace App\Models;
use CodeIgniter\Model;

class Mail extends Model
{
    protected $table = 'mails';
    protected $primaryKey = 'id';
    
    protected $allowedFields = ['name','email','message',
                                        'created_at', 'updated_at','deleted_at'];
    protected $useTimestamps = true;

}