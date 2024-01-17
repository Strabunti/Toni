// comment-popup.js

// 

function showPopup(idContent) {
    var popupContainer = document.getElementById('popup-container');
    if(popupContainer === null){
        return;
    }
    var popupContent = document.getElementById(idContent);
    if(popupContent === null){
        return;
    }

    var username = popupContent.querySelector('#comment-user').innerText;
    var rating = popupContent.querySelector('#comment-rating').innerText;
    var comment = popupContent.querySelector('#comment-text').innerText;
    var date = popupContent.querySelector('#comment-date').innerText;
    var title = popupContent.querySelector('#comment-title').innerText;
    var image = popupContent.querySelector('#profile-pic').src;

    // Set content dynamically
    popupContainer.innerHTML = `
        
        <div class="card-header">
            <div class="popup-header-left">
                <img src="${image}" alt="Profile picture" class="popup-pic">
                <p id="popup-user" class="card-name popup-name">${username}</p>
            </div>
            <button class="close-button" onclick="closePopup()"><img src="resources/images/close-button.png" alt="Close pop up button" class="button-image"></button>
        </div>
        <p id="popup-title" class="card-title popup-title"><strong>Title:</strong> ${title}</p>
        <p id="popup-date" class="card-date popup-date"><strong>Date:</strong> ${date}</p>
        <p id="popup-rating" class="card-rating popup-rating"><strong>Rating:</strong> ${rating}</p>
        <p id="popup-text" class="card-text popup-text"><strong>Comment:</strong> ${comment}</p>
    `;

    // Show the popup
    popupContainer.style.display = 'inline-block';
}

function showDishPopup(idContent) {
    var popupContainer = document.getElementById('popup-container');
    if(popupContainer === null){
        return;
    }
    var string = 'dish-' + idContent;
    var popupContent = document.getElementById(string);
    if(popupContent === null){
        return;
    }

    var name = popupContent.querySelector('#dish-name').innerText;
    var price = popupContent.querySelector('#dish-price').innerText;
    var description = popupContent.querySelector('#dish-title').innerText;
    var ingredients = popupContent.querySelector('#dish-text').innerText;
    var image = popupContent.querySelector('#dish-pic').src;

    // Set content dynamically
    popupContainer.innerHTML = `
        
        <div class="card-header">
            <div class="popup-header-left">
                <img src="${image}" alt="Dish picture" class="popup-pic">
                <p id="popup-user" class="card-name popup-name">${name}</p>
            </div>
            <button class="close-button" onclick="closePopup()"><img src="resources/images/close-button.png" alt="Close pop up button" class="button-image"></button>
        </div>
        <p id="popup-dish-price" class="card-title popup-title"><strong>Price:</strong> ${price}</p>
        <p id="popup-dish-description" class="card-date popup-date"><strong>Description:</strong> ${description}</p>
        <p id="popup-dish-ingridients" class="card-rating popup-rating"><strong>Ingredients:</strong> ${ingredients}</p>
    `;

    // Show the popup
    popupContainer.style.display = 'inline-block';
}

function closePopup() {
    var popupContainer = document.getElementById('popup-container');

    // Close the popup
    popupContainer.style.display = 'none';
}