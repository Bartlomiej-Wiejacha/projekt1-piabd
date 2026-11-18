<?php
$host = "127.0.0.1";
$user = "admin";
$password = "123";

$polaczenie = mysqli_connect($host, $user, $password);

if (!$polaczenie) {
    die("Błąd połączenia: " . mysqli_connect_error());
}

if (isset($_POST['utworz_baze'])) {
    $nazwa_bazy = trim($_POST['nazwa_bazy']);

    if (!preg_match('/^[a-zA-Z0-9_]+$/', $nazwa_bazy)) {
        echo "Nieprawidłowa nazwa bazy danych";
    } else {
        $sql = "CREATE DATABASE `$nazwa_bazy`";

        if (mysqli_query($polaczenie, $sql)) {
            echo "Baza została utworzona";
        } else {
            echo "Błąd: " . mysqli_error($polaczenie);
        }
    }
}

mysqli_close($polaczenie);
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <fieldset>
    <form action="" method="post">
        nazwa bazy <input type="text" name="nazwa_bazy"></br>
        <input type="submit" name="utworz_baze" value="utwórz baze">
    </form>
    </fieldset>
</body>
</html>