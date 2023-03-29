<?php 
include '../int.php';
$admin = admin();
if($admin == false){
    header("location:login.php?msg");
}
$id = $_SESSION['admin_id'];
?>
<form action="" enctype="multipart/form-data" method="post">
 name:<input type="text" name="name"><br>
image :<input type="file" name="image"><br><br>
description:<input type="text" name="des"><br>
price:<input type="text" name="price"><br>
discount:<input type="text" name="dis"><br>
<input type="submit" name="add" value="add">

</form>
<?php 
if(isset($_POST['add'])){
    $name = $_POST['name'];
    $image = file_get_contents($_FILES['image']['tmp_name']);
    $img_name = $_FILES['image']['name'];
    $des = $_POST['des'];
    $price = $_POST['price'];
    $dis = $_POST['dis'];

    $add = $database->prepare("INSERT into cours(name,image,image_name,des,price,dis,ad_id)
     VALUES(:name,:image,:img_name,:des,:price,:dis,:ad_id)");
 $add->bindParam("name" , $name);
 $add->bindParam('image' , $image);
 $add->bindParam('img_name' , $img_name);
 $add->bindParam('des' , $des);
 $add->bindParam('price' , $price);
 $add->bindParam('dis' , $dis);
 $add->bindParam('ad_id' , $id);

 if($add->execute()){
    echo 'تمت العمليه بنجاح';
}
else{
    print "error";
}
}