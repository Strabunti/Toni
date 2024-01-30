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