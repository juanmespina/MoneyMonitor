<?php
session_start();
if (isset($_SESSION['user'])&& isset($_SESSION['id'])&&isset($_SESSION['level'])) {
    //echo $_SESSION['user']." ".$_SESSION['id']." ".$_SESSION['level'];
    
}else{

    header('Location:../../index.php');
    echo "No va a iniciar jejej";
}
