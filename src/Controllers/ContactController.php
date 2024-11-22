<?php
namespace App\Controllers;

class ContactController
{
    public function sendMessage()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupération des données du formulaire
            $firstName = $_POST['first_name'] ?? '';
            $email = $_POST['email'] ?? '';
            $message = $_POST['message'] ?? '';


            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                die('Adresse email invalide.');
            }

            $to = adminarcadia@gmail.com"; 
            $subject = "Nouveau message de $firstName via le formulaire de contact";
            $body = "Nom : $firstName\nEmail : $email\nMessage :\n$message";
            $headers = "From: $email";

    
            if (mail($to, $subject, $body, $headers)) {
                echo "Message envoyé avec succès.";
            } else {
                echo "Erreur lors de l'envoi du message.";
            }
        }
    }
}
