<!DOCTYPE html>
<html lang="it">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="menu, tramezzini, panini, hamburger, fast-food, gourmet, economico, economici, prezzo, cucina, Padova, Portello">
    <meta description="Scopri il menù di TONI'S TRAMEZZINERIA! panini, hamburger e tramezzini gourmet economici a Padova! ">
    <meta name="description" content="Scopri il menù di TONI'S TRAMEZZINERIA!">
    <link rel="stylesheet" type="text/css" href="styles/stylesMenu.css"/>
    <link rel="stylesheet" type="text/css" href="styles/stylesBody.css"/>
    <link rel="stylesheet" type="text/css" href="styles/stylesHeader.css"/>
    <link rel="stylesheet" type="text/css" href="styles/stylesFooter.css"/>
    <title>Menu - TONI'S TRAMEZZINERIA</title>
</head>

<?php session_start(); ?>

<body>
    <!-- HEADER -->
    <?php include 'templates/header.html' ?>

    <div id="popup" class="popup">
        <div class="popup-content">
            <span class="popup-close" onclick="closePopup()">&times;</span>
            <img id="popup-image" src="" alt="Popup Image">
            <h2 id="popup-name"></h2>
            <p id="popup-description"></p>
            <p id="popup-ingredients"></p>
            <p id="popup-price"></p>
        </div>
    </div>

    <section id="mainSection">
        <div class="rectangle" id="titleRectangle"><h1>MENU</h1></div>  
    </section>
    
    <section id="prodottiSection">
        <h2 role="heading" aria-level="2">PRODOTTI</h2>
        <ul>
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
            
            <?php foreach ($tramezzini as $tramezzino) {
            ?>
                <div class="prodotto-item">
                    <div class="menu-item-container">
                        <div class="menu-item-images">
                            <img class="left-image" src="resources/images/vinileChiusoNew.webp" alt="Immagine di Background 1">
                            <img class="right-image" src="resources/images/vinileSemiAperto.webp" alt="Immagine di Background 2">
                        </div>
    
                        <div>
                            <button class="menu-item-button" aria-label="Apri il pop-up" role="button">
                                <!-- Use $bestSellerDish properties for image source -->
                                <img class="menu-item-image" src="<?php echo displayDishImage($tramezzino['id_dish']); ?>" alt="Dish Image">    
                                <p><?php echo $tramezzino['name']; ?></p>
                            </button>
                        </div>
        <h2 role="heading" aria-level="2">TRAMEZZINI</h2>
        <p>Esplora la nostra deliziosa selezione di tramezzini, autentiche creazioni italiane che trasformano il semplice pane in opere d'arte gastronomiche. 
            Dalle classiche combinazioni ai twist creativi, scopri le ricette che soddisferanno ogni palato.</p>
        
        <?php foreach ($tramezzini as $tramezzino) { ?>
            <div class="prodotto-item">
                <div class="menu-item-container">
                    <div class="menu-item-images">
                        <img class="left-image" src="resources/images/vinileChiusoNew.webp" alt="Immagine di Background 1">
                        <img class="right-image" src="resources/images/vinileSemiAperto.webp" alt="Immagine di Background 2">
                    </div>

                    <div>
                        <button class="menu-item-button" aria-label="Vai al Menu" role="button" onclick="openPopup(
                            '<?php echo $tramezzino['name']; ?>',
                            '<?php echo $tramezzino['description']; ?>',
                            '<?php echo $tramezzino['ingredients']; ?>',
                            '<?php echo $tramezzino['price']; ?>',
                            '<?php echo displayDishImage($tramezzino['id_dish']); ?>'
                        )">
                            <img class="menu-item-image" src="<?php echo displayDishImage($tramezzino['id_dish']); ?>" alt="Dish Image">    
                            <p><?php echo $tramezzino['name']; ?></p>
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
                        <img class="left-image" src="resources/images/vinileChiusoNew.webp" alt="Immagine di Background 1">
                        <img class="right-image" src="resources/images/vinileSemiAperto.webp" alt="Immagine di Background 2">
                    </div>

                    <div>
                        <button class="menu-item-button" aria-label="Vai al Menu" role="button" onclick="openPopup(
                            '<?php echo $panino['name']; ?>',
                            '<?php echo $panino['description']; ?>',
                            '<?php echo $panino['ingredients']; ?>',
                            '<?php echo $panino['price']; ?>',
                            '<?php echo displayDishImage($panino['id_dish']); ?>'
                        )">
                            <img class="menu-item-image" src="<?php echo displayDishImage($panino['id_dish']); ?>" alt="Dish Image">    
                            <p><?php echo $panino['name']; ?></p>
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
                        <img class="left-image" src="resources/images/vinileChiusoNew.webp" alt="Immagine di Background 1">
                        <img class="right-image" src="resources/images/vinileSemiAperto.webp" alt="Immagine di Background 2">
                    </div>
                </div>
            <?php } ?>
        
        </section>
        
<!-- FOOTER -->
<?php include 'templates/footer.html' ?>

<script src="scripts/scriptMenu.js"></script>
<script src="scripts/scriptHome.js"></script>
<script src="scripts/scriptHeader.js"></script>

     </body>
                    <div>
                        <button class="menu-item-button" aria-label="Vai al Menu" role="button" onclick="openPopup(
                            '<?php echo $burger['name']; ?>',
                            '<?php echo $burger['description']; ?>',
                            '<?php echo $burger['ingredients']; ?>',
                            '<?php echo $burger['price']; ?>',
                            '<?php echo displayDishImage($burger['id_dish']); ?>'
                        )">
                            <img class="menu-item-image" src="<?php echo displayDishImage($burger['id_dish']); ?>" alt="Dish Image">    
                            <p><?php echo $burger['name']; ?></p>
                        </button>
                    </div>
                </div>
            </div>
        <?php } ?>
    </section>

    <!-- FOOTER -->
    <?php include 'templates/footer.html' ?>

    <script src="scripts/scriptMenu.js"></script>
    <script src="scripts/scriptHome.js"></script>
    <script src="scripts/scriptHeader.js"></script>

    <script>
        function openPopup(name, description, ingredients, price, imageSrc) {
            console.log("Opening popup for", name);
            document.getElementById('popup-name').innerText = name;
            document.getElementById('popup-description').innerText = description;
            document.getElementById('popup-ingredients').innerText = ingredients;
            document.getElementById('popup-price').innerText = 'Prezzo: ' + price;
            document.getElementById('popup-image').src = imageSrc;
            document.getElementById('popup').style.display = 'block';
        }

        function closePopup() {
            document.getElementById('popup').style.display = 'none';
        }
    </script>
</body>
</html>