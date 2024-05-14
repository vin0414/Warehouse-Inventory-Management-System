<?php

namespace App\Controllers;

class Notification extends BaseController
{
    private $db;
    public function __construct()
    {
        $this->db = db_connect();
    }

    //3 days
    public function firstAlarm()
    {
        $builder = $this->db->table('tblprf');
        $builder->select('COUNT(prfID)total');
        $builder->WHERE('Status<>',3)->WHERE('TIMESTAMPDIFF(Day, DateCreated, CURDATE())',5);
        $data = $builder->get();
        foreach($data->getResult() as $row)
        {
            if($row->total==0)
            {
                //do nothing
            }
            else
            {
                //get all editors account except MIS
                $role = ['Administrator','Editor'];
                $builder = $this->db->table('tblaccount');
                $builder->select('Email,Fullname');
                $builder->WHEREIN('systemRole',$role)->WHERE('Status',1)->WHERE('Department!=','MIS');
                $data = $builder->get();
                foreach($data->getResult() as $row)
                {
                    //send email
                    $email = \Config\Services::email();
                    $email->setTo($row->Email,$row->Fullname);
                    $email->setFrom("fastcat.system@gmail.com","FastCat PH");
                    $imgURL = "assets/img/fastcat.png";
                    $email->attach($imgURL);
                    $cid = $email->setAttachmentCID($imgURL);
                    $template = "<center>
                    <img src='cid:". $cid ."' width='100'/>
                    <table style='padding:10px;background-color:#ffffff;' border='0'><tbody>
                    <tr><td><center><h1>Remaining PRF Approval in System</h1></center></td></tr>
                    <tr><td><center>Hi, ".$row->Fullname."</center></td></tr>
                    <tr><td><center>This is an auto generated email to remind you that there are still pending<br/> PRFs (PRF #) in the system requiring your approval.</center></td></tr>
                    <tr><td><p><center>It is crucial to review and approve these PRFs as soon as possible to<br/> ensure timely procurement and smooth operations.</center></p></td><tr>
                    <tr><td><p><center>Your prompt attention to this matter is greatly appreciated.<br/>Please login to your account @ https:fastcat-ims.com.</center></p></td><tr>
                    <tr><td><center>FastCat IT Support</center></td></tr></tbody></table></center>";
                    $subject = " Action Required: Remaining PRF Approval in System";
                    $email->setSubject($subject);
                    $email->setMessage($template);
                    $email->send();
                }
            }
        }
    }

    //5 days
    public function finalAlarm()
    {
        $builder = $this->db->table('tblprf');
        $builder->select('COUNT(prfID)total');
        $builder->WHERE('Status<>',3)->WHERE('TIMESTAMPDIFF(Day, DateCreated, CURDATE())',10);
        $data = $builder->get();
        foreach($data->getResult() as $row)
        {
            if($row->total==0)
            {
                //do nothing
            }
            else
            {
                //get all editors account except MIS
                $role = ['Administrator','Editor'];
                $builder = $this->db->table('tblaccount');
                $builder->select('Email,Fullname');
                $builder->WHEREIN('systemRole',$role)->WHERE('Status',1)->WHERE('Department!=','MIS');
                $data = $builder->get();
                foreach($data->getResult() as $row)
                {
                    //send email
                    $email = \Config\Services::email();
                    $email->setTo($row->Email,$row->Fullname);
                    $email->setFrom("fastcat.system@gmail.com","FastCat PH");
                    $imgURL = "assets/img/fastcat.png";
                    $email->attach($imgURL);
                    $cid = $email->setAttachmentCID($imgURL);
                    $template = "<center>
                    <img src='cid:". $cid ."' width='100'/>
                    <table style='padding:10px;background-color:#ffffff;' border='0'><tbody>
                    <tr><td><center><h1>Remaining PRF Approval in System</h1></center></td></tr>
                    <tr><td><center>Hi, ".$row->Fullname."</center></td></tr>
                    <tr><td><center>This is an auto generated email to remind you that there are still pending<br/> PRFs (PRF #) in the system requiring your approval.</center></td></tr>
                    <tr><td><p><center>It is crucial to review and approve these PRFs as soon as possible to<br/> ensure timely procurement and smooth operations.</center></p></td><tr>
                    <tr><td><p><center>Your prompt attention to this matter is greatly appreciated.<br/>Please login to your account @ https:fastcat-ims.com.</center></p></td><tr>
                    <tr><td><center>FastCat IT Support</center></td></tr></tbody></table></center>";
                    $subject = " Action Required: Remaining PRF Approval in System";
                    $email->setSubject($subject);
                    $email->setMessage($template);
                    $email->send();
                }
            }
        }
    }
}