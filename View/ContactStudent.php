<?php
$titre = 'warProg - Apprendre en Ligne';
$CSS = 'Style/styleStudent.css'; // Assurez-vous que ce chemin est correct
$lienQcm = 'View/Qcm.php';
$lienCntct = 'View/Contact.php';
session_start();
ob_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" type="image/png" sizes="64x64" href="../Media/file (3).png">
   <title><?php echo $titre; ?></title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../Style/styleStudent.css">

</head>

<body>

   <header class="header">

      <section class="flex">

         <a class="logo">Educa.</a>

         <form action="search.html" method="post" class="search-form">
            <input type="text" name="search_box" required placeholder="search courses..." maxlength="100">
            <button type="submit" class="fas fa-search"></button>
         </form>

         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="search-btn" class="fas fa-search"></div>
            <div id="user-btn" class="fas fa-user"></div>
            <div id="toggle-btn" class="fas fa-sun"></div>
         </div>

         <div class="profile">
            <!-- <img src="../Media/pic-1.jpg" class="image" alt=""> -->
            <img src="../<?php echo $_SESSION['photo'] ?>" class="image">
            <h3 class="name">
               <p>Salut, <b><?php
                              echo "" . $_SESSION['prenom'] . "";
                              ?>
                  </b></p>
            </h3>
            <p class="role">étudiant</p>
            <a href="profile.php" class="btn">voir le profil</a>
            <div class="flex-btn">
               <a href="login.html" class="option-btn">connexion</a>
               <a href="register.html" class="option-btn">s'inscrire</a>
            </div>
         </div>

      </section>

   </header>

   <div class="side-bar">

      <div id="close-btn">
         <i class="fas fa-times"></i>
      </div>

      <div class="profile">
         <!-- <img src="../Media/pic-1.jpg" class="image" alt=""> -->
         <img src="../<?php echo $_SESSION['photo'] ?>" class="image">
         <h3 class="name">
            <p>Salut, <b><?php
                           echo "" . $_SESSION['prenom'] . "";
                           ?>
               </b></p>
         </h3>
         <p class="role">étudiant</p>
         <a href="profile.php" class="btn">voir le profil</a>
      </div>

      <nav class="navbar">
         <a href="profile.php"><i class="fas fa-home"></i><span>accueil</span></a>
         <a href="Qcm.php"><i class="fas fa-list-alt"></i><span>Qcm</span></a>
         <a href="displayCours.php"><i class="fas fa-graduation-cap"></i><span>cours</span></a>
         <a href="teachers.html"><i class="fas fa-chalkboard-user"></i><span>enseignants</span></a>
         <a href="ContactStudent.php"><i class="fas fa-headset"></i><span>nous contacter</span></a>
         <a href="#" id="dcnx"><i class="fas fa-sign-out-alt"></i><span>Déconnexion</span></a>

      </nav>

   </div>
   <?php
   echo "<script>";
   echo "let dcnx = document.getElementById('dcnx');";
   echo "dcnx.addEventListener('click', () => {
                    document.location.href = '../index.php?action=deconnexion';
                });";
   echo "</script>";
   ?>


   <section class="contact">

      <div class="row">

         <div class="image">
            <img src="../Media/contact-img.svg" alt="">
         </div>

         <form action="" method="post">
            <h3>Contacter-Nous</h3>
            <input type="text" placeholder="entrer votre nom" name="name" required maxlength="50" class="box">
            <input type="email" placeholder="entrer votre mail" name="email" required maxlength="50" class="box">
            <input type="number" placeholder="entrer votre numéro" name="number" required maxlength="50" class="box">
            <textarea name="msg" class="box" placeholder="entrer votre message" required maxlength="1000" cols="30" rows="10"></textarea>
            <input type="submit" value="envoyer" class="inline-btn" name="submit">
         </form>

      </div>

      <div class="box-container">

         <div class="box">
            <i class="fas fa-phone"></i>
            <h3>numéro de téléphone</h3>
            <a href="tel:1234567890">123-456-7890</a>
            <a href="tel:1112223333">111-222-3333</a>
         </div>

         <div class="box">
            <i class="fas fa-envelope"></i>
            <h3>adresse e-mail</h3>
            <a href="mailto:shaikhanas@gmail.com">kaidi.ahmed@gmail.com</a>
            <a href="mailto:anasbhai@gmail.com">rharmaoui.rafik@gmail.com</a>
         </div>

         <div class="box">
            <i class="fas fa-map-marker-alt"></i>
            <h3>Adresse de bureau</h3>
            <a href="#">6, Avenue Alain Savary</a>
            <a> 21000 Dijon</a>
         </div>

      </div>

   </section>
   <footer class="footer">

      &copy; copyright @ 2022 par <span>StudyHub</span> | tous droits réservés!

   </footer>

   <!-- custom js file link  -->
   <script src="../Assets/js/script.js"></script>


</body>

</html>