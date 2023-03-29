<h1><a href="logout.php" target="" rel="">تسجيل الخروج</a>
<br>
<h1><a href="mycours.php" target="" rel=""> كورساتي</a>
<form action="" method="get">
    <select name="sel" id="">
<?php

include '../int.php';
$ss = $database->prepare("select * from `cours`");

$ss->execute();

foreach($ss as $ds){
$name = $ds['name'];
print '    <option value="'.$ds['name'].'">  '. $ds['name'].' </option>';
}
// if(isset($_GET['d'])){
  
//     // header("location:ser.php?ser=$sel");

// }
?>
<input type="submit"  name="dd" value="add">
    

    </select>
</form>

<?php 
if(isset($_GET['sel'])){
$name = $_GET['sel'];
  $seo = $database->prepare("select * from cours where name = :name");
$seo->bindParam("name" , $name);
$seo->execute();
    
foreach($seo as $dq){
$idew = $dq['ad_id'];
// print $idew;
    print '<h1>'.$dq['name'].'</h1><hr>';
    $sAq= "data:" . $dq['image_name'] . ";base64,".base64_encode($dq['image']);
print'      <td><img width="300px" class="rounded-circle" src="' .$sAq . '"  /></td><br>';
print $dq['des'].'<br>';
print '<h2>price:'.$dq['price'].'<br>';
print 'discount:'.$dq['dis'].'<br>';
$id = $dq['id'];
$total = $dq['price'] - $dq['dis'];
print 'total:'.$total;
$ssll = $database->prepare("select * from `admin` where id = :idd");
$ssll->bindParam("idd" , $idew);
$ssll->execute();

foreach($ssll as $dsss){
$name = $dsss['name'];
print '<h1> eng:'. $name.'<br>';
}
print '<a href="add_cours.php?id='.$id.'">حجز الكورس</a><br>';


}
die();
}

?>

<form action="" method="get">
    <select name="sell" id="">
<?php


$ss = $database->prepare("select * from `admin`");

$ss->execute();

foreach($ss as $dss){
$name = $dss['name'];
print '    <option value="'.$dss['id'].'">  '. $dss['name'].' </option>';
}


?>
<input type="submit"  name="d" value="add">
    

    </select>
</form>
<?php

if(isset($_GET['sell'])){

    $idd = $_GET['sell'];
    $ssll = $database->prepare("select * from `admin` where id = :idd");
    $ssll->bindParam("idd" , $idd);
    $ssll->execute();
    
    foreach($ssll as $dsss){
    $name = $dsss['name'];
    print $name;
    }
    $ad_id = $_GET['sell'];
   


    // $sele = $database->prepare("select * from admin where id = :ad_id");
    // $sele->bindParam("ad_id" , $ad_id);
    // $sele->execute();
  $se = $database->prepare("select * from cours where ad_id = :ad_id");
$se->bindParam("ad_id" , $ad_id);
$se->execute();
foreach($se as $d){
    print '<h1>'.$d['name'].'</h1><hr>';
    $sA= "data:" . $d['image_name'] . ";base64,".base64_encode($d['image']);
print'      <td><img width="300px" class="rounded-circle" src="' .$sA . '"  /></td><br>';
print $d['des'].'<br>';
print '<h2>price:'.$d['price'].'<br>';
print 'discount:'.$d['dis'].'<br>';
$id = $d['id'];
$total = $d['price'] - $d['dis'];
print 'total:'.$total;

print '<a href="add_cours.php?id='.$id.'">حجز الكورس</a><br>';


}
die();
}







$user = user();
if($user == false){
    header("location:login.php?msg");
}
$user_id = $_SESSION['user_id'];
$sel = $database->prepare("select * from `user` where `id` = :user");
$sel->bindParam('user',$user_id );
$sel->execute();
foreach($sel as $data)
$name = $data['name'];
$email = $data['email'];
print '<h1>wellcome to:'.$name.'</h1>';
print 'your email is :'.$email;

$s = $database->prepare("select * from `cours`");

$s->execute();

foreach($s as $d){
$name = $d['name'];
$des = $d['des'];
$ad_admin = $d['ad_id'];

print '<h1>courses </h1><hr>';
// $email = $d['email'];
print '<h1>'.$name.'</h1>';
$sA= "data:" . $d['image_name'] . ";base64,".base64_encode($d['image']);
print'      <td><img width="300px" class="rounded-circle" src="' .$sA . '"  /></td><br>';
print $d['des'].'<br>';
print $d['price'].'<br>';
print $d['dis'].'<br>';
$ssll = $database->prepare("select * from `admin` where id = :idd");
$ssll->bindParam("idd" , $ad_admin);
$ssll->execute();

foreach($ssll as $dsss){
$name = $dsss['name'];
print '<h1> eng:'. $name.'<br>';
}




?>
<a href="add_cours.php?id=<?php print$d['id'];?>">حجز الكورس</a><br>



<?php 
}

?>

