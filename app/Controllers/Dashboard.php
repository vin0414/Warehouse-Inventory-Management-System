<?php

namespace App\Controllers;
use App\Libraries\Hash;
header('Access-Control-Allow-Origin: *');
class Dashboard extends BaseController
{
    private $db;
    public function __construct()
    {
        $this->db = db_connect();
    }

    public function allPRF()
    {
        $builder = $this->db->table('tblprf');
        $builder->select('OrderNo,DateNeeded');
        $builder->WHERE('Status<>',3);
        $builder->orderBy('prfID','DESC');
        $builder->limit(10);
        $data = $builder->get();
        foreach($data->getResult() as $row)
        {
            ?>
            <li>
                <h4>
                    <a href="javascript:void(0);">
                        <?php echo $row->OrderNo ?>
                    </a>
                </h4>
                <span>Date Needed : <?php echo $row->DateNeeded ?></span><span style="float:right;"></span>
            </li>
            <?php
        }
    }

    public function allPO()
    {

    }

    public function emergencyPRF()
    {
        $builder = $this->db->table('tblprf');
        $builder->select('OrderNo, Reason, DateNeeded');
        $builder->WHERE('Status<>',3)->WHERE('Urgency',1);
        $builder->limit(5);
        $data = $builder->get();
        foreach($data->getResult() as $row)
        {
            ?>
            <li>
                <h4>
                    <a href="javascript:void(0);">
                        <?php echo $row->OrderNo ?> - <?php echo substr($row->Reason,0,20) ?>..
                    </a>
                </h4>
                <span>Date Needed : <?php echo $row->DateNeeded ?></span><span style="float:right;"></span>
            </li>
            <?php
        }
    }

    public function urgentPRF()
    {
        $builder = $this->db->table('tblprf');
        $builder->select('OrderNo, Reason, DateNeeded');
        $builder->WHERE('Status<>',3)->WHERE('Urgency',2);
        $builder->limit(5);
        $data = $builder->get();
        foreach($data->getResult() as $row)
        {
            ?>
            <li>
                <h4>
                    <a href="javascript:void(0);">
                        <?php echo $row->OrderNo ?> - <?php echo substr($row->Reason,0,20) ?>..
                    </a>
                </h4>
                <span>Date Needed : <?php echo $row->DateNeeded ?></span><span style="float:right;"></span>
            </li>
            <?php
        }
    }

    public function moderatePRF()
    {
        $builder = $this->db->table('tblprf');
        $builder->select('OrderNo, Reason, DateNeeded');
        $builder->WHERE('Status<>',3)->WHERE('Urgency',3);
        $builder->limit(5);
        $data = $builder->get();
        foreach($data->getResult() as $row)
        {
            ?>
            <li>
                <h4>
                    <a href="javascript:void(0);">
                        <?php echo $row->OrderNo ?> - <?php echo substr($row->Reason,0,20) ?>..
                    </a>
                </h4>
                <span>Date Needed : <?php echo $row->DateNeeded ?></span><span style="float:right;"></span>
            </li>
            <?php
        }
    }

    public function lowPRF()
    {
        $builder = $this->db->table('tblprf');
        $builder->select('OrderNo, Reason, DateNeeded');
        $builder->WHERE('Status<>',3)->WHERE('Urgency',4);
        $builder->limit(5);
        $data = $builder->get();
        foreach($data->getResult() as $row)
        {
            ?>
            <li>
                <h4>
                    <a href="javascript:void(0);">
                        <?php echo $row->OrderNo ?> - <?php echo substr($row->Reason,0,20) ?>..
                    </a>
                </h4>
                <span>Date Needed : <?php echo $row->DateNeeded ?></span><span style="float:right;"></span>
            </li>
            <?php
        }
    }

    public function Notification($username)
    {
        $accountModel = new \App\Models\accountModel();
        $user_info = $accountModel->where('username', $username)->WHERE('Status',1)->first();
        //PRF
        $prf=0;$canvass=0;$po = 0;
        $builder = $this->db->table('tblreview');
        $builder->select('COUNT(reviewID)total');
        $builder->WHERE('Status',0)->WHERE('accountID',$user_info['accountID']);
        $data = $builder->get();
        if($row = $data->getRow())
        {
            $prf = $row->total;
        }
        //Purchase Order
        $builder = $this->db->table('tblpurchase_review');
        $builder->select('COUNT(prID)total');
        $builder->WHERE('Status',0)->WHERE('accountID',$user_info['accountID']);
        $data = $builder->get();
        if($row = $data->getRow())
        {
            $po = $row->total;
        }
        //canvass
        $builder = $this->db->table('tblcanvass_review');
        $builder->select('COUNT(crID)total');
        $builder->WHERE('Status',0)->WHERE('accountID',$user_info['accountID']);
        $data = $builder->get();
        if($row = $data->getRow())
        {
            $canvass= $row->total;
        }

        echo $prf + $canvass + $po;
    }
    
    public function autoLogin($username)
    {
        $accountModel = new \App\Models\accountModel();
        $systemLogsModel = new \App\Models\systemLogsModel();
        $warehouseModel = new \App\Models\warehouseModel();
        $password = "Fastcat_01";
        
        $user_info = $accountModel->where('username', $username)->WHERE('Status',1)->first();
        if(empty($user_info['accountID']))
        {
            session()->setFlashdata('fail','Invalid! No existing account');
            return redirect()->to('/auth')->withInput();
        }
        else
        {
            $check_password = Hash::check($password, $user_info['password']);
            if(!$check_password || empty($check_password))
            {
                session()->setFlashdata('fail','Invalid Username or Password!');
                return redirect()->to('/auth')->withInput();
            }
            else
            {
                $warehouse = $warehouseModel->WHERE('warehouseID',$user_info['warehouseID'])->first();
                session()->set('loggedUser', $user_info['accountID']);
                session()->set('fullname', $user_info['Fullname']);
                session()->set('role',$user_info['systemRole']);
                session()->set('assignment',$user_info['warehouseID']);
                session()->set('department',$user_info['Department']);
                session()->set('location',$warehouse['warehouseName']);
                    
                //save the logs
                $values = ['accountID'=>$user_info['accountID'],'Date'=>date('Y-m-d H:i:s a'),'Activity'=>'Logged-In'];
                $systemLogsModel->save($values);
                return redirect()->to('/dashboard');
            }
        }
    }

    public function returnOrder()
    {
        $builder = $this->db->table('tblreturn');
        $builder->select('FORMAT(COUNT(returnID),0)total');
        $builder->WHERE('Status',0);
        $data = $builder->get();
        if($row = $data->getRow())
        {
            echo $row->total;
        }
    }

    public function damageItem()
    {
        $builder = $this->db->table('tbldamagereport a');
        $builder->select('FORMAT(COUNT(a.reportID),0)total');
        $builder->join('tblinventory b','b.inventID=a.inventID','LEFT');
        $builder->WHERE('a.Status',0);
        $data = $builder->get();
        if($row = $data->getRow())
        {
            echo $row->total;
        }
    }

    public function overhaulItem()
    {
        $builder = $this->db->table('tblrepairreport a');
        $builder->select('FORMAT(COUNT(a.rrID),0)total');
        $builder->join('tbldamagereport b','b.reportID=a.reportID','LEFT');
        $builder->join('tblinventory c','c.inventID=b.inventID','LEFT');
        $builder->WHERE('a.Status',0);
        $data = $builder->get();
        if($row = $data->getRow())
        {
            echo $row->total;
        }
    }

    public function transferItem()
    {
        $builder = $this->db->table('tbltransfer_request');
        $builder->select('FORMAT(COUNT(requestID),0)total');
        $builder->WHERE('Status',0);
        $data = $builder->get();
        if($row = $data->getRow())
        {
            echo $row->total;
        }
    }
}