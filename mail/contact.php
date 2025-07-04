<?php
if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$m_subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// ✅ AQUÍ VA TU CORREO ELECTRÓNICO
$to = "a.aulestia@exe.com.co";
$subject = "Mensaje desde el sitio web de EXE:  $m_subject";
$body = "Has recibido un nuevo mensaje desde el formulario de contacto de tu sitio web.\n\n"."Aquí están los detalles:\n\nNombre: $name\n\nEmail: $email\n\nAsunto: $m_subject\n\nMensaje:\n$message";
$header = "From: noreply@yourdomain.com\n"; // Puedes cambiar esto si tienes un correo del dominio
$header .= "Reply-To: $email";

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>