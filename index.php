<?php

    if (isset($_POST['submit'])){

        //Controle des donnees saisies

        if (empty($_POST['nom']) || !preg_match('/[a-zA-Z]+/', $_POST['nom'])){

            $errorMsg = "Votre nom doit être une chaîne de caractère";
    
        }elseif (empty($_POST['prenom']) || !preg_match('/[a-zA-Z]+/',$_POST['prenom'])){

            $errorMsg = "Votre prénoms doit être une chaîne de caractère";

        }elseif(empty($_POST['telephone']) || !preg_match('/[0-9]+/', $_POST['telephone'])){

            $errorMsg = "Entrez un numéro de téléphone valide";
    
        }elseif(empty($_POST['mail']) || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){

            $errorMsg = "Entrer un email valide";
    
        }else{

            require_once('database.php');

            $date_de_commande = date('Y/m/d');

            $insertionCommande = $database->prepare('INSERT INTO astra.pre_commande(nom, prenom, telephone, mail, dateCommande) VALUES(:nom, :prenom, :telephone, :mail, :dateCommande)');
            $insertionCommande->bindvalue(':nom', $_POST['nom']);
            $insertionCommande->bindvalue(':prenom', $_POST['prenom']);
            $insertionCommande->bindvalue(':telephone', $_POST['telephone']);
            $insertionCommande->bindvalue(':mail', $_POST['mail']);
            $insertionCommande->bindvalue(':dateCommande', $date_de_commande);
            $result = $insertionCommande->execute();
            
            if ($result){
                $succesMsg = "Pré-commande validée";
            }
            else{
                $errorMsg = "Une erreur s'est produite. Veuillez réessayer !";
            }
            

        }
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XEnergy-Website</title>
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/brands.min.css" integrity="sha512-OivR4OdSsE1onDm/i3J3Hpsm5GmOVvr9r49K3jJ0dnsxVzZgaOJ5MfxEAxCyGrzWozL9uJGKz6un3A7L+redIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css" integrity="sha512-xX2rYBFJSj86W54Fyv1de80DWBq7zYLn2z0I9bIhQG+rxIF6XVJUpdGnsNHWRa6AvP89vtFupEPDP8eZAtu9qA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    
</head>
<body>

     <header id="accueil">
        <div class="logo">
            <img src="img/logo.png" alt="Logo XEnergy">
        </div>

        <nav class="navbar">
            <a href="#marche">Comment ça marche ?</a>
            <a href="#fonctionnalitees">Fonctionnalités</a>
            <a href="#apropos">Apropos</a>
            <a href="#contacts">Contacts</a>
        </nav>

        <div class="button">
            <a href="#contacts">Pré-commander</a>
        </div>

        <div class="menu">
        <i class="fa-solid fa-bars menu-hamburger"></i>
        </div>
    </header>

    <section class="one-section">
        <div class="text">

            <div class="text-gras">
                <p>Sed dictum luctus dolor, quis auctor nibh imperdiet non. </p>
            </div>

            <div class="text-normal">
                <p>Sed dictum luctus dolor, quis auctor nibh imperdiet non. Aliquam sit amet ipsum dui. Vivamus viverra ultrices dolor, et ultrices risus sollicitudin non</p>
            </div>

            <div class="button">
                <a href="#contacts">Pré-commander</a>
            </div>

        </div>

        <div class="smartphone">

            <div class="Phone">
                <img src="img/phone_xenergy.png" alt="">
            </div>

        </div>
    </section>

    <section class="two-section">
        <h1 class="title" id="marche">COMMENT CA MARCHE</h1>

        <p class="text-gras">
            Mésurer le niveau restant de votre gaz en de simple étapes
        </p>

        <div class="etape">
            <div class="xweigh">
                <h1>01</h1>
                <img src="img/gaz.png" alt="Gaz">
                <p>
                    Poser correctement votre bouteuille de gaz sur <span style="color:#6FDC8A; font-style: italic; font-weight: 600;">XWeigh</span>
                </p>
            </div>
            <div class="xenergyapp">
                <h1>02</h1>
                <img src="img/qrcode.png" alt="Qr code">
                <p>
                    Scannez le code Qr et téléchargez 
                </p>
            </div>
            <div class="consom">
                <h1>03</h1>
                <img src="img/consom.png" alt="Consommation">
                <p>
                    Consultez votre consommation et autres
                </p>
            </div>
        </div>
    </section>

    <section class="three-section">
        <h1 class="title" id="fonctionnalitees">
            FONCTIONNALITEES
        </h1>

        <p class="fonction-p">
            <span class="fonction-gras">XEnergy App</span>  quand la simplicité rencontre l’éfficacité
        </p>

        <div class="one-flex">
            <div class="iphone">
                <img src="img/iphone.png" alt="Iphone 13">
            </div>
            <div class="fonctions">
                <div class="fonction1">
                    <div class="fonction">
                        <img src="img/fonctions.png" alt="Fonctions">
                        <p class="title">
                            Sed dictum luctus dolor
                        </p>
                        <p class="paragraphe">
                            Sed dictum luctus dolor, quis auctor nibh imperdiet non
                        </p>
                    </div>
                    <div class="fonction">
                        <img src="img/fonctions.png" alt="Fonctions">
                        <p class="title">
                            Sed dictum luctus dolor
                        </p>
                        <p class="paragraphe">
                            Sed dictum luctus dolor, quis auctor nibh imperdiet non
                        </p>
                    </div>
                </div>
                <div class="fonction1">
                    <div class="fonction">
                        <img src="img/fonctions.png" alt="Fonctions">
                        <p class="title">
                            Sed dictum luctus dolor
                        </p>
                        <p class="paragraphe">
                            Sed dictum luctus dolor, quis auctor nibh imperdiet non
                        </p>
                    </div>
                    <div class="fonction">
                        <img src="img/fonctions.png" alt="Fonctions">
                        <p class="title">
                            Sed dictum luctus dolor
                        </p>
                        <p class="paragraphe">
                            Sed dictum luctus dolor, quis auctor nibh imperdiet non
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="four-section">
        <div class="haut" id="fonctionnalitees">
            <h1 class="title">
                FONCTIONNALITEES
            </h1>
            <p class="fonction-p">
                <span class="fonction-gras">XEnergy App</span>  quand la simplicité rencontre l’éfficacité
            </p>
        </div>

        <div class="fonctions">
            <div class="fonction1">
                <div class="fonction">
                    <img src="img/fonctions.png" alt="Fonctions">
                    <p class="title">
                        Sed dictum luctus dolor
                    </p>
                    <p class="paragraphe">
                        Sed dictum luctus dolor, quis auctor nibh imperdiet non
                    </p>
                </div>
                <div class="fonction">
                    <img src="img/fonctions.png" alt="Fonctions">
                    <p class="title">
                        Sed dictum luctus dolor
                    </p>
                    <p class="paragraphe">
                        Sed dictum luctus dolor, quis auctor nibh imperdiet non
                    </p>
                </div>
            </div>
            <div class="fonction1">
                <div class="fonction">
                    <img src="img/fonctions.png" alt="Fonctions">
                    <p class="title">
                        Sed dictum luctus dolor
                    </p>
                    <p class="paragraphe">
                        Sed dictum luctus dolor, quis auctor nibh imperdiet non
                    </p>
                </div>
                <div class="fonction">
                    <img src="img/fonctions.png" alt="Fonctions">
                    <p class="title">
                        Sed dictum luctus dolor
                    </p>
                    <p class="paragraphe">
                        Sed dictum luctus dolor, quis auctor nibh imperdiet non
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="five-section">
        <div class="asset">
            <img src="img/asset.png" alt="Asset">
            <p>
                Produire un asset pour cette partie
            </p>
        </div>
        
        <div class="form">
            <div class="bouton">
                <a href="#contacts" style="cursor:pointer">Pré-commander</a>
                <a href="#">Vérifier </a>
            </div>

            <div class="formulaire" id="contacts">
            <br>
                <div class="error" style="background-color:white;font-size:18px;"><span style="color:red;font-family:Poppins;"><?php if (isset($errorMsg)) echo $errorMsg; ?></span></div>
                <div class="succes" style="background-color:white;font-size:18px;"><span style="color:green;font-family:Poppins;"><?php if (isset($succesMsg)) echo $succesMsg; ?></span></div>
                <form method="post">

                    <div class="nom">
                        <label for="nom">Nom</label><br><br>
                        <input type="text" name="nom" id="nom">
                    </div><br>
                    <div class="prenom">
                        <label for="prenom">Prénom</label><br><br>
                        <input type="text" name="prenom" id="prenom">
                    </div><br>
                    <div class="telephone">
                        <label for="telephone">Téléphone</label><br><br>
                        <input type="text" name="telephone" id="telephone">
                    </div><br>
                    <div class="mail">
                        <label for="mail">Mail</label><br><br>
                        <input type="email" name="mail" id="mail">
                    </div><br>

                    <div class="acces">
                        <p>*L’accès à l’application mobile est  gratuite Seul le dispositif X-weighs  est payant . En pré-commande elle coûte <span class="fcfa">7000 fcfa</span></p>
                    </div>

                    <input type="submit" value="Pré-commander" class="submit" style="cursor:pointer" name="submit">
                </form>
            </div>

            
        </div>
    </section>

    <section class="six-section">
        <div class="nous" id="apropos">
            <h1 class="title">Qui sommes nous ?</h1>
            <p class="para-gras">Une équipe jeune et dynamique</p>
            <p class="simple"><span class="gras-noire">XEnergy</span> est un produit déveoppé par la  team Xenrgy qui appartient à la startup <span class="simple-noire">astra horizon</span> . Nullam lobortis eu dui id cursus. Phasellus posuere lacinia placerat. In malesuada porttitor eros, eget feugiat libero iaculis nec.</p>
        </div>
        <div class="image">
            <img src="img/sous.png" alt="Sous" class="sous">
            <img src="img/equipe.png" alt="Equipe" class="equipe">
        </div>
    </section>

    <section class="seven-section">
        <div id="contacts">
            <p>
                <br><br><br><br>
                Partie Contact
            </p>
        </div>
    </section>

    <footer>
        <div class="xenergy">
            <a href="#accueil"><img src="img/footer.png" alt="XEnergy" class="img"></a>
            <p class="solutions">Des solutions adaptées pour tous ménages</p>
            <p class="social">
                <a href="#" class="sociaux"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#" class="sociaux"><i class="fa-brands fa-instagram"></i></a>
                <a href="#" class="sociaux"><i class="fa-brands fa-twitter"></i></a>
            </p>
        </div>
        <div class="liens">
            <h1 class="title">Liens</h1>
            <div class="pre-etoile">
                <a href="#contacts">Pré-commander</a>
                <img src="img/etoile.svg" alt="Etoile">
            </div>
            <div class="link">
                <a href="#marche">Comment ça marche</a><br>
                <a href="#fonctionnalitees">Fonctionnalité</a><br>
                <a href="#contacts">Contacts</a><br>
            </div>

        </div>
        <div class="apropos">
            <h1 class="title">A propos</h1>
            <a href="#apropos">Qui sommes-nous ?</a><br>
            <a href="#">Politique de confidentialité</a><br>
            <a href="#">Conditions d’utilisations</a><br>
            <a href="#">Moyens de paiement</a><br>
        </div>
    </footer>

    <!--<script>
        const menuHamburger = document.querySelector(".menu-hamburger")
        const navLinks = document.querySelector(".nav-links")
 
        menuHamburger.addEventListener('click',()=>{
        navLinks.classList.toggle('mobile-menu')
        })
    </script>-->
</body>

<script>
    const menuHamburger = document.querySelector(".menu-hamburger")
    const navLinks = document.querySelector(".navbar")

    menuHamburger.addEventListener('click',()=>{
    navLinks.classList.toggle('mobile-menu')
    })
</script>
</html>