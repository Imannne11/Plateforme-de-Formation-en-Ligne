<?php
$titre = 'warProg - Apprendre en Ligne';
$CSS = '../Style/Contact.css'; // Assurez-vous que ce chemin est correct
ob_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contactez-nous</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo $CSS; ?>">
  <link rel="icon" type="image/png" sizes="64x64" href="../Media/file (3).png">
  <title><?php echo $titre; ?></title>
</head>

<body>
  <div class="container">
    <h1>Contactez-nous</h1>
    <form class="contact-form" onsubmit="handleSubmit(event)">
      <input type="text" placeholder="Entrez votre nom" required>
      <input type="email" placeholder="Entrez votre email" required>
      <textarea placeholder="Entrez votre message" rows="4" required></textarea>
      <button type="submit">Envoyer</button>
      <!-- Message de remerciement -->
      <p id="thank-you-message">Merci pour votre message ! Nous vous contacterons bientôt.</p>
      <!-- Bouton "Retour à l'accueil" -->
      <button id="back-to-home" onclick="window.location.href='../index.php'">Retour à l'accueil</button>
    </form>
  </div>
  <script src="../Assets/js/Contact.js"></script>
</body>

</html>