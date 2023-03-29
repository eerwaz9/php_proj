<?php

include '../int.php'; 

$user = user();
if($user == false){
    header("location:login.php?msg");
}
$user_id = $_SESSION['user_id'];
$name=$_GET['ser'];
$se = $database->prepare("select * from cours where name = :name");
$se->bindParam("name" , $name);
$se->execute();
foreach($se as $d){
    print '<h1>'.$d['name'].'</h1><hr>';
    $sA= "data:" . $d['image_name'] . ";base64,".base64_encode($d['image']);
print'      <td><img width="300px" class="rounded-circle" src="' .$sA . '"  /></td><br>';
print $d['des'].'<br>';
print '<h2>price:'.$d['price'].'<br>';
print 'discount:'.$d['dis'].'<br>';

$total = $d['price'] - $d['dis'];
print 'total:'.$total;
}

