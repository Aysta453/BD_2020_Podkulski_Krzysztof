<?php
    require_once "connect.php";
$imie = $_POST['imie'];
$email = $_POST['mail'];
$temat = $_POST['temat'];
$text = $_POST['wiadomosc'];
if((strlen($imie)!=0)&(strlen($email)!=0)&(strlen($temat)!=0)&(strlen($text)!=0)){
    $polaczenie = @new mysqli($servername, $username, $password, $dbname);

    if($polaczenie->connect_errno!=0){
    echo "Error".$polaczenie->connect_errno." Opis: ".$polaczenie->connect_error;

    }else {



        $sql = "INSERT INTO `kontakt` (`id`, `imie`, `mail`, `temat`, `wiadomosc`) VALUES (NULL, '$imie', '$email', '$temat', '$text')";
        $polaczenie->query($sql);



        $polaczenie->close();
    }
         function sendMail($email,$imie,$temat)
            {
                $text=$_POST['wiadomosc'];
    error_reporting(E_ALL);
    require_once "../phpmailer/class.phpmailer.php";
    $body="Witam Cię ".$imie.".<br/> Otrzymaliśmy od Ciebie mail z formularza kontaktowego o temacie: <h2>".$temat."</h2>.<br/>";
                $body .= "A o to jej treść:<br/> <h3> ".$text." . </h3><br/> Wkrótce odpowiemy na Twoje pytanie.";

    $body .= "<br>Z wyrazami szacunku,<br>Załoga Aysta";
    $mail = new PHPMailer();

    $mail->IsSMTP();
    $mail->From = "aysta@gmail.com";
    $mail->FromName = "Aysta";
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = "ssl";
    $mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail->Username = "aiprojektaysta@gmail.com";
    $mail->Password = "zaq1@WSX";
    $mail->AddAddress($email);
    $mail->WordWrap = 50;
    $mail->IsHTML(true);
    $mail->Subject = "no-reply";
    $mail->Body = $body;

    $mail->send();


}
    sendMail($email,$imie,$temat);


      header("Location:../index.html");

}else{
    header("Location:../index.html");
}
?>