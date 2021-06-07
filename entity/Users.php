<?php
 
include_once(dirname(__FILE__).'/../config/Database.php');


 class Users  extends Database{
 
     public function fetchAll() {
        $this->query('SELECT * FROM users ORDER BY created_at DESC');
         $this->execute();
         $row=$this->resultset();
         return $row;
     }
     public function fetchAllToDelete($user_id) {
        $this->query('SELECT user_id , name ,email , role ,is_active , created_at   FROM users
        WHERE user_id<>:userid 
         ORDER BY created_at DESC');
         		$this->bind(':userid',$user_id);
         $this->execute();
         $row=$this->resultset();
         return $row;
     }
    
     public function newUser($name, $email, $password, $role, $is_active){
        $this->query('INSERT INTO users (name, email,password,role,is_active) VALUES(:name,:email,:password, :role, :is_active)');
		$this->bind(':name',$name);
		$this->bind(':email',$email);
		$this->bind(':password',$password);
		$this->bind(':role',$role);
		$this->bind(':is_active',$is_active);
      
		
		$this->execute();
     }
     public function deleteUser($id){
        $this->query('DELETE FROM users WHERE user_id = :id');
        $this->bind(':id',$id);
        $this->execute();
     }
     public function accountSettings($title,$body,$startDate,$endDate,$location,$summary,$status, $userid,$event_id){
        $this->query('UPDATE users SET title=:title ,body=:body ,summary=:summary, start_date=:start_date , end_date=:end_date , location=:location, status=:status , user_id=:userid WHERE event_id=:event_id');
        $this->bind(':title',$title);
		$this->bind(':body',$body);
		$this->bind(':start_date',$startDate);
		$this->bind(':end_date',$endDate);
		$this->bind(':location',$location);
        $this->bind(':summary',$summary);
		$this->bind(':status',$status);
        $this->bind('event_id',$event_id);
        $this->bind(':userid',$userid);
        $this->execute();
	 
     }
     public function passwordVerify($password ,$userID){
    $this->query('SELECT password FROM users WHERE user_id=:userID');
    $this->bind(':userID',$userID);
    $this->execute();
    $row=$this->resultset();
    if (password_verify($password,$row[0]['password'])) {
       return true;
    }else{
        return false;
    }

     }

     public function updatePassword($password, $userID){
        $this->query('UPDATE users SET password=:password WHERE user_id=:userID ');
        $this->bind(':userID',$userID);
        $this->bind(':password',$password);
        $this->execute();

     }


     public function updateUsers($is_active, $userid){ 
        $this->query('UPDATE users SET is_active=:is_active   WHERE user_id=:user_id');
        $this->bind(':is_active',$is_active);
        $this->bind(':user_id',$userid);
		
        $this->execute();
	 
     }
     public function getElementById($userID){
         $this->query('SELECT * FROM users WHERE user_id=:userID');
         $this->bind('userID',$userID);
         $this->execute();
         $row=$this->resultset();
         return $row;

     }

 
     
 }
?>