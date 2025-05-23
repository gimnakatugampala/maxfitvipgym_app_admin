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
        if (res.workout) {
            $('input[name="name"]').val(res.workout.name);
            $('input[name="workout_type"][value="' + res.workout.workout_type + '"]').prop('checked', true).iCheck('update');
            $('#previewImage').attr('src', '../uploads/' + res.workout.image);

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
        addVideoInput('');
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
                const json = JSON.parse(res);
                if (json.success) {
                    alert('Workout updated successfully!');
                    window.location.href = 'workouts.php';
                } else {
                    alert('Update failed.');
                }
            }
        });
    });

    // Helper: Add video input
    function addVideoInput(url) {
        const html = `
            <div class="form-group video-entry d-flex mb-2">
                <input type="text" name="video_urls[]" class="form-control mr-2" placeholder="YouTube URL" value="${url}">
                <button type="button" class="btn btn-danger btn-sm remove-video">Remove</button>
            </div>`;
        $('#videoContainer').append(html);
    }
});
