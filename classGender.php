<?php
 include_once 'conection.php';
 class Gender {

    private $connecion;
    private $pdo;
    public function __construct()
    {
        $this->connecion = new ConnectionDB();
        $this->pdo  = $this->connecion->getCon();
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