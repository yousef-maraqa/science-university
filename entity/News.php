<?php
 
include_once(dirname(__FILE__).'/../config/Database.php');


 class News  extends Database{
 
     public function fetchAll() {
        $this->query('SELECT * FROM news ORDER BY created_at DESC ');
         $this->execute();
         $row=$this->resultset();
         return $row;
     }
     public function fetchWithImg(){
        $this->query(' 
        SELECT  N.news_id , N.user_id ,N.title ,  M.img_url , N.status ,N.created_at  

         FROM news AS N
        INNER JOIN media AS M
        ON N.media_id= M.media_id
          ORDER BY created_at DESC');
          $this->execute();
          $row=$this->resultset();
          return $row;
    }
    public function fetchWithImgActive(){
        $this->query(' 
        SELECT  N.news_id , N.summary , N.user_id ,N.title ,  M.img_url , N.status ,N.created_at  

         FROM news AS N
        INNER JOIN media AS M
        ON N.media_id= M.media_id
        WHERE status =:published
          ORDER BY created_at DESC');
          $this->bind(':published','published');
          $this->execute();
          $row=$this->resultset();
          return $row;

    }
 
    
     public function newNews($title,$body,$summary,$status,$userid){
        $this->query('INSERT INTO news (user_id , title,body,summary,status ,media_id) VALUES(:userid,:title,:body,:summary ,:status , (SELECT media_id FROM media ORDER BY media_id DESC LIMIT 1) )');
		$this->bind(':title',$title);
		$this->bind(':body',$body);
        $this->bind(':summary',$summary);
		$this->bind(':status',$status);
		$this->bind(':userid',$userid);
		
		$this->execute();
     }

      
 



     public function deleteNews($id){
        $this->query('DELETE FROM news WHERE news_id = :id');
        $this->bind(':id',$id);
        $this->execute();
     }
     public function updateNews($title,$body,$summary,$status ,$news_id ,$userid){
        $this->query('UPDATE news SET user_id=:userid , title=:title ,body=:body ,summary=:summary,  status=:status WHERE news_id=:news_id');
        $this->bind(':title',$title);
		$this->bind(':body',$body);
        $this->bind(':summary',$summary);
		$this->bind(':status',$status);
        $this->bind('news_id',$news_id);
        $this->bind(':userid',$userid);
        $this->execute();
	 
     }
     public function getElementById($news_id){
         $this->query(' 
              SELECT  N.news_id ,N.body , N.user_id ,N.title , N.summary , N.media_id ,  M.img_url ,M.img_Alt , N.status ,N.created_at  

         FROM news AS N
        INNER JOIN media AS M
        ON N.media_id= M.media_id
        
         WHERE news_id=:news_id
         ORDER BY created_at DESC');
         $this->bind('news_id',$news_id);
         $this->execute();
         $row=$this->resultset();
         return $row;

     }

 
     
 }
?>