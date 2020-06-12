<?php
session_start();
require_once "connect.php";

$conn=oci_connect($username,$password,$name);
if(!$conn){
    echo "nie";
}else{

    $imie=$_POST['imie'];
    $nazwisko=$_POST['nazwisko'];
    $pesel=$_POST['pesel'];
    $miasto=$_POST['miasto'];
    $telefon=$_POST['telefon'];
    $kod_indeks=$_POST['kod_indeks'];
    $email=$_POST['email'];

    if((strlen($pesel)==11)&(strlen($telefon)==9)&(strlen($kod_indeks)==7)&(strlen($imie)!=0)&(strlen($nazwisko)!=0)&(strlen($miasto)!=0)&(strlen($pesel)!=0)&(strlen($telefon)!=0)&(strlen($kod_indeks)!=0)&(strlen($email)!=0)){
        $sql="SELECT * FROM klient WHERE pesel='$pesel'";

        $stid=oci_parse($conn,$sql);
        oci_execute($stid);
        $numrows = oci_fetch_all($stid, $res);
        oci_free_statement($stid);

            if($numrows>0)
            {
                $_SESSION['blad']='<b><h4 style="color:red;background-color: white;padding: 3px">Nie powiodło się</h4></b>';
                header('Location:rejestracja.php');


            }else{

                $sql='begin p4 (:bind1,:bind2,:bind3,:bind4,:bind5,:bind6,:bind7); end;';

                $stid=oci_parse($conn,$sql);
                oci_bind_by_name($stid,':bind1',$imie,100);
                oci_bind_by_name($stid,':bind2',$nazwisko,100);
                oci_bind_by_name($stid,':bind3',$pesel,11);
                oci_bind_by_name($stid,':bind4',$miasto,100);
                oci_bind_by_name($stid,':bind5',$telefon,9);
                oci_bind_by_name($stid,':bind6',$kod_indeks,7);
                oci_bind_by_name($stid,':bind7',$email,100);
                oci_execute($stid);
                $stid=oci_parse($conn,$sql1);
                oci_execute($stid);
                $_SESSION['blad']='<b><h4 style="color:forestgreen;background-color: white;padding: 5px">Powiodło się</h4></b>';
                header('Location:rejestracja.php');

            }





    }else{
        $_SESSION['blad']='<b><h4 style="color:red;background-color: white;padding: 3px">Nie powiodło się</h4></b>';
        header('Location:rejestracja.php');
    }
    oci_free_statement($stid);
    oci_close($conn);
}


?>