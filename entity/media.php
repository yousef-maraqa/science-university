<?php

include_once(dirname(__FILE__).'/../config/Database.php');


 class Media  extends Database{
public function insertIMG($img_url,$img_alt,$sourse){
 
 $this->query('
 INSERT INTO media  (img_url, img_alt , sourse ) VALUES(:img_url , :img_Alt ,:sourse);  ');
 
 $this->bind(':img_url', $img_url);
 $this->bind(':img_Alt', $img_alt);
 $this->bind(':sourse', $sourse);
 $this->execute();

}

public function updateIMG($img_url,$img_alt,$sourse ,$entity_id){
    $this->query('UPDATE media SET img_url=:img_url , img_alt=:img_alt , sourse=:sourse  WHERE  media_id=:entity_id');
    $this->bind(':entity_id', $entity_id);
    $this->bind(':img_url', $img_url);
    $this->bind(':img_alt', $img_alt);
    $this->bind(':sourse', $sourse);
    $this->execute();
}

 }