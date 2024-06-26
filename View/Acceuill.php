<?php
$titre = 'warProg - Apprendre en Ligne';
$CSS = 'Style/Acceuil1.css'; // Assurez-vous que ce chemin est correct
$lienQcm = 'View/Qcm.php';
$lienCntct = 'View/Contact.php';
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="64x64" href="../Media/file (3).png">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo $CSS; ?>">


    <title><?php echo $titre; ?></title>
</head>

<body>

    <nav>
        <div class="left">
            <div class="logo">
                <img src="Media/file (3).png">
            </div>
            <div class="links">
                <a href="#">Accueil</a>
                <a href="#cours">Cours</a>
                <a href="#podcasts" class="hide-on">Podcasts</a>
                <a href="#quiz" class="hide-on">Quiz</a>
                <a id="qcm" class='Home hide-on' href="<?php echo $lienQcm ?>" hidden>Qcm</a>
                <a href="#propos" class="hide-on">À propos de nous</a>
                <a href="<?php echo $lienCntct ?>" class="hide-on">Contactez-nous</a>
            </div>
        </div>

        <div class="buttons">
            <!-- <a href="#"><i class='bx bx-support'></i></a>
            <a href="#"><i class='bx bx-basket'></i></a>
            <a href="#"><i class='bx bx-user'></i></a> -->
            <button id="cnx" class="hire-btn" onclick="connexion()">Se connecter</button>
            <button id="dcnx" class="hire-btn" onclick="deconnexion()" hidden>Se deconnecter</button>
            <?php
            if (isset($_SESSION['nom'])) {
                echo "<script>";
                // echo "let cours = document.getElementById('cours');";
                // echo "cours.style.display = 'block';";
                // echo "let qcm = document.getElementById('qcm');";
                // echo "qcm.style.display = 'block';";
                echo "let cnx = document.getElementById('cnx');";
                echo "cnx.style.display = 'none';";
                echo "let dcnx = document.getElementById('dcnx');";
                echo "dcnx.style.display = 'block';";
                echo "dcnx.addEventListener('click', () => {
                document.location.href = 'index.php?action=deconnexion';
            });";
                echo "</script>";
            }
            ?>
        </div>

    </nav>

    <header>
        <div class="info">
            <h1>Formation en ligne Avancée</h1>
            <p>Développez vos compétences avec nos formations spécialisées!</p>
        </div>
        <div class="buttons">
            <button class="see-all" onclick="connexion()">Voir les cours</button>
            <!-- <button class="see-all">Qu'est-ce que la programmation ?</button> -->
        </div>
        <!-- <div class="search">
            <input type="text" placeholder="Search what you want...">
            <button><i class='bx bx-search'></i></button>
        </div> -->
    </header>

    <div class="content">
        <section id="cours">
            <div class="separator">
                <h2>Cours populaires</h2>
                <a href="#" onclick="connexion()">Voir tous <i class='bx bx-chevron-right'></i></a>
            </div>
            <div class="courses">
                <div class="item">
                    <div class="top">
                        <img src="Media/course-1.jpg">
                        <div class="info">
                            <a href="#">Apprenez React avec des Mini Projets</a>
                            <p>Auteur : Reza Mehdikhanlou</p>
                            <p>Durée : +13 heures</p>
                            <p>Support à vie</p>
                        </div>
                    </div>
                    <div class="bottom">
                        <div class="price">
                            <h5>Prix : 40 $</h5>
                            <p>Ancien prix : 120 $</p>
                        </div>
                        <h5 class="tag"><span>+400</span> Étudiants</h5>
                    </div>
                </div>
                <div class="item">
                    <div class="top">
                        <img src="Media/course-2.jpg">
                        <div class="info">
                            <a href="#">Formation complète sur Bootstrap</a>
                            <p>Auteur : Reza Mehdikhanlou</p>
                            <p>Durée : +13 heures</p>
                            <p>Support à vie</p>
                        </div>
                    </div>
                    <div class="bottom">
                        <div class="price">
                            <h5>Prix : 40 $</h5>
                            <p>Ancien prix : 120 $</p>
                        </div>
                        <div class="discount">
                            <div class="time">
                                <p>Jusqu'à</p>
                                <h5>3 jours</h5>
                            </div>
                            <h5><span>20%</span>Remise</h5>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="top">
                        <img src="Media/course-3.jpg">
                        <div class="info">
                            <a href="#">100 Jours de JavaScript</a>
                            <p>Auteur : Reza Mehdikhanlou</p>
                            <p>Durée : +13 heures</p>
                            <p>Support à vie</p>
                        </div>
                    </div>
                    <div class="bottom">
                        <div class="price">
                            <h5>Prix : 40 $</h5>
                            <p>Ancien prix : 120 $</p>
                        </div>
                        <h5 class="tag"><span>+400</span> Étudiants</h5>
                    </div>
                </div>
                <div class="item">
                    <div class="top">
                        <img src="Media/course-4.jpg">
                        <div class="info">
                            <a href="#">Apprendre le design responsive</a>
                            <p>Auteur : Reza Mehdikhanlou</p>
                            <p>Durée : +13h</p>
                            <p>Support à vie</p>
                        </div>
                    </div>
                    <div class="bottom">
                        <div class="price">
                            <h5>Prix : 40$</h5>
                            <p>Ancien prix : 120$</p>
                        </div>
                        <div class="discount">
                            <div class="time">
                                <p>Jusqu'à</p>
                                <h5>3 jours</h5>
                            </div>
                            <h5><span>20%</span> Remise</h5>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="top">
                        <img src="Media/course-5.jpg">
                        <div class="info">
                            <a href="#">Apprendre PHP avec des mini projets</a>
                            <p>Auteur : Reza Mehdikhanlou</p>
                            <p>Durée : +13h</p>
                            <p>Support à vie</p>
                        </div>
                    </div>
                    <div class="bottom">
                        <div class="price">
                            <h5>Prix : 40$</h5>
                            <p>Ancien prix : 120$</p>
                        </div>
                        <h5 class="tag"><span>+400</span> Étudiants</h5>
                    </div>
                </div>

                <div class="item">
                    <div class="top">
                        <img src="Media/course-6.jpg">
                        <div class="info">
                            <a href="#">Coder une API avec NodeJS</a>
                            <p>Auteur : Reza Mehdikhanlou</p>
                            <p>Durée : +13h</p>
                            <p>Support à vie</p>
                        </div>
                    </div>
                    <div class="bottom">
                        <div class="price">
                            <h5>Prix : 40$</h5>
                            <p>Ancien prix : 120$</p>
                        </div>
                        <div class="discount">
                            <div class="time">
                                <p>Jusqu'à</p>
                                <h5>3 jours</h5>
                            </div>
                            <h5><span>20%</span> Remise</h5>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="separator">
            <h2>Commentaires des étudiants</h2>
        </div>

        <div class="comments">
            <p>Voici les commentaires de nos étudiants. Cela vous aidera à choisir vos cours de manière plus avisée. Vous pouvez également nous contacter pour plus d'informations !</p>
            <div class="right">
                <div class="item">
                    <img src="Media/profile-3.png">
                    <p>C'était le meilleur cours pour moi.</p>
                </div>
                <div class="item">
                    <img src="Media/profile-2.png">
                    <p>Ces cours m'ont beaucoup aidé !</p>
                </div>
                <div class="item">
                    <img src="Media/profile-1.png">
                    <p>Ce cours a été vraiment exceptionnel pour moi, c'était exactement ce dont j'avais besoin.</p>
                </div>
                <div class="item">
                    <img src="Media/profile-1.png">
                    <p>Excellent ! Ce cours était au top pour moi.</p>
                </div>
                <div class="item">
                    <img src="Media/profile-2.png">
                    <p> Je ne peux pas assez recommander ce cours. C'était tellement engageant et instructif. Pour moi, c'était vraiment le top du top.</p>

                </div>
                <div class="item">
                    <img src="Media/profile-3.png">
                    <p>Cours magistral, une révélation pour moi !</p>
                </div>
            </div>
        </div>
        <section id="podcasts">
            <div class="separator">
                <h2>Podcasts hebdomadaires</h2>
                <a href="#" onclick="connexion()">Voir tous <i class='bx bx-chevron-right'></i></a>
            </div>

            <div class="podcasts">
                <div class="item">
                    <div class="top">
                        <i class='bx bx-headphone'></i>
                        <div class="info">
                            <a href="#">Apprendre le codage</a>
                            <p>10 août 2024</p>
                            <p>Écouté 100 fois</p>
                        </div>
                    </div>
                    <div class="bottom">
                        <div class="duration">
                            <audio controls class="audio">
                                <source src="Media/audio.mp3" type="audio/mp3">
                                Votre navigateur ne supporte pas l'élément <code>audio</code>.
                            </audio>
                        </div>
                        <h5 class="tag"><span>+210</span> Auditeurs</h5>
                    </div>

                </div>
                <div class="item">
                    <div class="top">
                        <i class='bx bx-headphone'></i>
                        <div class="info">
                            <a href="#">Apprendre le codage</a>
                            <p>10 août 2024</p>
                            <p>Écouté 100 fois</p>
                        </div>
                    </div>
                    <div class="bottom">
                        <div class="duration">
                            <audio controls class="audio">
                                <source src="Media/audio1.mp3" type="audio/mp3">
                                Votre navigateur ne supporte pas l'élément <code>audio</code>.
                            </audio>
                        </div>
                        <h5 class="tag"><span>+210</span> Auditeurs</h5>
                    </div>
                </div>
                <div class="item">
                    <div class="top">
                        <i class='bx bx-headphone'></i>
                        <div class="info">
                            <a href="#">Apprendre le codage</a>
                            <p>10 août 2024</p>
                            <p>Écouté 100 fois</p>
                        </div>
                    </div>
                    <div class="bottom">
                        <div class="duration">
                            <audio controls class="audio">
                                <source src="Media/audio2.mp3" type="audio/mp3">
                                Votre navigateur ne supporte pas l'élément <code>audio</code>.
                            </audio>
                        </div>
                        <h5 class="tag"><span>+210</span> Auditeurs</h5>
                    </div>
                </div>
            </div>
        </section>
        <section id="quiz">
            <div class="separator">
                <h2>Quiz</h2>
                <a href="#" onclick="connexion()">Voir tous <i class='bx bx-chevron-right'></i></a>
            </div>

            <div class="articles">
                <div class="item">
                    <div class="top">
                        <img src="Media/art-1.jpg">
                        <h5>Quelle méthode permet de convertir une chaîne de caractères en minuscules en JavaScript ?</h5>
                    </div>
                    <div class="bottom">
                        <h5><span>+420</span> Vues</h5>
                        <a href="#" onclick="connexion()">Répondre au quiz<i class='bx bx-chevron-right'></i></a>
                    </div>
                </div>
                <div class="item">
                    <div class="top">
                        <img src="Media/art-4.jpg">
                        <h5>Comment peut-on inclure le contenu d'un fichier externe dans un script PHP ?</h5>
                    </div>
                    <div class="bottom">
                        <h5><span>+420</span> Vues</h5>
                        <a href="#" onclick="connexion()">Répondre au quiz<i class='bx bx-chevron-right'></i></a>
                    </div>
                </div>
                <div class="item">
                    <div class="top">
                        <img src="Media/python.jpg">
                        <h5>Quelle est la fonction pour obtenir la longueur d'une liste en Python ?</h5>
                    </div>
                    <div class="bottom">
                        <h5><span>+420</span> Vues</h5>
                        <a href="#" onclick="connexion()">Répondre au quiz<i class='bx bx-chevron-right'></i></a>
                    </div>
                </div>
                <div class="item">
                    <div class="top">
                        <img src="Media/sql.jpg">
                        <h5>Quelle clause SQL est utilisée pour filtrer les résultats d'une requête basée sur une condition spécifiée ?</h5>
                    </div>
                    <div class="bottom">
                        <h5><span>+420</span> Vues</h5>
                        <a href="#" onclick="connexion()">Répondre au quiz<i class='bx bx-chevron-right'></i></a>
                    </div>
                </div>
            </div>
        </section>
        <section id="propos">
            <footer>
                <div class="columns">
                    <div class="col">
                        <h5>Liens du site</h5>
                        <a href="#article">Articles</a>
                        <a href="#podcasts">Podcasts</a>
                        <a href="#propos">À propos de nous</a>
                        <a href="#">Contactez-nous</a>
                    </div>
                    <div class="col">
                        <h5>Autres pages</h5>
                        <a href="#">Page 404</a>
                        <a href="#">Connexion | Inscription</a>
                        <a href="#">Politique de confidentialité</a>
                    </div>
                    <div class="col">
                        <h5>Collaboration</h5>
                        <a href="#">Travailler avec nous</a>
                        <a href="#">Affiliation</a>
                        <a href="#">Support</a>
                    </div>
                    <div class="col last">
                        <h5>À propos de nous</h5>
                        <p>Nous sommes une équipe passionnée de spécialistes de l'éducation en ligne, prête à vous offrir les meilleures ressources pour améliorer vos compétences.</p>
                        <div class="social-links">
                            <i class='bx bxl-instagram'></i>
                            <i class='bx bxl-dribbble'></i>
                            <i class='bx bxl-linkedin'></i>
                            <i class='bx bxl-twitter'></i>
                        </div>
                    </div>
                </div>
                <div class="copyright">
                    <p>Droits d'auteur © 2024 WarProg, Tous droits réservés.</p>
                </div>
            </footer>
        </section>

        <script src="Assets/js/Acceuil.js"></script>


</body>

</html>
<?php
$contenu = ob_get_clean();
print $contenu;
?>