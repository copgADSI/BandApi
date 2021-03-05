<?php
 require_once 'instanceCon.php';
 class Band {
    private $strName;
    private $strFoundation;
    private $strGender;
    private $connecion;
    private $pdo;
    public function __construct()
    {
        //$name,$foundation,$gender
        /* $this->strName = $name;
        $this->strFoundation = $foundation;
        $this->strGender = $gender; */
       
        $this->connecion = new ConnectionDB;
        $this->pdo = $this->connecion->getCon();

    }
    public function getBand()
    {
        $queryBandAll = $this->pdo->prepare("SELECT * FROM Band 
        INNER JOIN Gender ON (Gender.IdGender = Band.IdGender)");
        $queryBandAll->execute();
         return $queryBandAll;
       
    }
    public function bandRegister($logo,$name,$foundation,$gender)
    {
        
        $fileName = $_FILES["file"]["name"];  
        $tmpName = $_FILES['file']['tmp_name'];

        move_uploaded_file($tmpName,'Images/Band/'. $fileName);
        $logoBand = 'Images/Band/'. $fileName;
        $queryInsert = $this->pdo->prepare('INSERT INTO Band 
        (BandLogo,BandName,BandFoundation,IdGender) 
        VALUES (:BandLogo,:BandName,:BandFoundation,:IdGender)');
        $queryInsert->bindParam(':BandLogo',$logoBand);
        $queryInsert->bindParam(':BandName',$name);
        $queryInsert->bindParam(':BandFoundation',$foundation);
        $queryInsert->bindParam(':IdGender', $gender); 
       
        if ( $queryInsert->execute()) {
            header('location: index.php');
            return 'New band inserted ';
        }
        return 'ERROR: Impossible insert a new band';
        
    }
    public function getGenderAll()
    {

        $query = $this->pdo->prepare("SELECT * FROM Gender");
        $query->execute();
        if ($query->rowCount()) {
            while ($gender = $query->fetchAll(PDO::FETCH_ASSOC)) {
                return $gender;
            }
        }else{
            return 'ERROR: Not found genders musicals';
        }
    }
 }

?>