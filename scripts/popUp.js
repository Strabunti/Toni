function openPopup(name, description, ingredients, price, imageSrc) {

    document.getElementById('popup-name').innerText = name.replace(/'/g, "\\'");
    document.getElementById('popup-description').innerText = description.replace(/'/g, "\\'");
    document.getElementById('popup-ingredients').innerText = ingredients.replace(/'/g, "\\'");
    document.getElementById('popup-price').innerText = 'Prezzo: ' + price;
    document.getElementById('popup-image2').src = imageSrc;
    document.getElementById('popup').style.display = 'inline-block';
}

function closePopup() {
    document.getElementById('popup').style.display = 'none';
}

document.addEventListener("keydown", function (event) {
    if (event.keyCode === 27) {
        closePopup();
    }
});
