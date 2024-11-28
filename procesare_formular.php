<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Preluăm datele din formular
    $nombre = htmlspecialchars($_POST['nombre']);
    $apellidos = htmlspecialchars($_POST['apellidos']);
    $email = htmlspecialchars($_POST['email']);
    $telefono = htmlspecialchars($_POST['telefono']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    // Adresa ta de email
    $destinatar = "mada.luk29@gmail.com";

    // Subiectul emailului
    $subiect = "Formular de contact primit de la $nombre $apellidos";

    // Conținutul emailului
    $continut = "
    Nume: $nombre
    Prenume: $apellidos
    Email: $email
    Telefon: $telefono

    Mesaj:
    $mensaje
    ";

    // Trimiterea emailului
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-type: text/plain; charset=UTF-8\r\n";

    if (mail($destinatar, $subiect, $continut, $headers)) {
        echo "Mesaj trimis cu succes!";
    } else {
        echo "Eroare: Nu am reușit să trimit mesajul.";
    }
} else {
    echo "Formularul nu a fost trimis corect.";
}
?>
