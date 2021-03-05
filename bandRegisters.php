<?php
 
 require_once 'classBand.php';

 //OBJGenders musicals
  $objBand = new Band();

  $gender = $objBand->getGenderAll();
  
  if (isset($_POST['name']) && isset($_POST['foundation']) && isset($_POST['gender'])) {
    require_once 'classBand.php';
      $logo = $_FILES['file']['name'];
      $name = $_POST['name'];
      $foundation = $_POST['foundation'];
      $gender = $_POST['gender'];
      //$name,$foundation,$gender
     
      $band = $objBand->bandRegister($logo,$name,$foundation,$gender);
      print_r($band);   
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
    <title>Document</title>
</head>

<body>
   <center>
   <div class="card" style="width: 400px;">
        <form action="bandRegisters.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="file" class="form-control">
            <input type="text" name="name" placeholder="Band name*" class="form-control">
            <input type="text" name="foundation" placeholder="Band foundation*" class="form-control">
            <select name="gender" class="form-control">
                <option value="1">Select gender...</option>
                <?php
                        foreach ($gender as $listGenders) { ?>
                <?php echo $listGenders['GenderName'] ?>
                <option title="<?php print_r($listGenders['GenderDescription']) ?>" value="<?php print_r($listGenders['IdGender']) ?>"><?php print_r($listGenders['GenderName']) ?></option>
                 <?php
                        } ?>
            </select>
            <button type="submit" class="btn btn-outline-primary">Save</button>
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