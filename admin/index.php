<?php 
include '../int.php';
$admin = admin();
if($admin == false){
    header("location:login.php?msg");
}

$admin_id = $_SESSION['admin_id'];
// print $admin_id;

$sel = $database->prepare("select * from `admin` where `id` = :admin");
$sel->bindParam('admin',$admin_id );
$sel->execute();
foreach($sel as $data)
$name = $data['name'];
$email = $data['email'];
print '<h1>wellcome to:'.$name.'</h1>';
print 'your email is :'.$email;


?>
<a href="add_cours.php">اضافه كورس </a>
<br>
<a href="add_cours"> الطلاب </a>
