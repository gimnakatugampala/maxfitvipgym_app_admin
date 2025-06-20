<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Maxfit VIP Gym | Edit Workout</title>

    <?php include_once '../includes/header.php';  ?>



</head>

<body>

<div id="wrapper">

    <?php include '../includes/sidebar.php'; ?>

    
    <div id="page-wrapper" class="gray-bg">
    
    <?php include '../includes/navbar.php'; ?>

        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Edit Workout</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a>Workouts</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <strong>Edit Workout</strong>
                    </li>
                </ol>
            </div>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight ecommerce">

            <div class="row">
                <div class="col-lg-12">
                    <div class="tabs-container">
                            <ul class="nav nav-tabs">
                                <li><a class="nav-link active" data-toggle="tab" href="#tab-1"> Workout info</a></li>
                                <li><a class="nav-link" data-toggle="tab" href="#tab-2"> Videos</a></li>
                            </ul>


                            <form id="editWorkoutForm" enctype="multipart/form-data">
                                 <input type="hidden" id="workoutId" value="<?= $_GET['id'] ?? 0 ?>">
                            <div class="tab-content">

                                <div id="tab-1" class="tab-pane active">
                                    <div class="panel-body">
                                        
                                            
                                           
                                        <div class="tab-content">
                                            <!-- Workout Info -->
                                            <div id="tab-1" class="tab-pane active">
                                                <div class="panel-body">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Image <span class="text-danger">*</span></label>
                                                        <div class="col-sm-10">
                                                            <input type="file" name="image" class="form-control">
                                                            <br>
                                                            <img id="previewImage" src="" width="100" class="mb-2">
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
                                                                <label><input type="radio" name="workout_type" value="1"> By Set</label>
                                                                <label><input type="radio" name="workout_type" value="2"> By Duration</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                           
                                        </div>

                                    
                                            
                            
                                </div>
                            </div> <!--  tab 1 -->

                                <div id="tab-2" class="tab-pane">
                                    <div class="panel-body">
                                        <div id="videoContainer"></div>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-secondary" id="addVideoBtn">Add Video</button>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!-- Submit -->
                                    <div class="form-group row m-3">
                                        <div class="col-sm-12 text-right">
                                            <button type="submit" class="ladda-button btn btn-primary" data-style="expand-right">Update Workout</button>
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



<?php include '../includes/footer.php';?>

        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>

<script>
    $(document).ready(function(){

        $('.summernote').summernote();

        $('.input-group.date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });

    });
</script>


<!-- <script>

    $(document).ready(function (){

        // Bind normal buttons
        Ladda.bind( '.ladda-button',{ timeout: 2000 });

        // Bind progress buttons and simulate loading progress
        Ladda.bind( '.progress-demo .ladda-button',{
            callback: function( instance ){
                var progress = 0;
                var interval = setInterval( function(){
                    progress = Math.min( progress + Math.random() * 0.1, 1 );
                    instance.setProgress( progress );

                    if( progress === 1 ){
                        instance.stop();
                        clearInterval( interval );
                    }
                }, 200 );
            }
        });


        var l = $( '.ladda-button-demo' ).ladda();

        l.click(function(){
            // Start loading
            l.ladda( 'start' );

            // Timeout example
            // Do something in backend and then stop ladda
            setTimeout(function(){
                l.ladda('stop');
            },12000)


        });

    });

</script> -->

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {

            $('.footable').footable();
            $('.footable2').footable();

        });

    </script>

    <script src="../scripts/edit_workout.js"></script>

</body>

</html>

