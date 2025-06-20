// Utility to get query parameters
function getQueryParam(param) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
}

$(document).ready(function () {
    const workoutId = getQueryParam('id');
    if (!workoutId) {
        alert("Invalid workout ID.");
        return;
    }
    $('#workoutId').val(workoutId); // Set hidden input value

    // Load workout info
    $.getJSON('../api/get_edit_work.php', { id: workoutId }, function (res) {
        //    console.log("API Response:", res);
        if (res.workout) {
            $('input[name="name"]').val(res.workout.name);
            $('input[name="workout_type"][value="' + res.workout.workout_type + '"]').prop('checked', true).iCheck('update');
   $('#previewImage').attr('src', '../' + res.workout.image);




            $('#videoContainer').empty();
            if (res.videos.length > 0) {
                res.videos.forEach(video => addVideoInput(video.url));
            } else {
                addVideoInput('');
            }
        } else {
            alert("Workout not found!");
        }
    });

    // Add new video input
       $('#addVideoBtn').on('click', function () {
        addVideoInput();
    });

    $('#videoContainer').on('click', '.remove-video', function () {
        $(this).closest('.video-entry').remove();
    });


    // Remove video input
    $(document).on('click', '.remove-video', function () {
        $(this).closest('.video-entry').remove();
    });

    // Submit form
    $('#editWorkoutForm').submit(function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        formData.append('id', workoutId);

        $.ajax({
            type: 'POST',
            url: '../api/update_workout.php',
            data: formData,
            processData: false,
            contentType: false,
            success: function (res) {
                // const json = JSON.parse(res);
                console.log(res)
              if (res.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Updated!',
                        text: 'Workout updated successfully!',
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = '../workouts/';
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Update failed. Please try again.'
                    });
                }

            }
        });
    });

    // Helper: Add video input
 function addVideoInput(url = '') {
    const videoID = getYouTubeID(url);
    const iframeHTML = videoID ? `<iframe width="300" height="170" class="yt-preview" src="https://www.youtube.com/embed/${videoID}" frameborder="0" allowfullscreen></iframe>` : `<iframe width="300" height="170" class="yt-preview d-none" frameborder="0" allowfullscreen></iframe>`;

    const videoHTML = `
        <div class="video-entry mb-3 p-3 border rounded">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">YouTube URL</label>
                <div class="col-sm-8">
                    <input type="text" name="video_urls[]" class="form-control yt-url" placeholder="https://www.youtube.com/watch?v=..." value="${url}" oninput="updatePreview(this)">
                </div>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-danger remove-video">Remove</button>
                </div>
            </div>
            <div class="row">
                <div class="offset-sm-2 col-sm-10">
                    ${iframeHTML}
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
