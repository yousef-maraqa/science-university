<?php

include_once(dirname(__FILE__).'/../config/Database.php');


 class Media  extends Database{
public function insertIMG($img_url,$img_alt,$sourse){
 
 $this->query('
 INSERT INTO media  (img_url, img_Alt , sourse ) VALUES(:img_url , :img_Alt ,:sourse);  ');
 
 $this->bind(':img_url', $img_url);
 $this->bind(':img_Alt', $img_alt);
 $this->bind(':sourse', $sourse);
 $this->execute();

}

 }