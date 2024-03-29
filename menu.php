<!DOCTYPE html>

<html lang="it" xmlns="http://www.w3.org/1999/xhtml" xml:lang="it">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="menu, tramezzini, panini, hamburger, fast-food, gourmet, economico, economici, prezzo, cucina, Padova, Portello">
    <meta name="description" content="Scopri il menù di TONI'S TRAMEZZINERIA! panini, hamburger e tramezzini gourmet economici a Padova! ">
    <link rel="stylesheet" type="text/css" href="styles/stylesMenu.css"/>
    <link rel="stylesheet" type="text/css" href="styles/stylesBody.css"/>
    <link rel="stylesheet" type="text/css" href="styles/stylesHeader.css"/>
    <link rel="stylesheet" type="text/css" href="styles/stylesFooter.css"/>
    <link rel="stylesheet" type="text/css" href="styles/popUp-styles.css"/>
    <title>Menu - TONI'S TRAMEZZINERIA</title>
</head>

<?php session_start(); ?>

<body>
    <!-- HEADER -->
    <?php include 'templates/header.html' ?>
    
    <?php include 'templates/popUp.html' ?>


    <section id="mainSection">
        <div class="rectangle" id="titleRectangle"><h1>MENU</h1></div>  
    </section>
    
    <section id="prodottiSection">
        <h2 role="heading" aria-level="2">PRODOTTI</h2>
        <ul>
            <li><button id="goToTramezzini" class="standard-button" onclick="scrollToSection('tramezzini')">Tramezzini</button></li>
            <li><button id="goToPanini" class="standard-button" onclick="scrollToSection('panini')">Panini</button></li>
            <li><button id="goToBurgers" class="standard-button" onclick="scrollToSection('burgers')">Burgers</button></li>
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
        
        <?php foreach ($tramezzini as $tramezzino) { ?>
            <div class="prodotto-item">
                <div class="menu-item-container">
                    <div class="menu-item-images">
                        <img class="left-image" src="resources/images/vinileChiusoNew.webp" alt="">
                        <img class="right-image" src="resources/images/vinileSemiAperto.webp" alt="">
                    </div>

                    <div>
                        <button class="menu-item-button" aria-label="Vai al prodotto" role="button" onclick='openPopup(
                            "<?php echo htmlspecialchars($tramezzino["name"]); ?>",
                            "<?php echo htmlspecialchars($tramezzino["description"]); ?>",
                            "<?php echo htmlspecialchars($tramezzino["ingredients"]); ?>",
                            "<?php echo $tramezzino["price"]; ?>",
                            "<?php echo displayDishImage($tramezzino["id_dish"]); ?>"
                        )'>
                            <img class="menu-item-image" src="<?php echo displayDishImage($tramezzino['id_dish']); ?>" alt="Dish Image">    
                            <span><?php echo htmlspecialchars($tramezzino['name']); ?></span>
                        </button>
                    </div>
                </div>
            </div>
        <?php } ?>
    </section>

    <section id="panini">
        <?php
            // Fetch information for the bestseller and dish of the month
            $panini = getDishesByType("Panini");
        ?>

        <h2 role="heading" aria-level="2">PANINI</h2>
        <p>Esplora la nostra deliziosa selezione di panini, autentiche creazioni italiane che trasformano il semplice pane in opere d'arte gastronomiche. 
            Dalle classiche combinazioni ai twist creativi, scopri le ricette che soddisferanno ogni palato.</p>
    
        <?php foreach ($panini as $panino) { ?>
            <div class="prodotto-item">
                <div class="menu-item-container">
                    <div class="menu-item-images">
                        <img class="left-image" src="resources/images/vinileChiusoNew.webp" alt="">
                        <img class="right-image" src="resources/images/vinileSemiAperto.webp" alt="">
                    </div>

                    <div>
                        <button class="menu-item-button" aria-label="Vai al prodotto" role="button" onclick='openPopup(
                            "<?php echo htmlspecialchars($panino["name"]); ?>",
                            "<?php echo htmlspecialchars($panino["description"]); ?>",
                            "<?php echo htmlspecialchars($panino["ingredients"]); ?>",
                            "<?php echo $panino["price"]; ?>",
                            "<?php echo displayDishImage($panino["id_dish"]); ?>"
                        )'>
                            <img class="menu-item-image" src="<?php echo displayDishImage($panino['id_dish']); ?>" alt="Dish Image">    
                            <span><?php echo htmlspecialchars($panino['name']); ?></span>
                        </button>
                    </div>
                </div>
            </div>
        <?php } ?>
    </section>

    <section id="burgers">
        <?php
            // Fetch information for the bestseller and dish of the month
            $burgers = getDishesByType("Burger");
        ?>

        <h2 role="heading" aria-level="2">BURGERS</h2>
        <p>Esplora la nostra deliziosa selezione di burgers, autentiche creazioni italiane che trasformano il semplice pane in opere d'arte gastronomiche. 
            Dalle classiche combinazioni ai twist creativi, scopri le ricette che soddisferanno ogni palato.</p>

        <?php foreach ($burgers as $burger) { ?>
            <div class="prodotto-item">
                <div class="menu-item-container">
                    <div class="menu-item-images">
                        <img class="left-image" src="resources/images/vinileChiusoNew.webp" alt="">
                        <img class="right-image" src="resources/images/vinileSemiAperto.webp" alt="">
                    </div>

                    <div>
                        <button class="menu-item-button" aria-label="Vai al prodotto" role="button" onclick='openPopup(
                            "<?php echo htmlspecialchars($burger["name"]); ?>",
                            "<?php echo htmlspecialchars($burger["description"]); ?>",
                            "<?php echo htmlspecialchars($burger["ingredients"]); ?>",
                            "<?php echo $burger["price"]; ?>",
                            "<?php echo displayDishImage($burger["id_dish"]); ?>"
                        )'>
                            <img class="menu-item-image" src="<?php echo displayDishImage($burger['id_dish']); ?>" alt="Dish Image">    
                            <span><?php echo htmlspecialchars($burger['name']); ?></span>
                        </button>
                    </div>
                </div>
            </div>
        <?php } ?>
    </section>

    <!-- FOOTER -->
    <?php include 'templates/footer.html' ?>
    <script src="scripts/popUp.js" defer></script>
    <script src="scripts/scriptMenu.js"></script>
    <script src="scripts/scriptMenuItem.js"></script>
    <script src="scripts/scriptHeader.js"></script>
</body>
</html>