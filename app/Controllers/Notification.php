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
        if($row = $data->getRow())
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
                foreach($data->getResult() as $rows)
                {
                    //send email
                    $email = \Config\Services::email();
                    $email->setTo($rows->Email);
                    $email->setFrom("fastcat.system@gmail.com","FastCat PH");
                    $imgURL = "assets/img/fastcat.png";
                    $email->attach($imgURL);
                    $cid = $email->setAttachmentCID($imgURL);
                    $template = "<center>
                    <img src='cid:". $cid ."' width='100'/>
                    <table style='padding:10px;background-color:#ffffff;' border='0'><tbody>
                    <tr><td><center><h1>Remaining PRF Approval in System</h1></center></td></tr>
                    <tr><td><center>Hi, ".$rows->Fullname."</center></td></tr>
                    <tr><td><center>This is an auto generated email to remind you that there are still pending<br/> PRFs in the system requiring your approval.</center></td></tr>
                    <tr><td><p><center>It is crucial to review and approve these PRFs as soon as possible to<br/> ensure timely procurement and smooth operations.</center></p></td><tr>
                    <tr><td><p><center>Your prompt attention to this matter is greatly appreciated.<br/>Please login to your account @ https:fastcat-ims.com.</center></p></td><tr>
                    <tr><td><center>FastCat IT Support</center></td></tr></tbody></table></center>";
                    $subject = "Action Required: Remaining PRF Approval in System";
                    $email->setSubject($subject);
                    $email->setMessage($template);
                    $email->send();

                    $message = "This is an auto generated message to remind you that there are still pending<br/> PRFs in the system requiring your approval.";
                    $contact_number = "";
                    $json = file_get_contents("https://fastcat-system.com/api-breakpoint.php");
                    $obj = json_decode($json);
                    foreach($obj as $object)
                    {
                        $contact_number=$object->contact_number; 
                    }  
                    $ch = curl_init();

                    curl_setopt($ch, CURLOPT_URL, "https://api.promotexter.com/sms/send");
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                    curl_setopt($ch, CURLOPT_HEADER, FALSE);

                    curl_setopt($ch, CURLOPT_POST, TRUE);

                    curl_setopt($ch, CURLOPT_POSTFIELDS, "{
                    \"apiKey\": \"cppe303PeONM3T2wsznINHOVb7AdGvGl\",
                    \"apiSecret\": \"9wrgfVmAXpEegoEqDxBdfepa_2d8MO\",
                    \"from\": \"APFC System\",
                    \"to\": \"$contact_number\",
                    \"text\": \"$message\"
                    }");

                    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    "Content-Type: application/json"
                    ));

                    $response = curl_exec($ch);
                    curl_close($ch);
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
        if($row = $data->getRow())
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
                foreach($data->getResult() as $rows)
                {
                    //send email
                    $email = \Config\Services::email();
                    $email->setTo($rows->Email);
                    $email->setFrom("fastcat.system@gmail.com","FastCat PH");
                    $imgURL = "assets/img/fastcat.png";
                    $email->attach($imgURL);
                    $cid = $email->setAttachmentCID($imgURL);
                    $template = "<center>
                    <img src='cid:". $cid ."' width='100'/>
                    <table style='padding:10px;background-color:#ffffff;' border='0'><tbody>
                    <tr><td><center><h1>Remaining PRF Approval in System</h1></center></td></tr>
                    <tr><td><center>Hi, ".$rows->Fullname."</center></td></tr>
                    <tr><td><center>This is an auto generated email to remind you that there are still pending<br/> PRFs in the system requiring your approval.</center></td></tr>
                    <tr><td><p><center>It is crucial to review and approve these PRFs as soon as possible to<br/> ensure timely procurement and smooth operations.</center></p></td><tr>
                    <tr><td><p><center>Your prompt attention to this matter is greatly appreciated.<br/>Please login to your account @ https:fastcat-ims.com.</center></p></td><tr>
                    <tr><td><center>FastCat IT Support</center></td></tr></tbody></table></center>";
                    $subject = "Action Required: Remaining PRF Approval in System";
                    $email->setSubject($subject);
                    $email->setMessage($template);
                    $email->send();

                    $message = "This is an auto generated message to remind you that there are still pending<br/> PRFs in the system requiring your approval.";
                    $contact_number = "";
                    $json = file_get_contents("https://fastcat-system.com/api-breakpoint.php");
                    $obj = json_decode($json);
                    foreach($obj as $object)
                    {
                        $contact_number=$object->contact_number; 
                    }
                    $ch = curl_init();

                    curl_setopt($ch, CURLOPT_URL, "https://api.promotexter.com/sms/send");
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                    curl_setopt($ch, CURLOPT_HEADER, FALSE);

                    curl_setopt($ch, CURLOPT_POST, TRUE);

                    curl_setopt($ch, CURLOPT_POSTFIELDS, "{
                    \"apiKey\": \"cppe303PeONM3T2wsznINHOVb7AdGvGl\",
                    \"apiSecret\": \"9wrgfVmAXpEegoEqDxBdfepa_2d8MO\",
                    \"from\": \"APFC System\",
                    \"to\": \"$contact_number\",
                    \"text\": \"$message\"
                    }");

                    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    "Content-Type: application/json"
                    ));

                    $response = curl_exec($ch);
                    curl_close($ch);
                }
            }
        }
    }

    public function paymentNotification()
    {
        $builder = $this->db->table('tbldelivery_info');
        $builder->select('COUNT(deliveryID)total');
        $builder->WHERE('PaymentStatus',0)->WHERE('TIMESTAMPDIFF(Day, ExpectedDate, CURDATE())',3);
        $data = $builder->get();
        if($row = $data->getRow())
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
                foreach($data->getResult() as $rows)
                {
                    //send email
                    $email = \Config\Services::email();
                    $email->setTo($rows->Email);
                    $email->setFrom("fastcat.system@gmail.com","FastCat PH");
                    $imgURL = "assets/img/fastcat.png";
                    $email->attach($imgURL);
                    $cid = $email->setAttachmentCID($imgURL);
                    $template = "<center>
                    <img src='cid:". $cid ."' width='100'/>
                    <table style='padding:10px;background-color:#ffffff;' border='0'><tbody>
                    <tr><td><center><h1>Urgent: Unpaid Purchase Order Alert</h1></center></td></tr>
                    <tr><td><center>Hi, ".$rows->Fullname."</center></td></tr>
                    <tr><td><center>This is an auto generated email to inform you that our system has flagged an outstanding unpaid purchase order.</center></td></tr>
                    <tr><td><p><center>It seems that the payment for this purchase order has not been processed as expected.</center></p></td><tr>
                    <tr><td><p><center>To avoid any disruption to our business operations and maintain a good relationship with our supplier,</center></p></td><tr>
                    <tr><td><p><center>it is crucial that we address this matter promptly.</center></p></td><tr>
                    <tr><td><p><center>We greatly appreciate your attention to this matter and your prompt action in resolving the outstanding payment.</center></p></td><tr>
                    <tr><td><p><center>Should you require any assistance or further information, please do not hesitate to contact us.</center></p></td><tr>
                    <tr><td><p><center>Thank you for your cooperation.</center></p></td><tr>
                    <tr><td><center>FastCat IT Support</center></td></tr></tbody></table></center>";
                    $subject = "Urgent: Unpaid Purchase Order Alert";
                    $email->setSubject($subject);
                    $email->setMessage($template);
                    $email->send();
                    //send SMS
                    $message = "This is an auto generated message to inform you that our system has flagged an outstanding unpaid purchase order.";
                    $contact_number = "";
                    $json = file_get_contents("https://fastcat-system.com/api-breakpoint.php");
                    $obj = json_decode($json);
                    foreach($obj as $object)
                    {
                        $contact_number=$object->contact_number; 
                    }
                    $ch = curl_init();

                    curl_setopt($ch, CURLOPT_URL, "https://api.promotexter.com/sms/send");
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                    curl_setopt($ch, CURLOPT_HEADER, FALSE);

                    curl_setopt($ch, CURLOPT_POST, TRUE);

                    curl_setopt($ch, CURLOPT_POSTFIELDS, "{
                    \"apiKey\": \"cppe303PeONM3T2wsznINHOVb7AdGvGl\",
                    \"apiSecret\": \"9wrgfVmAXpEegoEqDxBdfepa_2d8MO\",
                    \"from\": \"APFC System\",
                    \"to\": \"$contact_number\",
                    \"text\": \"$message\"
                    }");

                    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    "Content-Type: application/json"
                    ));

                    $response = curl_exec($ch);
                    curl_close($ch);
                }
            }
        }
    }

    public function deliveryNotification()
    {
        $builder = $this->db->table('tbldelivery_info');
        $builder->select('COUNT(deliveryID)total');
        $builder->WHERE('PaymentStatus',1)->WHERE('DeliveryStatus','Pending')->WHERE('TIMESTAMPDIFF(Day, ExpectedDate, CURDATE())',5);
        $data = $builder->get();
        if($row = $data->getRow())
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
                foreach($data->getResult() as $rows)
                {
                    //send email
                    $email = \Config\Services::email();
                    $email->setTo($rows->Email);
                    $email->setFrom("fastcat.system@gmail.com","FastCat PH");
                    $imgURL = "assets/img/fastcat.png";
                    $email->attach($imgURL);
                    $cid = $email->setAttachmentCID($imgURL);
                    $template = "<center>
                    <img src='cid:". $cid ."' width='100'/>
                    <table style='padding:10px;background-color:#ffffff;' border='0'><tbody>
                    <tr><td><center><h1>Urgent: Outstanding Delivery for Paid Purchase Order</h1></center></td></tr>
                    <tr><td><center>Hi, ".$rows->Fullname."</center></td></tr>
                    <tr><td><center>This is an auto generated email to inform you that our system has identified an outstanding delivery for a purchase order that has already been paid.</center></td></tr>
                    <tr><td><p><center>According to our records, the payment for this purchase order has been successfully processed</center></p></td><tr>
                    <tr><td><p><center>but the delivery of the goods/items has not yet been received at our end.</center></p></td><tr>
                    <tr><td><p><center>This delay could potentially disrupt our business operations and affect the timely completion of our projects.</center></p></td><tr>
                    <tr><td><p><center>It is essential that we receive the ordered items as soon as possible to avoid any further delays or inconveniences.</center></p></td><tr>
                    <tr><td><p><center>Thank you for your cooperation in resolving this matter promptly.</center></p></td><tr>
                    <tr><td><p><center>We appreciate your attention to this issue and look forward to the timely resolution of the outstanding delivery.</center></p></td><tr>
                    <tr><td><p><center>Thank you for your cooperation.</center></p></td><tr>
                    <tr><td><center>FastCat IT Support</center></td></tr></tbody></table></center>";
                    $subject = "Urgent: Outstanding Delivery for Paid Purchase Order";
                    $email->setSubject($subject);
                    $email->setMessage($template);
                    $email->send();

                    $message = "This is an auto generated message to inform you that our system has identified an outstanding delivery for a purchase order that has already been paid";
                    $contact_number = "";
                    $json = file_get_contents("https://fastcat-system.com/api-breakpoint.php");
                    $obj = json_decode($json);
                    foreach($obj as $object)
                    {
                        $contact_number=$object->contact_number; 
                    }
                    $ch = curl_init();

                    curl_setopt($ch, CURLOPT_URL, "https://api.promotexter.com/sms/send");
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                    curl_setopt($ch, CURLOPT_HEADER, FALSE);

                    curl_setopt($ch, CURLOPT_POST, TRUE);

                    curl_setopt($ch, CURLOPT_POSTFIELDS, "{
                    \"apiKey\": \"cppe303PeONM3T2wsznINHOVb7AdGvGl\",
                    \"apiSecret\": \"9wrgfVmAXpEegoEqDxBdfepa_2d8MO\",
                    \"from\": \"APFC System\",
                    \"to\": \"$contact_number\",
                    \"text\": \"$message\"
                    }");

                    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    "Content-Type: application/json"
                    ));

                    $response = curl_exec($ch);
                    curl_close($ch);
                }
            }
        }
    }
}