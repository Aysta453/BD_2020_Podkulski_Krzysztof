<?php
session_start();

require_once "connect.php";

$polaczenie = @new mysqli($servername, $username, $password, $dbname);

if($polaczenie->connect_errno!=0){
    echo "Error".$polaczenie->connect_errno." Opis: ".$polaczenie->connect_error;

}else{

    $imie=$_POST['imie'];
    $nazwisko=$_POST['nazwisko'];
    $pesel=$_POST['pesel'];
    $miasto=$_POST['miasto'];
    $telefon=$_POST['telefon'];
    $kod_indeks=$_POST['kod_indeks'];
    $email=$_POST['email'];

    if((strlen($pesel)==11)&(strlen($telefon)==9)&(strlen($kod_indeks)==7)&(strlen($imie)!=0)&(strlen($nazwisko)!=0)&(strlen($miasto)!=0)&(strlen($pesel)!=0)&(strlen($telefon)!=0)&(strlen($kod_indeks)!=0)&(strlen($email)!=0)){
        $sql="SELECT * FROM klienci WHERE pesel='$pesel'";

        if($wynik= @$polaczenie->query($sql)){
            $sprawdz=$wynik->num_rows;
            if($sprawdz>0)
            {
                $_SESSION['blad']='<span style="color:red">Nie powiodlo sie</span>';
                header('Location:rejestracja.php');


            }else{
                $sql="INSERT INTO `klienci` (`id`, `imie`, `nazwisko`, `pesel`, `miasto`, `telefon`, `kod_indeks`,`email`) VALUES (NULL, '$imie', '$nazwisko', '$pesel', '$miasto', '$telefon', '$kod_indeks','$email')";
                $wynik= @$polaczenie->query($sql);
                $_SESSION['blad']='<b><h3 style="color:forestgreen">Powiodlo sie</h3></b>';
                header('Location:rejestracja.php');

            }
        }




    }else{
        $_SESSION['blad']='<b><h3 style="color:red">Nie powiodlo sie</h3></b>';
        header('Location:rejestracja.php');
    }

    $polaczenie->close();
}


?>