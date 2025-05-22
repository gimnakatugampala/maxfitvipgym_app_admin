
$(document).ready(function() {
    $('#logout-btn').on('click', function(e) {
        e.preventDefault();

        $.ajax({
            url: '../api/logout.php',
            type: 'POST',
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    window.location.href = '../auth/login.php'; // Redirect to login page
                } else {
                    alert('Logout failed: ' + response.message);
                }
            },
            error: function() {
                alert('An error occurred while logging out.');
            }
        });
    });
});

