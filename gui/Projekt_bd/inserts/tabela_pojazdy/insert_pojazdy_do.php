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
$var8=$_POST['zmienna8'];
$var9=$_POST['zmienna9'];


if((strlen($var1)!=0)&(strlen($var2)!=0)&(strlen($var3)!=0)&(strlen($var4)!=0)&(strlen($var5)!=0)&(strlen($var6)!=0)&(strlen($var7)!=0)&(strlen($var8)!=0)){
    if(!$conn){
        echo "nie";
    }else{

            $sql = 'begin p_insert_pojazdy(:bind1,:bind2,:bind3,:bind4,:bind5,:bind6,:bind7,:bind8,:bind9); end;';
            $stid = oci_parse($conn, $sql);
            oci_bind_by_name($stid, ':bind1', $var1, 100);
            oci_bind_by_name($stid, ':bind2', $var2, 100);
            oci_bind_by_name($stid, ':bind3', $var3, 100);
            oci_bind_by_name($stid, ':bind4', $var4, 100);
            oci_bind_by_name($stid, ':bind5', $var5, 100);
            oci_bind_by_name($stid, ':bind6', $var6, 100);
            oci_bind_by_name($stid, ':bind7', $var7, 100);
            oci_bind_by_name($stid, ':bind8', $var8, 100);
            oci_bind_by_name($stid, ':bind9', $var9, 100);
            oci_execute($stid);
            oci_free_statement($stid);
            oci_close($conn);
            $_SESSION['blad_pojazd'] = '<b><h4 style="color:green;background-color: white;padding: 3px">Powiodło się</h4></b>';
            header("Location:insert_pojazdy.php");
        }


}else{
    $_SESSION['blad_pojazd']='<b><h4 style="color:red;background-color: white;padding: 3px">Nie powiodło się</h4></b>';
    header("Location:insert_pojazdy.php");
}




?>

