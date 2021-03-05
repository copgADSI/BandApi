
<?php
 require_once 'classBand.php';
 require_once 'classMember.php';
 $objBand = new Band();

 $band = $objBand->getBand();
 
 if (isset($_POST['name']) && isset($_POST['band'])) {
      $name = $_POST['name'];
      $picture = $_FILES['picture']['name'];
      $idBand = $_POST['band'];
      $objMember = new Member(); 
      $member =  $objMember->memberRegister($picture,$name,$idBand); 
      print_r($member);
 }
?>
<?php
 require_once  'header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Get members - Members registers</title>
</head>

<body>
  <center>
  <div class="card py-5 " style="width: 400px;">
    <form action="memberRegister.php" method="post" enctype="multipart/form-data">
      <input type="file" name="picture" class="form-control">
      <input type="text" name="name" placeholder="member name*" class="form-control">
      <select name="band" class="form-control">
        <option value="1">Select band...</option>
        <?php
        foreach ($band as  $listBand) { ?>
          <option value="<?php print_r($listBand['IdBand']) ?>"><?php print_r($listBand['BandName']) ?></option>
        <?php
        } ?>
      </select>
      <button type="submit" class="btn btn-outline-primary mt-3">Save member</button>
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