<?php
 
include_once(dirname(__FILE__).'/../config/Database.php');


 class Events  extends Database{
 
     public function fetchAll() {
        $this->query('SELECT * FROM events ORDER BY created_at DESC');
         $this->execute();
         $row=$this->resultset();
         return $row;
     }
 


       public function fetchWithImg(){
           $this->query(' SELECT 
           E.event_id , E.user_id , E.title ,E.body , E.summary ,E.start_time, E.end_time ,E.date , E.location ,E.status ,E.media_pk,E.created_at,E.updated_at  ,M.img_url ,M.img_Alt ,M.sourse
            FROM events AS E
           INNER JOIN media AS M
           ON E.media_PK= M.media_PK
             ORDER BY created_at DESC');
             $this->execute();
             $row=$this->resultset();
             return $row;

       }
    
     public function newEvent($title, $body, $summary, $start_time,$end_time,$date, $location,  $status, $userid){
        $this->query('INSERT INTO events (user_id , title,body,summary ,start_time,end_time, date, location,status ,media_PK) VALUES(:userid,:title,:body, :summary ,:start_time, :end_time, :date ,  :location, :status,
        (SELECT media_PK FROM media ORDER BY media_PK DESC LIMIT 1))');
		$this->bind(':title',$title);
		$this->bind(':body',$body);
		$this->bind(':start_time',$start_time);
		$this->bind(':end_time',$end_time);
        $this->bind(':date',$date);
		$this->bind(':location',$location);
        $this->bind(':summary',$summary);
		$this->bind(':status',$status);
		$this->bind(':userid',$userid);
		$this->execute();
     }
     public function deleteEvent($id){
        $this->query('DELETE FROM events WHERE event_id = :id');
        $this->bind(':id',$id);
        $this->execute();
     }
     public function updateEvent($title,$body,$start_time,$end_time, $date, $location,$summary,$status, $userid,$event_id){
        $this->query('UPDATE events SET title=:title ,body=:body ,summary=:summary, start_time=:start_time , end_time=:end_time , date=:date , location=:location, status=:status , user_id=:userid WHERE event_id=:event_id');
        $this->bind(':title',$title);
		$this->bind(':body',$body);
		$this->bind(':start_time',$start_time);
		$this->bind(':end_time',$end_time);
        $this->bind(':date',$date);
		$this->bind(':location',$location);
        $this->bind(':summary',$summary);
		$this->bind(':status',$status);
        $this->bind(':event_id',$event_id);
        $this->bind(':userid',$userid);

        $this->execute();
	 
     }
     public function getElementById($event_id){
         $this->query('SELECT * FROM events WHERE event_id=:event_id');
         $this->bind('event_id',$event_id);
         $this->execute();
         $row=$this->resultset();
         return $row;

     }

 
     
 }
?>