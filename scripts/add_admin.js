
    $(document).ready(function () {
        var laddaSubmit = Ladda.create(document.querySelector('#submitBtn'));

        $('#addAdminForm').on('submit', function (e) {
            e.preventDefault();

            // Start loading spinner
            laddaSubmit.start();

            $.ajax({
                url: '../api/add_admin_ajax.php', // Adjust path if needed
                method: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function (response) {
                    let msgDiv = $('#responseMessage');
                    if (response.status === 'success') {
                        msgDiv.html('<div class="alert alert-success">' + response.message + '</div>');
                        $('#addAdminForm')[0].reset();
                    } else {
                        msgDiv.html('<div class="alert alert-danger">' + response.message + '</div>');
                    }

                    // Hide message after 5 seconds
                    setTimeout(function () {
                        msgDiv.fadeOut('slow', function () {
                            $(this).html('').show(); // Clear content and reset visibility
                        });
                    }, 5000);
                },
                error: function () {
                    $('#responseMessage').html('<div class="alert alert-danger">AJAX request failed.</div>');

                    // Hide message after 5 seconds
                    setTimeout(function () {
                        $('#responseMessage').fadeOut('slow', function () {
                            $(this).html('').show();
                        });
                    }, 5000);
                },
                complete: function () {
                    // Stop loading spinner
                    laddaSubmit.stop();
                }
            });
        });
    });

