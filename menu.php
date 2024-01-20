<!DOCTYPE html>
<html lang="it">
    <head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="styles/stylesMenu.css"/>
        <link rel="stylesheet" type="text/css" href="styles/stylesBody.css"/>
        <link rel="stylesheet" type="text/css" href="styles/stylesHeader.css"/>
        <link rel="stylesheet" type="text/css" href="styles/stylesFooter.css"/>
		<title>Menu</title>
    </head>

<?php session_start(); ?>

<body>
    <!-- HEADER -->
    <header>
        <div class="topnav">
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            &#9776;
            </a>
            <div id="myLinks">
                <a href="menu.php" aria-label="Vai al Menu" role="link">Menu</a></li>
                <a href="aboutus.html" aria-label="Scopri di più su TONI'S" role="link">About Us</a></li>
                <a href="contatti.html" aria-label="Contattaci!" role="link">Contattaci</a></li>
            </div>
        </div>

        <nav class="main-nav" role="navigation">
            <ul>
                <li role="menuitem"><a class="menu__item" href="menu.php" aria-label="Vai al Menu" role="link">Menu</a></li>
                <li role="menuitem"><a class="menu__item" href="aboutus.html" aria-label="Scopri di più su TONI'S" role="link">About Us</a></li>
                <li role="menuitem"><a class="menu__item" href="contatti.html" aria-label="Contattaci!" role="link">Contattaci</a></li>
            </ul>
        </nav>

        <a href="home.php" id="logoLink">
            <img id="headerLogo" src="resources/images/logo.webp" alt="Logo di TONI'S TRAMEZZINERIA">
        </a>
        <a href="login.php" id="loginButton" aria-labelledby="loginButton" class="standard-button" role="button">LOGIN</a>

    </header>

        <section id="mainSection">
            <div class="rectangle" id="titleRectangle"><h1>MENU</h1></div>  
        </section>
        
        <section id="prodottiSection">
            <h2 role="heading" aria-level="2">PRODOTTI</h2>
            <ul >
                <button id="goToTramezzini" class="standard-button" onclick="scrollToSection('tramezzini')">Tramezzini</button>
                <button id="goToPanini" class="standard-button" onclick="scrollToSection('panini')">Panini</button>
                <button id="goToBurgers" class="standard-button"  onclick="scrollToSection('burgers')">Burgers</button>
            </ul>
        </section>

        <div id="scrollToTopBtn" onclick="scrollToTop()">&#8593;</div>

        <section id="tramezzini">

        <?php
            // Include your menu manager file
            include 'user/backend/menu-manager.php';

            // Fetch information for the bestseller and dish of the month
            $tramezzini = getDishesByType("Tramezzini");
        ?>

            <h2 role="heading" aria-level="2">TRAMEZZINI</h2>
            <p>Esplora la nostra deliziosa selezione di tramezzini, autentiche creazioni italiane che trasformano il semplice pane in opere d'arte gastronomiche. 
                Dalle classiche combinazioni ai twist creativi, scopri le ricette che soddisferanno ogni palato.</p>
            
            <?php foreach $tramezzini as $tramezzino {
            ?>
                <div class="prodotto-item">
                    <div class="menu-item-container">
                        <div class="menu-item-images">
                            <img class="left-image" src="resources/images/vinileChiusoNew.webp" alt="Immagine di Background 1">
                            <img class="right-image" src="resources/images/vinileSemiAperto.webp" alt="Immagine di Background 2">
                        </div>
    
                        <div>
                            <button class="menu-item-button" aria-label="Vai al Menu" role="button">
                                <!-- Use $bestSellerDish properties for image source -->
                                <img class="menu-item-image" src="<?php echo displayDishImage($tramezzino['id_dish']); ?>" alt="Dish Image">    
                                <p><?php echo $tramezzino['name']; ?></p>
                            </button>
                        </div>
                    </div>
                </div>
            <?php } ?>
            
                <div class="prodotto-item">
                    <div class="menu-item-container">
                        <div class="menu-item-images">
                            <img class="left-image" src="resources/images/vinileChiusoNew.webp" alt="Immagine di Background 1">
                            <img class="right-image" src="resources/images/vinileSemiAperto.webp" alt="Immagine di Background 2">
                        </div>
                        <div>
                            <button class="menu-item-button">
                                <h4>PORTEO</h4>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="prodotto-item">
                    <div class="menu-item-container">
                        <div class="menu-item-images">
                            <img class="left-image" src="resources/images/vinileChiusoNew.webp" alt="Immagine di Background 1">
                            <img class="right-image" src="resources/images/vinileSemiAperto.webp" alt="Immagine di Background 2">
                        </div>
                        <div>
                            <button class="menu-item-button">
                                <h4>PORTEO</h4>
                            </button>
                        </div>
                    </div>
                </div>

        </section>
    
        <section id="panini">

            <h2 role="heading" aria-level="2">PANINI</h2>
            <p>Esplora la nostra deliziosa selezione di panini, autentiche creazioni italiane che trasformano il semplice pane in opere d'arte gastronomiche. 
                Dalle classiche combinazioni ai twist creativi, scopri le ricette che soddisferanno ogni palato.</p>
        
            <div class="prodotto-item">
                <div class="menu-item-container">
                    <div class="menu-item-images">
                        <img class="left-image" src="resources/images/vinileChiusoNew.webp" alt="Immagine di Background 1">
                        <img class="right-image" src="resources/images/vinileSemiAperto.webp" alt="Immagine di Background 2">
                    </div>
                    <div>
                        <button class="menu-item-button">
                            <h4>PORTEO</h4>
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="prodotto-item">
                <div class="menu-item-container">
                    <div class="menu-item-images">
                        <img class="left-image" src="resources/images/vinileChiusoNew.webp" alt="Immagine di Background 1">
                        <img class="right-image" src="resources/images/vinileSemiAperto.webp" alt="Immagine di Background 2">
                    </div>
                    <div>
                        <button class="menu-item-button">
                            <h4>PORTEO</h4>
                        </button>
                    </div>
                </div>
            </div>
        
            <div class="prodotto-item">
                <div class="menu-item-container">
                    <div class="menu-item-images">
                        <img class="left-image" src="resources/images/vinileChiusoNew.webp" alt="Immagine di Background 1">
                        <img class="right-image" src="resources/images/vinileSemiAperto.webp" alt="Immagine di Background 2">
                    </div>
                    <div>
                        <button class="menu-item-button">
                            <h4>PORTEO</h4>
                        </button>
                    </div>
                </div>
            </div>
        
        </section>
        
        <section id="burgers">
        
            <h2 role="heading" aria-level="2">BURGERS</h2>
            <p>Esplora la nostra deliziosa selezione di burgers, autentiche creazioni italiane che trasformano il semplice pane in opere d'arte gastronomiche. 
                Dalle classiche combinazioni ai twist creativi, scopri le ricette che soddisferanno ogni palato.</p>
        
            <div class="prodotto-item">
                <div class="menu-item-container">
                    <div class="menu-item-images">
                        <img class="left-image" src="resources/images/vinileChiusoNew.webp" alt="Immagine di Background 1">
                        <img class="right-image" src="resources/images/vinileSemiAperto.webp" alt="Immagine di Background 2">
                    </div>
                    <div>
                        <button class="menu-item-button">
                            <h4>PORTEO</h4>
                        </button>
                    </div>
                </div>
            </div>
        
            <div class="prodotto-item">
                <div class="menu-item-container">
                    <div class="menu-item-images">
                        <img class="left-image" src="resources/images/vinileChiusoNew.webp" alt="Immagine di Background 1">
                        <img class="right-image" src="resources/images/vinileSemiAperto.webp" alt="Immagine di Background 2">
                    </div>
                    <div>
                        <button class="menu-item-button">
                            <h4>PORTEO</h4>
                        </button>
                    </div>
                </div>
            </div>
        
            <div class="prodotto-item">
                <div class="menu-item-container">
                    <div class="menu-item-images">
                        <img class="left-image" src="resources/images/vinileChiusoNew.webp" alt="Immagine di Background 1">
                        <img class="right-image" src="resources/images/vinileSemiAperto.webp" alt="Immagine di Background 2">
                    </div>
                    <div>
                        <button class="menu-item-button">
                            <h4>MILLO BURG</h4>
                        </button>
                    </div>
                </div>
            </div>

            <div class="prodotto-item">
                <div class="menu-item-container">
                    <div class="menu-item-images">
                        <img class="left-image" src="resources/images/vinileChiusoNew.webp" alt="Immagine di Background 1">
                        <img class="right-image" src="resources/images/vinileSemiAperto.webp" alt="Immagine di Background 2">
                    </div>
                    <div>
                        <button class="menu-item-button">
                            <h4>PORTEO</h4>
                        </button>
                    </div>
                </div>
            </div>

            <div class="prodotto-item">
                <div class="menu-item-container">
                    <div class="menu-item-images">
                        <img class="left-image" src="resources/images/vinileChiusoNew.webp" alt="Immagine di Background 1">
                        <img class="right-image" src="resources/images/vinileSemiAperto.webp" alt="Immagine di Background 2">
                    </div>
                    <div>
                        <button class="menu-item-button">
                            <h4>PORTEO</h4>
                        </button>
                    </div>
                </div>
            </div>
        
        </section>
        
<!-- FOOTER -->
<footer>
    <div class="top-part">
        <div class="logo-address-container">
            <img src="resources/images/logo.webp" alt="Logo di TONI'S TRAMEZZINERIA" id="footerLogo">
            <address class="address">
                TONI'S TRAMEZZINERIA <br/>
                Via del Portello, 24, 35129, Padova (PD) <br>
            </address>
            <div class="social-media-links">
                <a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer">
                    <img src="resources/images/facebookLogo.webp" alt="Logo di Facebook">
                </a>
                <a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer">
                    <img src="resources/images/instagramLogo.webp" alt="Logo di Instagram">
                </a>
            </div>
        </div>
        <div class="mappa-del-sito">
            <p>Mappa del Sito</p>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="aboutus.html">About Us</a></li>
                <li><a href="contatti.html">Contattaci</a></li>
            </ul>
        </div>
    </div>
    <div id="footerCopyright">
        <p>&copy; 2024 Strabunti. Tutti i diritti riservati.</p>
    </div>
</footer>

<script src="scripts/scriptMenu.js"></script>
<script src="scripts/scriptHome.js"></script>
<script src="scripts/scriptHeader.js"></script>

     </body>
</html>