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