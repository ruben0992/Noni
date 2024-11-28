<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Colectează datele din formular
    $nombre = htmlspecialchars($_POST['nombre']);
    $apellidos = htmlspecialchars($_POST['apellidos']);
    $email = htmlspecialchars($_POST['email']);
    $telefono = htmlspecialchars($_POST['telefono']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    // Adresa ta de e-mail
    $to = "mada.luk29@gmail.com";
    $subject = "Nuevo mensaje de contacto";

    // Conținutul e-mailului
    $body = "Has recibido un nuevo mensaje de contacto:\n\n";
    $body .= "Nombre: $nombre\n";
    $body .= "Apellidos: $apellidos\n";
    $body .= "Email: $email\n";
    $body .= "Teléfono: $telefono\n\n";
    $body .= "Mensaje:\n$mensaje\n";

    // Headers pentru e-mail
    $headers = "From: no-reply@example.com\r\n"; // Poți personaliza acest "From"
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Trimiterea e-mailului
    if (mail($to, $subject, $body, $headers)) {
        echo "Mensaje enviado con éxito.";
    } else {
        echo "Hubo un error al enviar el mensaje.";
    }
} else {
    echo "Método de solicitud no permitido.";
}
?>
