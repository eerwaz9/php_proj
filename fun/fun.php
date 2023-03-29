<?php 
function admin(){

if(isset($_SESSION['admin']) && $_SESSION['adminn'] == true){
    return true;
}
return false;
}

function user(){

    if(isset($_SESSION['user']) && $_SESSION['userr'] == true){
        return true;
    }
    return false;
    }
    