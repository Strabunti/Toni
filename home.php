<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">

<head>
    <title>Home - TONI'S TRAMEZZINERIA</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="TONI'S TRAMEZZINERIA! I migliori panini, hamburger e tramezzini di Padova">
    <meta name="keywords" content="tramezzini, panini, hamburger, fast-food, gourmet, cucina, Padova, Portello">
    <link rel="stylesheet" type="text/css" href="styles/stylesHome.css" />
    <link rel="stylesheet" type="text/css" href="styles/stylesBody.css"/>
    <link rel="stylesheet" type="text/css" href="styles/stylesHeader.css"/>
    <link rel="stylesheet" type="text/css" href="styles/stylesFooter.css"/>
    <link id="style" rel="stylesheet" href="styles/dashboard-style.css">
    <link id="style" rel="stylesheet" href="styles/card-style.css">
    <link id="style" rel="stylesheet" href="styles/popup-style.css">
    <script src="user/cards/popup/popup.js"></script>
</head>

<?php session_start(); ?>

<body>
<!-- HEADER -->
<header>
        <div class="topnav">
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            &#9776;
            </a>
            <div id="myLinks" role="navigation">
                <a href="menu.html" aria-label="Vai al Menu" role="link">Menu</a></li>
                <a href="aboutus.html" aria-label="About Us" role="link">About Us</a></li>
                <a href="contatti.html" aria-label="Contattaci!" role="link">Contattaci</a></li>
            </div>
        </div>
    
    <nav class="main-nav" role="grid">
        <ul role="row">
            <li role="navigation"><a class="menu__item" href="menu.html" aria-label="Menu" role="link">Menu</a></li>
            <li role="navigation"><a class="menu__item" href="aboutus.html" aria-label="About Us" role="link">About Us</a></li>
            <li role="navigation"><a class="menu__item" href="contatti.html" aria-label="Contattaci!" role="link">Contattaci</a></li>
        </ul>
    </nav>

    <a href="home.php" id="logoLink">
        <img id="headerLogo" src="resources/images/logo.png" alt="Logo di TONI'S TRAMEZZINERIA">
    </a>
    <a href="login.php" id="loginButton" aria-labelledby="loginButton" class="standard-button" role="button">LOGIN</a>

</header>

    <main>
        <!-- MAIN SECTION -->
        <section id="mainSection">
            <div class="rectangle" id="titleRectangle" aria-labelledby="mainSectionHeading">
                <h1 id="mainSectionHeading">TONI'S<br>Tramezzineria</h1>
            </div>
            <div class="rectangle" id="subtitleRectangle" aria-labelledby="mainSectionSubtitle">
                <h2 id="mainSectionSubtitle">Il tuo paninaro e tramezzinatore di fiducia</h2>
            </div>
            <a href="menu.html" id="toMenuButton" aria-label="Vai al menu" class="standard-button">VAI AL MENU</a>
        </section>

        <!-- CONSIGLI SECTION -->
        <?php
            // Include your menu manager file
            include 'user/backend/menu-manager.php';

            // Fetch information for the bestseller and dish of the month
            $bestSellerDish = getBestSellerDish();
            $bestMonthDish = getBestMonthDish();
        ?>

        <section id="consigliSection" aria-labelledby="consigliSectionTitle">
            <div class="left-rectangle"></div>
            <div class="top-rectangle"></div>
            
            <h3 class="align-right" id="consigliSectionTitle">TOMMY CONSIGLIA</h3>

            <div class="side-by-side">
                <?php if ($bestSellerDish) : ?>
                    <div class="consiglio-item">
                        <h4>IL BESTSELLER</h4>
                        <div class="menu-item-container">
                            <div class="menu-item-images">
                                <img class="left-image" src="resources/images/vinileChiusoNew.jpg" alt="Immagine di Background 1">
                                <img class="right-image" src="resources/images/vinileSemiAperto.png" alt="Immagine di Background 2">
                            </div>

                            <div>
                                <button class="menu-item-button" aria-label="Vai al Menu" role="button">
                                    <!-- Use $bestSellerDish properties for image source -->
                                    <img class="menu-item-image" src="<?php echo displayDishImage($bestSellerDish['id_dish']); ?>" alt="Bestseller Dish Image">    
                                    <p><?php echo $bestSellerDish['name']; ?></p>
                                </button>
                            </div>
                        </div>
                        
                        <div class="consiglio-item-description">
                            <p><?php echo $bestSellerDish['description']; ?></p>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ($bestMonthDish) : ?>
                <div class="consiglio-item">
                    <h4>PANINO DEL MESE</h4>
                    <div class="menu-item-container">
                            <div class="menu-item-images">
                                <img class="left-image" src="resources/images/vinileChiusoNew.jpg" alt="Immagine di Background 1">
                                <img class="right-image" src="resources/images/vinileSemiAperto.png" alt="Immagine di Background 2">
                            </div>

                            <div>
                                <button class="menu-item-button" aria-label="Vai al Menu" role="button">
                                    <!-- Use $bestSellerDish properties for image source -->
                                    <img class="menu-item-image" src="<?php echo displayDishImage($bestMonthDish['id_dish']); ?>" alt="Bestseller Dish Image">    
                                    <p><?php echo $bestMonthDish['name']; ?></p>
                                </button>
                            </div>
                        </div>
                    
                    <div class="consiglio-item-description">
                        <p><?php echo $bestMonthDish['description']; ?></p>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </section>
        
        <!-- DOVE SIAMO SECTION -->
        <section id="doveSiamoSection" aria-labelledby="doveSiamoSectionTitle">
            <div class="left-rectangle"></div>
            <div class="top-rectangle"></div>
            <h3 class="align-left" id="doveSiamoSectionTitle">DOV'E' TONI'S?</h3>
            <div class="side-by-side">
                <div class="map-container">
                    <iframe class="map" title="Mappa dove trovarci" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11204.230924611375!2d11.892494!3d45.4081754!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x477edaf723594ce7%3A0x822810e7e09bc854!2sToni&#39;s%20Tramezzineria!5e0!3m2!1sit!2sit!4v1705222707812!5m2!1sit!2sit" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" alt="Mappa Embedded di Google Maps"></iframe>
                </div>
                <div class="location-info">
                    <p>Ti abbiamo già convinto? Ottimo! <br> Vieni a trovarci a Padova, in zona Portello!</p>
                    <a href="aboutus.html" id="goToAboutUs" aria-label="Dove siamo" class="standard-button" role="button">DOVE SIAMO</a>
                </div>
            </div>
        </section>

        <!-- LA NOSTRA SCELTA SECTION -->
        <section id="sceltaSection" aria-labelledby="sceltaSectionTitle">

            <div class="left-rectangle"></div>
            <div class="top-rectangle"></div>

            <h3 class="align-right" id="sceltaSectionTitle">LA NOSTRA SCELTA</h3>

            <div class="side-by-side">
                <div class="buttons-container">
                    <ul>
                        <li><button class="category-button clicked" onclick="toggleClickedState(this)"><h4>HAMBURGER</h4></button></li>
                        <li><button class="category-button" onclick="toggleClickedState(this)"><h4>PANINI</h4></button></li>
                        <li><button class="category-button" onclick="toggleClickedState(this)"><h4>TRAMEZZINI</h4></button></li>
                    </ul>
                </div>

                <div class="mobile-buttons">
                    <button class="mobile-category-button"><h4>HAMBURGER</h4></button>
                    <button class="mobile-category-button"><h4>PANINI</h4></button>
                    <button class="mobile-category-button"><h4>TRAMEZZINI</h4></button>
                </div>

                <div class="image-button">
                    <img class="background-image" src="resources/images/vinileChiusoNew.jpg" alt="Immagine di Background">
                    <div>
                        <button href="menu.html" aria-label="Vai al Menu" role="button">
                            <h5>PORTEO</h5>
                        </button>
                    </div>

                </div>
            </div>
        </section>

        <!-- RECENSIONI SECTION -->
        <section id="recensioniSection" aria-labelledby="recensioniSectionTitle">
            <div class="left-rectangle"></div>
            <div class="top-rectangle"></div>

            <h3 class="align-left" id="recensioniSectionTitle">DICONO DI TONI'S</h3>
            <div class="recensioni">
                <?php
                    require_once 'user/session/auth.php';
                    require_once 'user/backend/comment-manager.php';
                    $bestComments = getBestComments(3);

                    if ($bestComments) {
                        foreach ($bestComments as $comment) 
                            include 'user/cards/comment-card.php';
                    } else 
                        echo "No comments found";
                ?>
            </div>
            
        </section>
    </main>

<!-- FOOTER -->
<footer>
    <div class="top-part">
        <div class="logo-address-container">
            <img src="resources/images/logo.png" alt="Logo di TONI'S TRAMEZZINERIA" id="footerLogo">
            <address class="address">
                TONI'S TRAMEZZINERIA <br/>
                Via del Portello, 24, 35129, Padova (PD) <br>
            </address>
            <div class="social-media-links">
                <a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer">
                    <img src="resources/images/facebookLogo.png" alt="Logo di Facebook">
                </a>
                <a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer">
                    <img src="resources/images/instagramLogo.png" alt="Logo di Instagram">
                </a>
            </div>
        </div>
        <div class="mappa-del-sito">
            <p>Mappa del Sito</p>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="menu.html">Menu</a></li>
                <li><a href="aboutus.html">About Us</a></li>
                <li><a href="contatti.html">Contattaci</a></li>
            </ul>
        </div>
    </div>
    <div id="footerCopyright">
        <p>&copy; 2024 Strabunti. Tutti i diritti riservati.</p>
    </div>
</footer>

    <script src="scripts/scriptHome.js"></script>
    <script src="scripts/scriptHeader.js"></script>
</body>

</html>