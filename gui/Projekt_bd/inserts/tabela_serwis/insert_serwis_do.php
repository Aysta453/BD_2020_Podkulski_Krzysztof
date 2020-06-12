<?php
require_once "../../php/connect.php";
session_start();
$conn=oci_connect($username,$password,$name);
$var1=$_POST['zmienna1'];
$var2=$_POST['zmienna2'];
$var3=$_POST['zmienna3'];
$var4=$_POST['zmienna4'];



if((strlen($var1)!=0)&(strlen($var2)!=0)&(strlen($var3)!=0)&(strlen($var4)!=0)){
    if(!$conn){
        echo "nie";
    }else{


        $sql = 'begin p_insert_serwis(:bind1,:bind2,:bind3,:bind4); end;';
        $stid = oci_parse($conn, $sql);
        oci_bind_by_name($stid, ':bind1', $var1, 100);
        oci_bind_by_name($stid, ':bind2', $var2, 100);
        oci_bind_by_name($stid, ':bind3', $var3, 100);
        oci_bind_by_name($stid, ':bind4', $var4, 100);
        oci_execute($stid);
        oci_free_statement($stid);



        $sql = "SELECT id as var1 from serwis order  by id desc fetch next 1 rows only";
        $stid = oci_parse($conn, $sql);
        oci_execute($stid);
        $row = oci_fetch_array($stid, OCI_ASSOC);
        $var2 = $row['VAR1'];
        oci_free_statement($stid);

       $sql="select decision('$var2','$var3','$var4')  as wynik from dual";
        $stid = oci_parse($conn, $sql);
        oci_execute($stid);
        $row = oci_fetch_array($stid, OCI_ASSOC);
        $wynik = $row['WYNIK'];


        oci_free_statement($stid);
        $sql="UPDATE serwis set decyzja='$wynik' where id='$var2'";
        $stid = oci_parse($conn, $sql);
        oci_execute($stid);
        oci_free_statement($stid);


        oci_close($conn);
        $_SESSION['blad_serwis'] = '<b><h4 style="color:green;background-color: white;padding: 3px">Powiodło się</h4></b>';
      header("Location:insert_serwis.php");
    }


}else{
    $_SESSION['blad_serwis']='<b><h4 style="color:red;background-color: white;padding: 3px">Nie powiodło się</h4></b>';
   header("Location:insert_serwis.php");
}




?>

