document.addEventListener('DOMContentLoaded', function() {
    window.addEventListener('scroll', function() {
        var stickyElement = document.querySelector('.sticky');
        var stickyLinks = document.querySelectorAll('.sticky ul li a');
        var scrollPosition = window.scrollY;


        if (scrollPosition >= 300) {
            stickyElement.style.transform = 'translateY(0px)';
        } else {
            stickyElement.style.transform = 'translateY(-65px)';
        }

        stickyLinks.forEach(function(link) {
            if (scrollPosition >= 300) {
                link.style.color = 'black';
            } else {
                link.style.color = '';
            }
        });
    });
});
