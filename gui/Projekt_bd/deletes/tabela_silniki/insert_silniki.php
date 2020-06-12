<form action="insert_silniki_do.php" method="POST">
    <label>Nazwa silnika </label><input type="text" name="nazwa_silnika">
    <label>Typ silnika </label><input type="text" name="typ_silnika">
    <label>Moc Silnika</label><input type="text" name="moc">
    <label>Pojemnosc Silnika </label><input type="text" name="pojemnosc">
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
