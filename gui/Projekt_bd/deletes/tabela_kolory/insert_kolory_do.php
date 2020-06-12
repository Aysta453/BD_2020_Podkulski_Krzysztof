<?php
require_once "../../php/connect.php";
session_start();
$conn=oci_connect($username,$password,$name);
$var1=$_POST['nazwa_koloru'];
if(strlen($var1)!=0){
    if(!$conn){
        echo "nie";
    }else{
        $sql = "SELECT count(*) as var1 from marki";
        $stid = oci_parse($conn, $sql);
        oci_execute($stid);
        $row = oci_fetch_array($stid, OCI_ASSOC);
        $varcheck = $row['VAR1'];
        if($varcheck==0) {
            $sql = 'begin p_insert_koloru(:bind1); end;';
            $stid = oci_parse($conn, $sql);
            oci_bind_by_name($stid, ':bind1', $var1, 100);
            oci_execute($stid);
            oci_free_statement($stid);
            oci_close($conn);
            $_SESSION['blad'] = '<b><h4 style="color:green;background-color: white;padding: 3px">Powiodło się</h4></b>';
            header("Location:insert_kolory.php");
        }
        else{
            $_SESSION['blad'] = '<b><h4 style="color:blue;background-color: white;padding: 3px">Istnieje taka marka już.</h4></b>';
            header("Location:insert_kolory.php");

        }
    }
}else{
    $_SESSION['blad']='<b><h4 style="color:red;background-color: white;padding: 3px">Nie powiodło się</h4></b>';
    header("Location:insert_kolory.php");

}




?>

