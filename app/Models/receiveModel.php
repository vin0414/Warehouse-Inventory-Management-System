<?php

namespace App\Models;

use CodeIgniter\Model;

class receiveModel extends Model
{
    protected $table      = 'tblreceive';
    protected $primaryKey = 'receiveID';
    protected $useAutoIncrement  = true;
    protected $insertID = 0;
    protected $returnType = 'array';
    protected $userSoftDelete = false;
    protected $protectFields = true;
    protected $allowedFields = ['Date','OrderNo','purchaseNumber','InvoiceNo','InvoiceAmount','supplierID','Remarks','Receiver','warehouseID','Attachment'];
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