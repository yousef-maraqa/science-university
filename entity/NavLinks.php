<?php
 
include_once(dirname(__FILE__).'/../config/Database.php');


 class NavLinks  extends Database{
 
     public function fetchHeader() {
        $this->query('SELECT * FROM navigationLinks WHERE type=header ORDER BY created_at   ');
         $this->execute();
         $row=$this->resultset();
         return $row;
     }
 

     public function fetchAll() {
        $this->query('SELECT * FROM navigationLinks ORDER BY created_at   ');
         $this->execute();
         $row=$this->resultset();
         return $row;
     }
     public function fetchCluster($cluster) {
        $this->query('SELECT * FROM navigationLinks WHERE cluster_title=:cluster   ORDER BY created_at   ');
        $this->bind(':cluster',$cluster);
       
         $this->execute();
         $row=$this->resultset();
         return $row;
     }
    
     public function newLink($title,$path ,$type , $cluster_title ,$userid){
        $this->query('INSERT INTO navigationLinks (user_id , cluster_title, title , path, type) VALUES(:userid,:cluster_title ,:title, :path, :type )');
		$this->bind(':title',$title);
		$this->bind(':path',$path);
        $this->bind(':type',$type);
        $this->bind(':cluster_title',$cluster_title);
 		$this->bind(':userid',$userid);
		
		$this->execute();
     }
     public function deleteLink($id){
        $this->query('DELETE FROM navigationLinks WHERE navigation_id = :id');
        $this->bind(':id',$id);
        $this->execute();
     }
     public function updateLink ($title,$path, $type  , $cluster_title ,$linkId ,$userid){
        $this->query('UPDATE navigationLinks SET user_id=:userid , cluster_title=:cluster_title , title=:title ,path=:path ,type=:type   WHERE navigation_id=:linkId');
        $this->bind(':title',$title);
		$this->bind(':path',$path);
        $this->bind(':type',$type);
        $this->bind(':linkId',$linkId);
        $this->bind(':cluster_title',$cluster_title);
        $this->bind(':userid',$userid);
        $this->execute();
	 
     }
     public function getElementById($id){
         $this->query('SELECT * FROM navigationLinks WHERE navigation_id=:id');
         $this->bind('id',$id);
         $this->execute();
         $row=$this->resultset();
         return $row;

     }

 
     
 }
?>