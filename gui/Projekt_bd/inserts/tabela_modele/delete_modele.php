<?php
require_once "../../php/connect.php";
session_start();
$conn=oci_connect($username,$password,$name);
$var1=$_GET['id'];


echo $var1;


if(!$conn){
    echo "nie";
}else{

    $sql = 'begin p_delete_modele(:bind1); end;';
    $stid = oci_parse($conn, $sql);
    oci_bind_by_name($stid, ':bind1', $var1, 100);
    oci_execute($stid);
    oci_free_statement($stid);
    oci_close($conn);

    header("Location:../../php/strona_admin.php");

}




?>

