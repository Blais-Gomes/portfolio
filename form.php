<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $full_name = htmlspecialchars($_POST['full_name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

   
    if (!empty($full_name) && !empty($email) && !empty($message)) {
        
        echo "<h2>Merci pour votre message, $full_name !</h2>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Message:</strong><br>$message</p>";
        
        $to = "blaisgomesjob@gmail.com";  
        $subject = "Nouveau message de $full_name";
        $body = "Nom: $full_name\nEmail: $email\nMessage:\n$message";
        $headers = "From: $email";

    
        if (mail($to, $subject, $body, $headers)) {
            echo "<p style='color: green;'>Votre message a été envoyé avec succès !</p>";
        } else {
            echo "<p style='color: red;'>Une erreur est survenue lors de l'envoi du message.</p>";
        }
    } else {
        echo "<p style='color: red;'>Tous les champs sont obligatoires !</p>";
    }
}
?>
