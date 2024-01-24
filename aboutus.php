<!DOCTYPE html>
<html lang="it">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="tramezzini, panini, hamburger, fast-food, gourmet, cucina, Padova, Portello, noi, Tommy, chef, cuoco, università, amore, cibo, qualità">
    <meta description="Scopri di più su Tommy, il creatore degli incredibili piatti di TONI'S TRAMEZZINERIA!">
    <meta name="description" content="Scopri di più su Tommy, il creatore degli incredibili piatti di TONI'S TRAMEZZINERIA!">
    <link rel="stylesheet" type="text/css" href="styles/stylesAboutus.css" />
    <link rel="stylesheet" type="text/css" href="styles/stylesBody.css"/>
    <link rel="stylesheet" type="text/css" href="styles/stylesHeader.css"/>
    <link rel="stylesheet" type="text/css" href="styles/stylesFooter.css"/>
    <title>About Us - TONI'S TRAMEZZINERIA</title>
</head>

<body>
<!-- HEADER -->
<?php include 'templates/header.html' ?>

    <main>
        <!-- MAIN SECTION -->
        <section id="mainSection">
            <div class="rectangle" aria-labelledby="mainSectionTitle" id="mainSectionTitle"><h1>ABOUT TONI'S</h1></div>
        </section>
        
        <!-- DOVE TROVARCI SECTION -->
        <section id="doveTrovarciSection" aria-labelledby="doveTrovarciSectionTitle">
            <div class="left-rectangle"></div>
            <div class="top-rectangle"></div>
            <h3 class="align-right" id="doveTrovarciSectionTitle">DOV'E' TONI'S?</h3>
            <div class="side-by-side">
                <div class="location-info">
                    <p>La tramezzineria di Toni, situata nel cuore della zona universitaria di Padova, ha visto la luce cinque anni fa grazie alla passione imprenditoriale di Tommy, il suo unico e instancabile lavoratore.</p>
                    <p>Fondato con dedizione e amore per l'arte culinaria,  questo piccolo angolo gastronomico si è rapidamente affermato come un punto di riferimento per gli amanti del buon cibo al Portello.</p>
                </div>
                <div class="map-container">
                    <iframe class="map" title="Mappa dove trovarci" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11204.230924611375!2d11.892494!3d45.4081754!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x477edaf723594ce7%3A0x822810e7e09bc854!2sToni&#39;s%20Tramezzineria!5e0!3m2!1sit!2sit!4v1705222707812!5m2!1sit!2sit" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </section>

        <!-- TOMMY SECTION -->
        <section id="tommySection" aria-labelledby="tommySectionTitle">
            <div class="left-rectangle"></div>
            <div class="top-rectangle"></div>
            <h3 class="align-left" id="tommySectionTitle">CHI E' TOMMY</h3>
            <div class="side-by-side">
                <div class="tommy-image">
                    <img src="resources/images/tommy.webp" alt="Immagine di Tommy al lavoro!">
                </div>
                <div class="tommy-info">
                    <p>Tommy, con la sua abilità culinaria e il suo spirito 
                        imprenditoriale, ha trasformato la tramezzineria in un 
                        luogo accogliente e autentico, dove l'attenzione per 
                        gli ingredienti di qualità e la cura nella preparazione sono sempre al primo posto. </p>
                    <p>La dedizione di Tommy si riflette in ogni panino servito, creando un'atmosfera che va ben oltre il semplice soddisfare la fame, offrendo un'esperienza gastronomica memorabile.</p>
                </div>
            </div>
        </section>

        <!-- CAROSELLO SECTION -->
        <section id="caroselloSection">
            <div class="left-rectangle"></div>
            <div class="top-rectangle"></div>

            <div class="slideshow-container">

                <div class="slides fade">
                <img src="resources/images/carousel/carousel_1.webp" alt="Immagine per conoscere meglio Tommy e il suo lavoro">
                </div>
            
                <div class="slides fade">
                <img src="resources/images/carousel/carousel_2.webp" alt="Immagine per conoscere meglio Tommy e il suo lavoro">
                </div>
            
                <div class="slides fade">
                <img src="resources/images/carousel/carousel_3.webp" alt="Immagine per conoscere meglio Tommy e il suo lavoro">
                </div>

                <div class="slides fade">
                    <img src="resources/images/carousel/carousel_4.webp" alt="Immagine per conoscere meglio Tommy e il suo lavoro">
                    </div>
            
                <a class="prev" onclick="plusSlides(-1)" tabindex="0">&#10094;</a>
                <a class="next" onclick="plusSlides(1)" tabindex="0">&#10095;</a>
            </div>
            <br>
            
            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)" tabindex="0"></span>
                <span class="dot" onclick="currentSlide(2)" tabindex="0"></span>
                <span class="dot" onclick="currentSlide(3)" tabindex="0"></span>
                <span class="dot" onclick="currentSlide(4)" tabindex="0"></span>
            </div> 
        </section>
    </main>

<!-- FOOTER -->
<?php include 'templates/footer.html' ?>
    
    <script src="scripts/scriptAboutus.js"></script>
    <script src="scripts/scriptHeader.js"></script>
</body>

</html>