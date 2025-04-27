document.addEventListener('DOMContentLoaded', function () {
    const accordionHeaders = document.querySelectorAll('.accordion-header');

    accordionHeaders.forEach(header => {
        header.addEventListener('click', function () {
            // Close all other accordion items
            accordionHeaders.forEach(item => {
                if (item !== header) {
                    const content = item.nextElementSibling;
                    const toggle = item.querySelector('.accordion-toggle');
                    content.classList.remove('active');
                    toggle.classList.remove('active');
                }
            });

            // Toggle the clicked accordion item
            const content = header.nextElementSibling;
            const toggle = header.querySelector('.accordion-toggle');
            content.classList.toggle('active');
            toggle.classList.toggle('active');
        });
    });
});

// Function to change the main image when a thumbnail is clicked
function changeImage(imageSrc) {
    const mainImage = document.getElementById('mainImage');
    mainImage.src = imageSrc;

    // Remove 'active' class from all thumbnails
    const thumbnails = document.querySelectorAll('.thumbnail');
    thumbnails.forEach(thumb => thumb.classList.remove('active'));

    // Add 'active' class to the clicked thumbnail
    const clickedThumbnail = Array.from(thumbnails).find(thumb => thumb.src.includes(imageSrc));
    if (clickedThumbnail) {
        clickedThumbnail.classList.add('active');
    }
}