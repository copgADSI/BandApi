<?php
 include_once 'conection.php';
 class  Member {

    private $strMemberPicture;
    private $strMemberName;
    private $strBand;

    private $connection;
    private $pdo;
    public function __construct()
    {
     

        $this->connection = new ConnectionDB();
        $this->pdo = $this->connection->getCon();

    }
    public function getMembers()
    {
        $query = $this->pdo->prepare("SELECT * FROM Members
        INNER JOIN Band ON (Band.IdBand = Members.IdBand)");
        $query->execute();
        return $query;
        /* if ($query->rowCount()) {
            while ($results = $query->fetchAll(PDO::FETCH_ASSOC)) {
                return $results;
            }
        }else{
            return 'ERROR: Not found any member';
        } */

    }
    public function memberRegister(string $memberPicture,string $memberName,int $band)
    {
       
        $fileName = $_FILES['picture']['name'];
        $tmpName = $_FILES['picture']['tmp_name'];
        move_uploaded_file($tmpName,'Images/Members/'.$fileName);
        
        $picture = 'Images/Members/'.$fileName;
        $query = $this->pdo->prepare('INSERT INTO Members
        (MemberPicture,MemberName,IdBand)
        VALUES (:MemberPicture,:MemberName,:IdBand)');
        
        $query->bindParam(':MemberPicture',$picture);
        $query->bindParam(':MemberName',$memberName);
        $query->bindParam(':IdBand',$band);
        $query->execute();

    }
 }

?>