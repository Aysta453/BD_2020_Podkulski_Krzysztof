<?php
require_once "../../php/connect.php";
session_start();
$conn=oci_connect($username,$password,$name);
$var1=$_POST['zmienna1'];
$var2=$_POST['zmienna2'];
$var3=$_POST['zmienna3'];
$var4=$_POST['zmienna4'];
$var5=$_POST['zmienna5'];
$var6=$_POST['zmienna6'];
$var7=$_POST['zmienna7'];

if((strlen($var1)!=0)&(strlen($var2)!=0)&(strlen($var3)!=0)&(strlen($var4)!=0)&(strlen($var5)!=0)&(strlen($var6)!=0)&(strlen($var7)!=0)&(strlen($var3)==11)&(strlen($var5)==9)&(strlen($var6)==7)){
    if(!$conn){
        echo "nie";
    }else{
        $sql = 'begin p_insert_klient_check(:bind1,:bind2); end;';
        $stid = oci_parse($conn, $sql);
        oci_bind_by_name($stid, ':bind1', $var3, 100);
        oci_bind_by_name($stid, ':bind2', $varcheck, 100);
        oci_execute($stid);
        oci_free_statement($stid);
        if($varcheck==0) {
            $sql = 'begin p_insert_klient(:bind1,:bind2,:bind3,:bind4,:bind5,:bind6,:bind7); end;';
            $stid = oci_parse($conn, $sql);
            oci_bind_by_name($stid, ':bind1', $var1, 100);
            oci_bind_by_name($stid, ':bind2', $var2, 100);
            oci_bind_by_name($stid, ':bind3', $var3, 100);
            oci_bind_by_name($stid, ':bind4', $var4, 100);
            oci_bind_by_name($stid, ':bind5', $var5, 100);
            oci_bind_by_name($stid, ':bind6', $var6, 100);
            oci_bind_by_name($stid, ':bind7', $var7, 100);
            oci_execute($stid);
            oci_free_statement($stid);
            oci_close($conn);
            $_SESSION['blad_klient'] = '<b><h4 style="color:green;background-color: white;padding: 3px">Powiodło się</h4></b>';
            header("Location:insert_klient.php");
        }
        else{
            $_SESSION['blad_klient'] = '<b><h4 style="color:blue;background-color: white;padding: 3px">Istnieje taki klient już.</h4></b>';
            header("Location:insert_klient.php");

        }
    }
}else{
    $_SESSION['blad_klient']='<b><h4 style="color:red;background-color: white;padding: 3px">Nie powiodło się</h4></b>';
    header("Location:insert_klient.php");

}




?>

