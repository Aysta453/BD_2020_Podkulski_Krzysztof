<form action="insert_marki_do.php" method="POST">
<label>Nazwa Marki </label><input type="text" name="nazwa_marki">
    <button type="submit">Wprowadz</button>
</form>

<?php
session_start();
if(isset($_SESSION['blad'])){
    echo $_SESSION['blad'];
    unset($_SESSION['blad']);
}
?>
<a href="../../php/strona_admin.php">Powrót</a>
