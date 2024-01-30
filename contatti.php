<!DOCTYPE html>

<html lang="it" xmlns="http://www.w3.org/1999/xhtml" xml:lang="it">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="contattaci, mail, numero, telefono, indirizzo, dove, Padova, Portello, fast-food, cucina, gourmet">
    <<meta name="description" content="Hai qualche domanda da fare a Tommy riguardo le sue creazioni? Contattaci per scoprire di più sul mondo di TONI'S TRAMEZZINERIA!">
    <meta name="description" content="Contattaci per scoprire di più sul mondo di TONI'S TRAMEZZINERIA!">
    <link rel="stylesheet" type="text/css" href="styles/stylesContatti.css"/>
    <link rel="stylesheet" type="text/css" href="styles/stylesBody.css"/>
    <link rel="stylesheet" type="text/css" href="styles/stylesHeader.css"/>
    <link rel="stylesheet" type="text/css" href="styles/stylesFooter.css"/>
    <title>Contattaci - TONI'S TRAMEZZINERIA</title>
</head>
<body>

<!-- HEADER -->
<?php include_once "templates/header.html"; ?>

<main>
    <!-- MAIN SECTION -->
    <section id="mainSection">
        <div class="rectangle" id="titleRectangle" aria-labelledby="mainSectionHeading"><h1 id="mainSectionHeading">CONTATTACI</h1></div>
    </section>

    <section id="formSection">
        <div class="left-rectangle"></div>
        <div class="top-rectangle"></div>

        <div class="info">
            <h3>TONI'S Tramezzineria</h3>
            <address>Via del Portello, 24, 35129, Padova (PD)</address>
            <p> Lunerdì - Venerdì <br> 10.30 - 14.30</p>
        </div>

        <div class="map-container">
            <iframe class="map" title="Mappa dove trovarci" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11204.230924611375!2d11.892494!3d45.4081754!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x477edaf723594ce7%3A0x822810e7e09bc854!2sToni&#39;s%20Tramezzineria!5e0!3m2!1sit!2sit!4v1705222707812!5m2!1sit!2sit" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <hr>

        <form action="mailto:info@tonistramezzineria.com" method="post" id="contact-form">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" required aria-required="true" />

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required aria-required="true" />

            <label for="message">Messaggio:</label>
            <textarea id="message" name="message" rows="5" required aria-required="true"></textarea>

            <button type="submit">INVIA</button>
        </form>

    </section>
</main>

<!-- FOOTER -->
<?php include_once "templates/footer.html"; ?>

<script src="scripts/scriptHeader.js"></script>

</body>
</html>
