<?php

namespace App\Models;

use CodeIgniter\Model;

class SitesModel extends Model
{
    protected $table      = 'sites';
    protected $primaryKey = 'site_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['site_description', 'sort_order'];

    protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

	
	
}

