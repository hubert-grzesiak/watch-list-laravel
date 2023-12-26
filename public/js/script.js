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

function addSubscriber() {
    var subscriber_email = $("#subscriber_email").val();
    var regex = /^([a-zA-Z0-9\.-]+)@([a-zA-Z0-9-]+).([a-z]{2,20})$/;
alert(subscriber_email);
    if (regex.test(subscriber_email) == false) {
        alert("Please Enter Valid Email");
        return false;
    }

    $.ajax({
        type: 'post',
        url: '/add-subscriber-email',
        data: {
            subscriber_email: subscriber_email,
            _token: $('meta[name="csrf-token"]').attr('content')

        },
        success: function (resp) {
            alert(resp);
        },
        error: function () {
            alert("Error");
        }
    });
}

