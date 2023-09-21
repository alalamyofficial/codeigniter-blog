<?php 
namespace App\Models;
use CodeIgniter\Model;

class Site extends Model
{
    protected $table = 'site';
    protected $primaryKey = 'id';
    
    protected $allowedFields = ['logo','about',
                                        'ads1','ads2','ads3',
                                            'created_at', 'updated_at'];
    protected $useTimestamps = true;

}