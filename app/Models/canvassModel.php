<?php

namespace App\Models;

use CodeIgniter\Model;

class canvassModel extends Model
{
    protected $table      = 'tblcanvass_sheet';
    protected $primaryKey = 'canvassID';

    protected $useAutoIncrement  = true;
    protected $insertID = 0;
    protected $returnType = 'array';
    protected $userSoftDelete = false;
    protected $protectFields = true;
    protected $allowedFields = ['OrderNo', 'orderID','Supplier','Price','Currency','ContactPerson','ContactNumber','EmailAddress','Address','Terms','Warranty','Reference','Remarks','Vatable','purchaseLogID'];

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;
    
    
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];
}