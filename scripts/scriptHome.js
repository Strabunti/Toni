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

function showImage(imageNumber) {
    // Hide all images
    hideAllImages();

    // Show the selected image
    document.getElementById(`image${imageNumber}`).style.display = "block";
  }

  function hideAllImages() {
    // Hide all images
    const imageContainers = document.querySelectorAll('.image-button');
    imageContainers.forEach(container => {
      container.style.display = 'none';
    });
}

function handleResize() {
    const windowWidth = window.innerWidth;

    const thresholdWidth = 1100;

    if (windowWidth > thresholdWidth) {
        var buttons = document.querySelectorAll('.category-button');
        toggleClickedState(buttons[0]);
        showImage(1);
        }
    }

  // Attach the event listener to the window resize event
  window.addEventListener('resize', handleResize);

  // Call handleResize initially to set the initial state based on the window width
  handleResize();