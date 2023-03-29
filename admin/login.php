<?php 
include '../int.php';

if(isset($_GET['msg'])){
    $msg = $_GET['msg'];
    $msg = 'لم يتم عمل تسجيل خروج من الجلسه الاولي ';
    print $msg;
}
?>
<form action="" method="post">
    <input type="email" name="email">
    <input type="text" name="password">
    <input type="submit" name="add" >

</form>

<?php 
// echo phpversion( ) ;

if(isset($_POST['add'])){
$array = array('=' , '||' , '^', '&&' , '!=');
// print_r($array);
$pass = $_POST['password'];
$em = $_POST['email'];
    $selectuser = $database->prepare("select * from `admin`");
    $selectuser->execute();
    foreach($selectuser as $data){
    $email = $data['email'];
    $password = $data['password'];
    $id = $data['id'];
    // print $email;
    if(ctype_alnum($pass)){
        print '';
    }
    else{
        print ' مسموح في الباسورد  بحروف وارقام بدون فواصل وعلامات<br>';
    }
    if( filter_var( $em , FILTER_VALIDATE_EMAIL ) ){
        echo '' ;
        } else {
        echo ' من فضلك ضع ايميل <br>' ; }

    
    if(empty($em || $pass)){
        print 'الحقول فارغه<br>';
    } 
    
    if($em == $email and $pass == $password){
        $_SESSION['admin'] = true;
        $_SESSION['adminn'] = true;
        $_SESSION['admin_id'] = $id;
        header("location:index.php");
    }

    if($em != $email and $pass == $password){
     print 'error in the email';
    }
    if($em == $email and $pass != $password){
        print 'error in the password';
    }


 

}
    
    

        
        
    

}
?>