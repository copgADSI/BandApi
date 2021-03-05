
<?php
 
 require_once 'header.php';
  require_once  'classAlbum.php'; 
  require_once 'classBand.php';


 $objAlbum = new Album();
 if (isset($_POST['publish']) && isset($_POST['publish']) && isset($_POST['recording'])
     && isset($_POST['duration']) && isset($_POST['quantity']) && isset($_POST['band'])) {
      
     echo $picture = $_FILES['picture']['name'];
      $publish = $_POST['publish'];
      $recording = $_POST['recording'];
      $duration = $_POST['duration'];
      $quantity = $_POST['quantity'];
      $idBand = $_POST['band'];
      $album = $objAlbum->createAlbum($picture,$publish,$recording,$duration,$quantity,$idBand);
      print_r($album);
    }

 $objBand = new Band();
 $band = $objBand->getBand();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register album</title>
</head>

<body>
    <center>

        <div class="card py-5" style="width: 400px;">
            <form action="" method="post" enctype="multipart/form-data">

                <div class="form-group">

                    <input type="file" name="picture" class="form-control">
                </div>
                <input type="date" name="publish" class="form-control" placeholder="Enter album publish*">
                <input type="text" name="recording" class="form-control" placeholder="Enter album recording*">
                <input type="text" name="duration" class="form-control" placeholder="Enter album duration*">
                <input type="number" name="quantity" class="form-control" value="0" placeholder="Enter total songs*">

                
                <select name="band" class="form-control">
                    <?php

                    while ($result = $band->fetch(PDO::FETCH_ASSOC)) { ?>

                        <option value="0">Select Band...</option>
                        <option value="<?php print_r($result['IdBand']) ?>"><?php print_r($result['BandName']) ?></option>

                    <?php }
                    ?>

                </select>
                <div class="d-grid gap-2">
                    <input type="submit" value="Save album" class="btn btn-outline-primary mt-3">
                </div>
            </form>
        </div>
    </center>
</body>
<style>
       body{
           background-color: #001120;
       }
    </style>
</html>