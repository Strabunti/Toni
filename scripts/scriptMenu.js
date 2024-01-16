

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
   
document.addEventListener("DOMContentLoaded", function() {
    window.onscroll = function() {
        scrollFunction();
    };
});

function scrollFunction() {
    var scrollToTopBtn = document.getElementById("scrollToTopBtn");

    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        scrollToTopBtn.style.display = "block";
    } else {
        scrollToTopBtn.style.display = "none";
    }
}

function scrollToTop() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}