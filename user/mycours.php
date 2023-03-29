<?php 
include '../int.php';
$user = user();
if($user == false){
    header("location:login.php?msg");
}

$user_id = $_SESSION['user_id'];
$sel = $database->prepare("select * from add_cours where user_id = :user");
$sel->bindParam("user" , $user_id);
if($sel->execute()){
    foreach($sel as $s){
       $cours_id = $s['cours_id'];
    
        // print $cours_id;
        $se = $database->prepare("select * from cours where id = :cours");
        $se->bindParam("cours" , $cours_id);
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
     }
    
    
}