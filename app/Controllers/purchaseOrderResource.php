<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;
header('Access-Control-Allow-Origin: *');

class purchaseOrderResource extends ResourceController
{
    use ResponseTrait;
    private $db;
    public function __construct()
    {
        $this->db = db_connect();
    }
    
    //get all the approve P.O.
    public function index(){
      $builder = $this->db->table('tblpurchase_logs a');
      $builder->select('a.purchaseLogID,a.purchaseNumber,c.OrderNo,c.ItemGroup,c.Reason,c.Department,c.DateNeeded,c.Urgency');
      $builder->join('tblcanvass_form b','b.Reference=a.Reference','LEFT');
      $builder->join('tblprf c','c.OrderNo=b.OrderNo','LEFT');
      $builder->WHERE('a.Status',1);
      $data['purchaseOrder'] = $builder->get()->getResult();
      return $this->respond($data);
    }

    public function listItems($id)
    {
        $builder = $this->db->table('tblcanvass_sheet a');
        $builder->select('a.Supplier,a.Price,b.Qty,b.Item_Name,b.ItemUnit,a.Currency,b.Specification,c.Reason');
        $builder->join('tbl_order_item b','b.orderID=a.orderID','LEFT');
        $builder->join('tblprf c','c.OrderNo=b.OrderNo','LEFT');
        $builder->WHERE('a.purchaseLogID',$id);
        $data['list'] = $builder->get()->getResult();
        return $this->respond($data);
    }

    public function totalAmount($id)
    {
        $builder = $this->db->table('tblcanvass_sheet a');
        $builder->select('a.Currency,SUM(a.Price*b.Qty)total,c.ItemGroup');
        $builder->join('tbl_order_item b','b.orderID=a.orderID','LEFT');
        $builder->join('tblprf c','c.OrderNo=b.OrderNo','LEFT');
        $builder->WHERE('a.purchaseLogID',$id);
        $data['total'] = $builder->get()->getResult();
        return $this->respond($data);
    }
}