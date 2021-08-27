<?php

namespace App\Models;

use CodeIgniter\Model;

class Owm_city_listModel extends Model
{
    protected $table      = 'owm_city_list';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['owm_city_id','owm_city_name','owm_country','locality_long','country_short','country_long','postal_code'];

    protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}

