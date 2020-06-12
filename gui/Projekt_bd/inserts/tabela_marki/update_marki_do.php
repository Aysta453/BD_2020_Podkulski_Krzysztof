<?php
require_once "../../php/connect.php";
session_start();
$conn=oci_connect($username,$password,$name);
$var1=$_GET['id'];
$var2=$_POST['nazwa_marki'];

echo $var1;
echo $var2;
if(strlen($var1)!=0){
    if(!$conn){
        echo "nie";
    }else{

            $sql = 'begin p_update_marki(:bind1,:bind2); end;';
            $stid = oci_parse($conn, $sql);
            oci_bind_by_name($stid, ':bind1', $var1, 100);
            oci_bind_by_name($stid, ':bind2', $var2, 100);
            oci_execute($stid);
            oci_free_statement($stid);
            oci_close($conn);
            $_SESSION['blad_marka1'] = '<b><h4 style="color:green;background-color: white;padding: 3px">Powiodło się</h4></b>';
          //  header("Location:update_marki.php");

    }
}else{
    $_SESSION['blad_marka1']='<b><h4 style="color:red;background-color: white;padding: 3px">Nie powiodło się</h4></b>';
   // header("Location:update_marki.php");
}




?>

