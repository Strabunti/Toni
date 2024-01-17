const cards = document.querySelectorAll(".card");

cards.forEach(card => {
    card.addEventListener("keydown", function(e) {
        if (e.key === "Enter") {
            openPopUp(e);
        }
    });
});

function openPopUp(e) {
    if (e.target.id.split("-")[0] === "dish") {
        showDishPopup(e.target.id.split("-")[1]);
    }else{
        showPopup(e.target.id);
    }
}

document.addEventListener("keydown", function(e) {
    if (e.key === "Escape") {
        // Check if the popup is currently open before closing
        if (document.getElementById('popup-container').style.display === 'inline-block') {
            closePopup();
        }
    }
});
