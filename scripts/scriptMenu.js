

function openPopup(title, description, ingredients) {
    var popup = document.getElementById('popup');
    var popupTitle = document.getElementById('popup-title');
    var popupDescription = document.getElementById('popup-description');
    var popupIngredients = document.getElementById('popup-ingredients');

    popupTitle.textContent = title;
    popupDescription.textContent = description;
    popupIngredients.textContent = ingredients;

    popup.style.display = 'block';
}

function closePopup() {
    var popup = document.getElementById('popup');
    popup.style.display = 'none';
}