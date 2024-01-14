// comment-popup.js

// 

function showPopup(idContent) {
    var popupContainer = document.getElementById('popup-container');
    var popupContent = document.getElementById(idContent);

    var username = popupContent.querySelector('.comment-user').innerText;
    var rating = popupContent.querySelector('.comment-rating').innerText;
    var comment = popupContent.querySelector('.comment-text').innerText;
    var date = popupContent.querySelector('.comment-date').innerText;
    var title = popupContent.querySelector('.comment-title').innerText;
    var image = popupContent.querySelector('.profile-pic').src;

    // Set content dynamically
    popupContainer.innerHTML = `
        
        <div class="comment-header">
            <div class="popup-comment-header-left">
                <img src="${image}" alt="Profile picture" class="popup-comment-profile-pic">
                <p id="popup-comment-user" class="comment-user popup-comment-user">${username}</p>
            </div>
            <button class="close-button" onclick="closePopup()"><img src="resources/images/close-button.png" alt="Close pop up button" class="button-image"></button>
        </div>
        <p id="popup-title" class="comment-title popup-comment-title"><strong>Title:</strong> ${title}</p>
        <p id="popup-date" class="comment-date popup-comment-date"><strong>Date:</strong> ${date}</p>
        <p id="popup-rating" class="comment-rating popup-comment-rating"><strong>Rating:</strong> ${rating}</p>
        <p id="popup-text" class="comment-text popup-comment-text"><strong>Comment:</strong> ${comment}</p>
    `;

    // Show the popup
    popupContainer.style.display = 'inline-block';
}

function closePopup() {
    var popupContainer = document.getElementById('popup-container');

    // Close the popup
    popupContainer.style.display = 'none';
}