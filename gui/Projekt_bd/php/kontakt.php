<?php
    require_once "connect.php";
$imie = $_POST['imie'];
$email = $_POST['mail'];
$temat = $_POST['temat'];
$text = $_POST['wiadomosc'];
if((strlen($imie)!=0)&(strlen($email)!=0)&(strlen($temat)!=0)&(strlen($text)!=0)){
    $polaczenie = @new mysqli($servername, $username, $password, $dbname);

    $conn=oci_connect($username,$password,$name);
    if(!$conn){
        echo "nie";
    }else{
        $sql='begin p5_kontakt (:bind1,:bind2,:bind3,:bind4); end;';

        $stid=oci_parse($conn,$sql);
        oci_bind_by_name($stid,':bind1',$imie,100);
        oci_bind_by_name($stid,':bind2',$email,100);
        oci_bind_by_name($stid,':bind3',$temat,100);
        oci_bind_by_name($stid,':bind4',$text,100);
        oci_execute($stid);
        oci_free_statement($stid);
        oci_close($conn);
    }
         function sendMail($email,$imie,$temat)
            {
                $text=$_POST['wiadomosc'];
    error_reporting(E_ALL);
    require_once "../phpmailer/class.phpmailer.php";
    $body="Witam Cię ".$imie.".<br/> Otrzymaliśmy od Ciebie mail z formularza kontaktowego o temacie: <h2>".$temat."</h2>.<br/>";
                $body .= "A o to jej tresc:<br/> <h3> ".$text." . </h3><br/> Wkrotce odpowiemy na Twoje pytanie.";

    $body .= "<br>Z wyrazami szacunku,<br>Zaloga Aysta";
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


      header("Location:../index.php");

}else{
    header("Location:../index.php");
}


?>