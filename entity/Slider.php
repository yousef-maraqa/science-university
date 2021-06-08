<?php
 
include_once(dirname(__FILE__).'/../config/Database.php');


 class Slider  extends Database{
 
     public function fetchAll() {
        $this->query('SELECT S.slider_id ,S.user_id, S.slider_text,S.rank , M.img_url ,M.img_Alt ,M.sourse ,S.created_at
         FROM slider AS S
           INNER JOIN media AS M
          ON S.media_PK= M.media_PK
          ORDER BY S.rank   ');
         $this->execute();
         $row=$this->resultset();
         return $row;
     }
     
 
    
     public function newSlider($slider_text,$rank,$userid){
 
         $this->query('INSERT INTO slider (user_id , slider_text , rank , media_PK ) VALUES ( :userid , :slider_text , :rank , 
         (SELECT media_PK FROM media ORDER BY media_PK DESC LIMIT 1))');
          
		$this->bind(':slider_text',$slider_text);
		$this->bind(':rank',$rank);
		$this->bind(':userid',$userid);
		
		$this->execute();

      
     }
     public function deleteSlider($id){
        $this->query('DELETE FROM slider WHERE slider_id = :id');
        $this->bind(':id',$id);
        $this->execute();
     }

     public function getElementById($slider_id){
      $this->query('SELECT S.slider_id ,S.user_id, S.slider_text,S.rank , S.media_PK , M.img_url ,M.img_Alt ,M.sourse ,S.created_at
      FROM slider AS S
        INNER JOIN media AS M
       ON S.media_PK= M.media_PK
       WHERE slider_id =:slider_id
       ORDER BY S.rank   ');
       $this->bind(':slider_id',$slider_id);

      $this->execute();
      $row=$this->resultset();
      return $row;
  

  }
 
 
  public function updateSlider($slider_text,$rank,$slider_id){
   $this->query('UPDATE slider SET  slider_text=:slider_text , rank=:rank    WHERE slider_id=:slider_id');
	$this->bind(':slider_text',$slider_text);
   $this->bind(':rank',$rank);
   $this->bind(':slider_id',$slider_id);
   $this->execute();

}
 
     
 }
?>