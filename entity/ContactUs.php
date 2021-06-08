<?php 
include_once(dirname(__FILE__).'/../config/Database.php');


class ContactUs  extends Database{
public function insert($fullName,$phoneNumber,$email,$body){

$this->query('INSERT INTO contact_us (fullName , phoneNum , email , body)
 VALUES (:fullName, :phoneNumber , :email , :body )' );

$this->bind(':fullName', $fullName);
$this->bind(':phoneNumber', $phoneNumber);
$this->bind(':email', $email);
$this->bind(':body', $body);
$this->execute();



}
public function fetchAll(){
    $this->query('SELECT * from contact_us');
    $this->execute();
   $row= $this->resultset();
   return $row;
}

public function deleteMessage($id){
    $this->query('DELETE FROM contact_us WHERE contact_us_id = :id');
    $this->bind(':id',$id);
    $this->execute();
 }

}
$contactUs= new ContactUs();
if (isset($_POST['submit'])) {
    $msg='';
        $fullName=$_POST['fullName'];    
        $phoneNumber=$_POST['phoneNumber'];    
        $email=$_POST['email'];    
        $body=$_POST['body'];    

            try {
                $contactUs->insert($fullName,$phoneNumber,$email,$body);
                $msg='success';
                header('location:../html_pages/index.php?query='. $msg );
                die();
               
            } catch (\Throwable $th) {
              echo $th;
            }
       
}

?>