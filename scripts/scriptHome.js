function toggleClickedState(button) {
    if (!button.classList.contains('clicked')) {
        const buttons = document.querySelectorAll('.category-button');
        buttons.forEach(btn => {
            if (btn !== button) {
                btn.classList.remove('clicked');
                btn.style.pointerEvents = 'auto';
            }
        });

        button.classList.toggle('clicked');
        button.style.pointerEvents = 'none';
    }
}

document.addEventListener('DOMContentLoaded', function() {
    var rightImages = document.querySelectorAll('.right-image');
    var buttons = document.querySelectorAll('.menu-item-button');

    rightImages.forEach(function(rightImage, index) {
        var button = buttons[index];
        button.addEventListener('mouseover', function() {
            rightImage.style.transition = 'right 0.5s ease-in-out'; 
            rightImage.style.right = '0';
        });

        button.addEventListener('mouseout', function() {
            rightImage.style.transition = 'right 0.5s ease-in-out';
            rightImage.style.right = '60px';
        });

        rightImage.addEventListener('transitionend', function() {
            rightImage.style.transition = '';
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('toMenuButton').addEventListener('click', function() {
        var targetUrl = "../html/menu.html";
        
        window.location.href = targetUrl;
    });
});

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('goToAboutUs').addEventListener('click', function() {
        var targetUrl = "../html/aboutus.html";
        
        window.location.href = targetUrl;
    });
});