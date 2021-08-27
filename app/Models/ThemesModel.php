<?php

namespace App\Models;

use CodeIgniter\Model;

class ThemesModel extends Model
{
    protected $table      = 'theme';
    protected $primaryKey = 'theme_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['theme_name', 'icon_color'];

    protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}

