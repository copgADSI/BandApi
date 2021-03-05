<?php
 include_once  'header.php';
?>

<?php
 include_once 'classApi.php';
 $objApi = new Api();
 $api = $objApi->getAll();



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
   
    <style>
       
       body{
           background-color: #001120;
       }
    </style>
</body>
</html>
