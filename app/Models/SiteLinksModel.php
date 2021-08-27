<?php

namespace App\Models;

use CodeIgniter\Model;

class SiteLinksModel extends Model
{
    protected $table      = 'site_links';
    protected $primaryKey = 'link_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['link_description', 'link_url','link_icon','sites_id','sort_order'];

    protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}

