$(document).ready(function () {
    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
    });

    addVideoInput();

    $('#addVideoBtn').on('click', function () {
        addVideoInput();
    });

    $('#videoContainer').on('click', '.remove-video', function () {
        $(this).closest('.video-entry').remove();
    });

    $('#addWorkoutForm').on('submit', function (e) {
        e.preventDefault();
        let formData = new FormData(this);

        $.ajax({
            url: '../api/add_workout.php', // ✅ ensure this path is correct
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                // `response` is already an object, no need to parse again
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                    });
                    $('#addWorkoutForm')[0].reset();
                    $('#videoContainer').html('');
                    addVideoInput();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message || 'Failed to save workout.',
                    });
                }
            },
            error: function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Failed to submit workout.',
                });
            }
        });
    });

    function addVideoInput() {
        const videoHTML = `
            <div class="video-entry mb-3 p-3 border rounded">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">YouTube URL</label>
                    <div class="col-sm-8">
                        <input type="text" name="video_urls[]" class="form-control yt-url" placeholder="https://www.youtube.com/watch?v=..." oninput="updatePreview(this)">
                    </div>
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-danger remove-video">Remove</button>
                    </div>
                </div>
                <div class="row">
                    <div class="offset-sm-2 col-sm-10">
                        <iframe width="300" height="170" class="yt-preview d-none" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>`;
        $('#videoContainer').append(videoHTML);
    }
});

function updatePreview(input) {
    const url = $(input).val();
    const videoId = getYouTubeID(url);
    const preview = $(input).closest('.video-entry').find('.yt-preview');
    if (videoId) {
        preview.attr('src', 'https://www.youtube.com/embed/' + videoId).removeClass('d-none');
    } else {
        preview.addClass('d-none');
    }
}

function getYouTubeID(url) {
    const match = url.match(/[?&]v=([^&#]+)/) || url.match(/youtu\.be\/([^&#]+)/);
    return match ? match[1] : null;
}
