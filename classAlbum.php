<?php

include_once 'instanceCon.php';
 class Album {
    
    private $connection;
    private $pdo;
    public function __construct()
    {
        $this->connection = new ConnectionDB();
        $this->pdo = $this->connection->getCon();
    }
    public function createAlbum(string $picture,  $publish, string $recording,string $duration,int $quantity,int $idBand)
    {
        $tmp_name = $_FILES['picture']['tmp_name'];
        $pictureUrl = 'Images/Albums/'. $picture;


        $query = $this->pdo->prepare('INSERT INTO Album
        (AlbumPicture,DatePublish,Recording,DurationTotal,Quantity,IdBand) 
        VALUES (:AlbumPicture,:DatePublish,:Recording,:DurationTotal,:Quantity,:IdBand)');
        $query->bindParam(':AlbumPicture',$pictureUrl); 
        $query->bindParam(':DatePublish',$publish);    
        $query->bindParam(':Recording',$recording);    
        $query->bindParam(':DurationTotal',$duration);    
        $query->bindParam(':Quantity',$quantity);    
        $query->bindParam(':IdBand',$idBand);    

        $query->execute();
        // Movemos el archivo a la carpeta correspondiente 
       
        move_uploaded_file($tmp_name,$pictureUrl);
        header('location: albumRegister.php');
   
    }
 } 

?>