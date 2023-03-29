<?php 
include '../int.php';
$user = user();
if($user == false){
    header("location:login.php?msg");
}
$cours_id = $_GET['id'];
$user_id =$_SESSION['user_id'];
$user_id = $_SESSION['user_id'];
$ser_n = rand(983883 , 9934343);
// print  rand(333344,343434);
$se = $database->prepare("select * from `add_cours` where user_id = :user");
$se->bindParam("user" , $user_id);
// $se->bindParam("cours" , $cours_id);
$se->execute();
foreach($se as $s){
$u = $s['user_id'];
$c = $s['cours_id'];
$ser = $s['ser'];
if($u == $user_id and $c == $cours_id){
    $sel = $database->prepare("select * from `user` where `id` = :user");
$sel->bindParam('user',$user_id );
$sel->execute();
foreach($sel as $data)
$name = $data['name'];
$email = $data['email'];
print '<h1>wellcome to:'.$name.'</h1>';
print 'your email is :'.$email;
print '<h1>الرقم التسلسلي :'.$ser;


    die('<h1>تم حجز الكورس من قبل ');
}
}
$ins=$database->prepare("INSERT INTO add_cours(user_id , cours_id , ser)
values(:user,:cours,:ser) 
");
$ins->bindParam("user" , $user_id);
$ins->bindParam("cours" , $cours_id);
$ins->bindParam("ser" , $ser_n);
$ins->execute();
print '<h1>تم حجز الكورس';
print '';
$se = $database->prepare("select * from `add_cours` where user_id = :user and cours_id = :cours");
$se->bindParam("user" , $user_id);
$se->bindParam("cours" , $cours_id);
$se->execute();
foreach($se as $s){
$u = $s['user_id'];
$c = $s['cours_id'];
$ser = $s['ser'];
print '<h1>الرقم التسلسلي :'.$ser;
}
// print '<h1>الرقم التسلسلي :'.$ser;
$sel = $database->prepare("select * from `user` where `id` = :user");
$sel->bindParam('user',$user_id );
$sel->execute();
foreach($sel as $data)
$name = $data['name'];
$email = $data['email'];
print '<h1>wellcome to:'.$name.'</h1>';
print 'your email is :'.$email;


