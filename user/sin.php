<?php 


include '../int.php';
$user = user();
if($user == true){
    header("location:index.php");
}

?>
<form action="" enctype="multipart/form-data" method="post">
 name:<input type="text" name="name"><br>
image :<input type="file" name="image"><br><br>
phone:<input type="text" name="phone"><br>
email:<input type="text" name="email"><br>
password:<input type="text" name="password"><br>
<input type="submit" name="add" value="add">

</form>
<a href="login.php">سجل دخولي</a>
<?php 
if(isset($_POST['add'])){
    $name = $_POST['name'];
    $image = file_get_contents($_FILES['image']['tmp_name']);
   
    $phone = $_POST['phone'];
     $email = $_POST['email'];
    // $phone = $_POST['phone'];
    $password = $_POST['password'];
if(strlen($name)>9){
    print 'الحد المسموح للاسم من الحروف 9';
    die();
}
if(strlen($email)>50){
    print 'الحد المسموح للايميل من الحروف 30';
    die();
}
if(strlen($phone)>15){
    print 'الحد المسموح لرقم الهاتف من الحروف 15';
    die();

}
// if(strlen($password)>15){
//     print 'الحد المسموح للباسورد من الحروف 15';
//     die();

// }
    $add = $database->prepare("INSERT into user(name,image,phone,email,password)
     VALUES(:name,:image,:phone,:email,:password)");
 $add->bindParam("name" , $name);
 $add->bindParam('image' , $image);
 $add->bindParam('email' , $email);
 $add->bindParam('phone' , $phone);
//  $add->bindParam('phone' , $phone);
 $add->bindParam('password' , $password);

 if($add->execute()){
    echo 'تمت العمليه بنجاح';
}
else{
    print "error";
}
}