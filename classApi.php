<?php
 include_once 'classBand.php';
 include_once 'classMember.php';
 include_once 'classAlbum.php';
 class Api {

    public function getAll()
    {
        $band = new Band();
        $bands = array();
        $bands['Bands'] =  array();

        $response =  $band->getBand();
       
        if ($response->rowCount()>0) {
            while ($results = $response->fetch(PDO::FETCH_ASSOC)) {
               $item = array(
                    'BandId' => $results['IdBand'],
                    'BandLogo' => $results['BandLogo'],
                    'BandName' => $results['BandName'],
                    'BandFoundation' =>  $results['BandFoundation'],
                    'GenderName' => $results['GenderName'],
                    'GenderDescription' => $results['GenderDescription']
                );
               
                array_push($bands['Bands'],$item);    
            }
           echo json_encode($bands);
        }else{
            echo json_encode(array('Message'=> 'No bands exits'));
        }


        
    }
    public function getMembers()
    {
       $objMember = new Member();
       $members = array();
       $members['Members'] = array();

       $response = $objMember->getMembers();
       if ($response->rowCount()) {
        while ($results = $response->fetch(PDO::FETCH_ASSOC)) {
            $item = array (
                'MemberPicture' => $results['MemberPicture'],
                'MemberName' => $results['MemberName'],
                'BandName' => $results['BandName'],
                'BandLogo' => $results['BandLogo'],
                'BandFoundation' =>  $results['BandFoundation']
            );
            array_push($members['Members'],$item);
        }
        echo json_encode($members);
        }else{
            return 'ERROR: Not found any member';
        }
    }
    public function getAlbum()
    {
        $album = array();
        $albums = new Album();
        $albums['Albums'] = array();
        
        
    }
 }

?>