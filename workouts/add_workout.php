<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maxfit VIP Gym | Add Workout</title>
    <?php include_once '../includes/header.php'; ?>
</head>

<body>
<div id="wrapper">
    <?php include '../includes/sidebar.php'; ?>

    <div id="page-wrapper" class="gray-bg">
        <?php include '../includes/navbar.php'; ?>

        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Add Workout</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Workouts</li>
                    <li class="breadcrumb-item active"><strong>Add Workout</strong></li>
                </ol>
            </div>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight ecommerce">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tabs-container">
                        <ul class="nav nav-tabs">
                            <li><a class="nav-link active" data-toggle="tab" href="#tab-1">Workout Info</a></li>
                            <li><a class="nav-link" data-toggle="tab" href="#tab-2">YouTube Videos</a></li>
                        </ul>

                        <form id="addWorkoutForm" enctype="multipart/form-data">
                            <div class="tab-content">
                                <!-- Workout Info -->
                                <div id="tab-1" class="tab-pane active">
                                    <div class="panel-body">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Image <span class="text-danger">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="file" name="image" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Name <span class="text-danger">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" name="name" class="form-control" placeholder="Workout name" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Workout Type <span class="text-danger">*</span></label>
                                            <div class="col-sm-10">
                                                <div class="i-checks">
                                                    <label><input type="radio" name="workout_type" value="1" required> By Set</label>
                                                    <label><input type="radio" name="workout_type" value="2"> By Duration</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- YouTube Videos -->
                                <div id="tab-2" class="tab-pane">
                                    <div class="panel-body">
                                        <div id="videoContainer"></div>

                                        <div class="form-group">
                                            <button type="button" class="btn btn-secondary" id="addVideoBtn">Add Video</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Form Submit -->
                            <div class="form-group row m-3">
                                <div class="col-sm-12 text-right">
                                    <button type="submit" class="ladda-button btn btn-primary" data-style="expand-right">Submit Workout</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php include '../includes/footer_copyrights.php'; ?>
    </div>
</div>

<?php include '../includes/footer.php'; ?>

<script>
    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });

        // // Add initial video input
        // addVideoInput();

        // $('#addVideoBtn').on('click', function () {
        //     addVideoInput();
        // });

        // // Submit form (for demonstration)
        // $('#addWorkoutForm').on('submit', function (e) {
        //     e.preventDefault();
        //     alert('Workout submitted successfully!');
        // });

        // // Add new video input
        // function addVideoInput() {
        //     const videoIndex = $('.video-entry').length;
        //     const videoHTML = `
        //         <div class="video-entry mb-3 p-3 border rounded">
        //             <div class="form-group row">
        //                 <label class="col-sm-2 col-form-label">YouTube URL</label>
        //                 <div class="col-sm-8">
        //                     <input type="text" name="video_urls[]" class="form-control yt-url" placeholder="https://www.youtube.com/watch?v=..." oninput="updatePreview(this)">
        //                 </div>
        //                 <div class="col-sm-2">
        //                     <button type="button" class="btn btn-danger remove-video">Remove</button>
        //                 </div>
        //             </div>
        //             <div class="row">
        //                 <div class="offset-sm-2 col-sm-10">
        //                     <iframe width="300" height="170" class="yt-preview d-none" frameborder="0" allowfullscreen></iframe>
        //                 </div>
        //             </div>
        //         </div>`;
        //     $('#videoContainer').append(videoHTML);
        // }

        // // Remove video entry
        // $('#videoContainer').on('click', '.remove-video', function () {
        //     $(this).closest('.video-entry').remove();
        // });
    });

    // function updatePreview(input) {
    //     const url = $(input).val();
    //     const videoId = getYouTubeID(url);
    //     const preview = $(input).closest('.video-entry').find('.yt-preview');
    //     if (videoId) {
    //         preview.attr('src', 'https://www.youtube.com/embed/' + videoId).removeClass('d-none');
    //     } else {
    //         preview.addClass('d-none');
    //     }
    // }

    // function getYouTubeID(url) {
    //     const match = url.match(/[?&]v=([^&#]+)/) || url.match(/youtu\.be\/([^&#]+)/);
    //     return match ? match[1] : null;
    // }
</script>

<script src="../scripts/add_workout.js"></script>
</body>
</html>
