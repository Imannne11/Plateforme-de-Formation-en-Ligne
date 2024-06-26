<?php
$titre = 'warProg - Apprendre en Ligne';
$CSS = 'Style/Acceuil.css'; // Assurez-vous que ce chemin est correct
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
   <title>watch</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link rel="stylesheet" href="../style/styleStudent.css">
   <link rel="icon" type="image/png" sizes="64x64" href="../Media/file (3).png">
   <title><?php echo $titre; ?></title>

</head>

<body>

   <header class="header">

      <section class="flex">

         <a href="home.html" class="logo">Educa.</a>

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
            <img src="../<?php echo "" . $_SESSION['photo'] . "" ?>" class="image">
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
         <img src="../<?php echo "" . $_SESSION['photo'] . "" ?>" class="image">
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

   <section class="watch-video">

      <div class="video-container">
         <div class="video">
            <video src="../Media/vid-1.mp4" controls poster="../Media/post-1-1.png" id="video"></video>
         </div>
         <h3 class="title">complete HTML tutorial (part 01)</h3>
         <div class="info">
            <p class="date"><i class="fas fa-calendar"></i><span>22-10-2022</span></p>
            <p class="date"><i class="fas fa-heart"></i><span>44 likes</span></p>
         </div>
         <div class="tutor">
            <img src="../Media/pic-2.jpg" alt="">
            <div>
               <h3>john deo</h3>
               <span>developer</span>
            </div>
         </div>
         <form action="" method="post" class="flex">
            <a href="playlist.php" class="inline-btn">view playlist</a>
            <button><i class="far fa-heart"></i><span>like</span></button>
         </form>
         <p class="description">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Itaque labore ratione, hic exercitationem mollitia obcaecati culpa dolor placeat provident porro.
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquid iure autem non fugit sint. A, sequi rerum architecto dolor fugiat illo, iure velit nihil laboriosam cupiditate voluptatum facere cumque nemo!
         </p>
      </div>

   </section>

   <section class="comments">

      <h1 class="heading">5 comments</h1>

      <form action="" class="add-comment">
         <h3>add comments</h3>
         <textarea name="comment_box" placeholder="enter your comment" required maxlength="1000" cols="30" rows="10"></textarea>
         <input type="submit" value="add comment" class="inline-btn" name="add_comment">
      </form>

      <h1 class="heading">user comments</h1>

      <div class="box-container">

         <div class="box">
            <div class="user">
               <img src="../Media/pic-1.jpg" alt="">
               <div>
                  <h3>shaikh anas</h3>
                  <span>22-10-2022</span>
               </div>
            </div>
            <div class="comment-box">this is a comment form shaikh anas</div>
            <form action="" class="flex-btn">
               <input type="submit" value="edit comment" name="edit_comment" class="inline-option-btn">
               <input type="submit" value="delete comment" name="delete_comment" class="inline-delete-btn">
            </form>
         </div>

         <div class="box">
            <div class="user">
               <img src="../Media/pic-2.jpg" alt="">
               <div>
                  <h3>john deo</h3>
                  <span>22-10-2022</span>
               </div>
            </div>
            <div class="comment-box">awesome tutorial!
               keep going!</div>
         </div>

         <div class="box">
            <div class="user">
               <img src="../Media/pic-3.jpg" alt="">
               <div>
                  <h3>john deo</h3>
                  <span>22-10-2022</span>
               </div>
            </div>
            <div class="comment-box">amazing way of teaching!
               thank you so much!
            </div>
         </div>

         <div class="box">
            <div class="user">
               <img src="../Media/pic-4.jpg" alt="">
               <div>
                  <h3>john deo</h3>
                  <span>22-10-2022</span>
               </div>
            </div>
            <div class="comment-box">loved it, thanks for the tutorial!</div>
         </div>

         <div class="box">
            <div class="user">
               <img src="../Media/pic-5.jpg" alt="">
               <div>
                  <h3>john deo</h3>
                  <span>22-10-2022</span>
               </div>
            </div>
            <div class="comment-box">this is what I have been looking for! thank you so much!</div>
         </div>

         <div class="box">
            <div class="user">
               <img src="../Media/pic-2.jpg" alt="">
               <div>
                  <h3>john deo</h3>
                  <span>22-10-2022</span>
               </div>
            </div>
            <div class="comment-box">thanks for the tutorial!

               how to download source code file?
            </div>
         </div>

      </div>

   </section>

   <footer class="footer">

      &copy; copyright @ 2022 by <span>StudyHub/span> | all rights reserved!

   </footer>
   <script src="../Assets/js/script.js"></script>

</body>

</html>