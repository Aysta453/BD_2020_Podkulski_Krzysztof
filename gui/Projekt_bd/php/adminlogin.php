<?php
session_start();





    $login=$_POST['login'];
    $haslo=$_POST['haslo'];
    $login2='Aysta';
    $haslo2='zaq1@WSX';
$login1='';
$haslo1='';



    if(($login==$login1)&($haslo==$haslo1)){

           header('Location:strona_admin.php');


    }else{
        $_SESSION['blad']='<b><h4 style="color:red;background-color: white;padding: 3px">Nie powiodło się</h4></b>';
       header('Location:adminlog.php');
    }


?>