<?php
require_once "../../php/connect.php";
session_start();
$conn=oci_connect($username,$password,$name);
$var1=$_POST['zmienna1'];
$var2=$_POST['zmienna2'];
$var3=$_POST['zmienna3'];
$var4=$_POST['zmienna4'];
echo $var1."<br/>";
echo $var2."<br/>";
echo $var3."<br/>";
echo $var4."<br/>";

if((strlen($var1)!=0)&(strlen($var2)!=0)&(strlen($var3)!=0)&(strlen($var4)!=0)){
    if(!$conn){
        echo "nie";
    }else{
        $sql = "Select sprawdz_kwote($returned,,$var4) from dual";
        $stid = oci_parse($conn, $sql);
        oci_execute($stid);
        $row = oci_fetch_array($stid, OCI_ASSOC);
        $returned = $row['VAR1'];
        echo $returned;



        $sql = 'begin p_insert_transakcje(:bind1,:bind2,:bind3,:bind4,:bind5); end;';
        $stid = oci_parse($conn, $sql);
        oci_bind_by_name($stid, ':bind1', $var1, 100);
        oci_bind_by_name($stid, ':bind2', $var2, 100);
        oci_bind_by_name($stid, ':bind3', $var3, 100);
        oci_bind_by_name($stid, ':bind4', $var4, 100);
        oci_bind_by_name($stid, ':bind5', $var5, 100);
        oci_execute($stid);
        oci_free_statement($stid);





        $sql = "SELECT id_transakcji as var1 from transakcje order  by id_transakcji desc fetch next 1 rows only";
        $stid = oci_parse($conn, $sql);
        oci_execute($stid);
        $row = oci_fetch_array($stid, OCI_ASSOC);
        $returned = $row['VAR1'];
        echo $returned;

        do {


            $sql = 'begin rejestracje_first(:bind1,:bind2,:bind3); end;';
            $stid = oci_parse($conn, $sql);
            oci_bind_by_name($stid, ':bind1', $returned, 100);
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
        oci_bind_by_name($stid, ':bind1', $returned, 100);
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
        $_SESSION['blad_transakcji'] = '<b><h4 style="color:green;background-color: white;padding: 3px">Powiodło się</h4></b>';
       header("Location:insert_transakcje.php");
    }


}else{
    $_SESSION['blad_transakcji']='<b><h4 style="color:red;background-color: white;padding: 3px">Nie powiodło się</h4></b>';
    header("Location:insert_transakcje.php");
}




?>

