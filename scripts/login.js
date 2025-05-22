$(document).ready(function () {
    $('.toggle-password').on('click', function () {
        const passwordField = $('#password');
        const icon = $(this).find('i');
        const type = passwordField.attr('type') === 'password' ? 'text' : 'password';
        
        passwordField.attr('type', type);
        icon.toggleClass('fa-eye fa-eye-slash');
    });
});



$(document).ready(function () {
    $('#login-form').on('submit', function (e) {
        e.preventDefault();

        const email = $('input[name="email"]').val().trim();
        const password = $('input[name="password"]').val().trim();
        const messageBox = $('#login-message');

        if (!email || !password) {
            messageBox
                .removeClass('d-none alert-success')
                .addClass('alert alert-danger')
                .text('Please enter both email and password.');
            return;
        }

        $.ajax({
            url: '../api/login.php',
            method: 'POST',
            dataType: 'json',
            data: { email, password },
            success: function (response) {
                if (response.success) {
                    messageBox
                        .removeClass('d-none alert-danger')
                        .addClass('alert alert-success')
                        .text(response.message);

                    setTimeout(() => {
                        window.location.href = '../dashboard/';
                    }, 1000);
                } else {
                    messageBox
                        .removeClass('d-none alert-success')
                        .addClass('alert alert-danger')
                        .text(response.message);
                }
            },
            error: function () {
                messageBox
                    .removeClass('d-none alert-success')
                    .addClass('alert alert-danger')
                    .text('An unexpected error occurred. Please try again later.');
            }
        });
    });
});
