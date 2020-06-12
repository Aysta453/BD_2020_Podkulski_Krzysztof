<?php
require_once "../../php/connect.php";
session_start();
$conn=oci_connect($username,$password,$name);
$var4=$_POST['zmienna1'];
echo $var4;
if(strlen($var4)!=0){
    if(!$conn){
        echo "nie";
    }else{
        $sql = 'begin p_insert_kolory_check(:bind1,:bind2); end;';
        $stid = oci_parse($conn, $sql);
        oci_bind_by_name($stid, ':bind1', $var4, 100);
        oci_bind_by_name($stid, ':bind2', $varcheck, 100);
        oci_execute($stid);
        oci_free_statement($stid);
        if($varcheck==0) {
            $sql = 'begin p_insert_kolory(:bind1); end;';
            $stid = oci_parse($conn, $sql);
            oci_bind_by_name($stid, ':bind1', $var4, 100);
            oci_execute($stid);
            oci_free_statement($stid);
            oci_close($conn);
            $_SESSION['blad_kolor'] = '<b><h4 style="color:green;background-color: white;padding: 3px">Powiodło się</h4></b>';
            header("Location:insert_kolory.php");
        }else{
            $_SESSION['blad_kolor'] = '<b><h4 style="color:blue;background-color: white;padding: 3px">Istnieje taki kolor już.</h4></b>';
            header("Location:insert_kolory.php");

        }
    }
}else{
    $_SESSION['blad_kolor']='<b><h4 style="color:red;background-color: white;padding: 3px">Nie powiodło się</h4></b>';
    header("Location:insert_kolory.php");

}



?>