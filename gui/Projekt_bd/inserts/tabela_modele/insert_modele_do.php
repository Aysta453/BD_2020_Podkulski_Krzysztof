<?php
require_once "../../php/connect.php";
session_start();
$conn=oci_connect($username,$password,$name);
$var1=$_POST['id_marki'];
$var2=$_POST['nazwa_modelu'];
echo $var1." ".$var2;
if((strlen($var1)!=0)&(strlen($var2)!=0)){
    if(!$conn){
        echo "nie";
    }else{
        $sql = 'begin p_insert_modele_check(:bind1,:bind2); end;';
        $stid = oci_parse($conn, $sql);
        oci_bind_by_name($stid, ':bind1', $var2, 100);
        oci_bind_by_name($stid, ':bind2', $varcheck, 100);
        oci_execute($stid);
        oci_free_statement($stid);
        if($varcheck==0) {
            $sql = 'begin p_insert_modele(:bind1,:bind2); end;';
            $stid = oci_parse($conn, $sql);
            oci_bind_by_name($stid, ':bind1', $var2, 100);
            oci_bind_by_name($stid, ':bind2', $var1, 100);
            oci_execute($stid);
            oci_free_statement($stid);
            oci_close($conn);
            $_SESSION['blad_model'] = '<b><h4 style="color:green;background-color: white;padding: 3px">Powiodło się</h4></b>';
           header("Location:insert_modele.php");
        }
        else{
            $_SESSION['blad_model'] = '<b><h4 style="color:blue;background-color: white;padding: 3px">Istnieje taki model już.</h4></b>';
         header("Location:insert_modele.php");
        }
    }
}else{
    $_SESSION['blad_model']='<b><h4 style="color:red;background-color: white;padding: 3px">Nie powiodło się</h4></b>';
   header("Location:insert_modele.php");
}




?>
