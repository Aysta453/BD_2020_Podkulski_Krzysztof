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
do {
    $sql = 'begin rejestracje_first(:bind1,:bind2,:bind3); end;';
    $stid = oci_parse($conn, $sql);
    oci_bind_by_name($stid, ':bind1', $var4, 100);
    oci_bind_by_name($stid, ':bind2', $check1, 100);
    oci_bind_by_name($stid, ':bind3', $check2, 100);
    oci_execute($stid);
    $sql = 'begin p_insert_rejestracje_check(:bind1,:bind2); end;';
    $stid = oci_parse($conn, $sql);
    oci_bind_by_name($stid, ':bind1', $check1, 100);
    oci_bind_by_name($stid, ':bind2', $varcheck, 100);
    oci_execute($stid);
    oci_free_statement($stid);
    }while ($varcheck!=0);

            $sql = 'begin p_insert_rejestracje(:bind1,:bind2); end;';
            $stid = oci_parse($conn, $sql);
            oci_bind_by_name($stid, ':bind1', $check2, 100);
            oci_bind_by_name($stid, ':bind2', $check1, 100);
            oci_execute($stid);
            oci_free_statement($stid);
        $sql = 'begin p_insert_historie_check(:bind1,:bind2,:bind3,:bind4); end;';
        $stid = oci_parse($conn, $sql);
        oci_bind_by_name($stid, ':bind1', $var4, 100);
        oci_bind_by_name($stid, ':bind2', $check1, 100);
        oci_bind_by_name($stid, ':bind3', $check4, 100);
        oci_bind_by_name($stid, ':bind4', $check5, 100);
        oci_execute($stid);
        oci_free_statement($stid);
        $sql = 'begin p_insert_historie(:bind1,:bind2); end;';
        $stid = oci_parse($conn, $sql);
        oci_bind_by_name($stid, ':bind1', $check5, 100);
        oci_bind_by_name($stid, ':bind2', $check4, 100);
        oci_execute($stid);
        oci_free_statement($stid);
            oci_close($conn);

            $_SESSION['blad_rejestracje'] = '<b><h4 style="color:green;background-color: white;padding: 3px">Powiodło się</h4></b>';
            header("Location:insert_rejestracje.php");

    }
}else{
    $_SESSION['blad_rejestracje']='<b><h4 style="color:red;background-color: white;padding: 3px">Nie powiodło się</h4></b>';
    header("Location:insert_rejestracje.php");

}



?>