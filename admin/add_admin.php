<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Maxfit VIP Gym | Add Admin</title>

    <?php include_once '../includes/header.php';  ?>



</head>

<body>

<div id="wrapper">

<?php include '../includes/sidebar.php'; ?>

    <div id="page-wrapper" class="gray-bg">
    
    <?php include '../includes/navbar.php'; ?>

        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Add Admin</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a>Admin</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <strong>Add Admin</strong>
                    </li>
                </ol>
            </div>
        </div>

        <!-- <div class="wrapper wrapper-content animated fadeInRight ecommerce"> -->

            <div class="row wrapper wrapper-content animated fadeInRight">
          
                <div class="col-lg-12">
                    <div class="ibox ">
                    <div class="wrapper wrapper-content animated fadeInRight ecommerce">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
        
                        <form id="addAdminForm">
                        <fieldset class="p-4">
                            <legend><h2>Add Admin</h2></legend>

                                <!-- Add this to display messages -->
                                    <div id="responseMessage" class="mb-2"></div>

                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <label class="col-form-label">Full Name <span class="text-danger">*</span>:</label>
                                    <input type="text" class="form-control" name="full_name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <label class="col-form-label">Email <span class="text-danger">*</span>:</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                            </div>
                           <div class="form-group row">
    <div class="col-sm-10">
        <label class="col-form-label">Password <span class="text-danger">*</span>:</label>
        <div class="input-group">
            <input type="password" class="form-control" name="password" id="password" required>
            <div class="input-group-append">
                <button class="btn btn-outline-secondary toggle-password" type="button" data-target="#password">
                    Show
                </button>
            </div>
        </div>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-10">
        <label class="col-form-label">Confirm Password <span class="text-danger">*</span>:</label>
        <div class="input-group">
            <input type="password" class="form-control" name="confirm_password" id="confirm_password" required>
            <div class="input-group-append">
                <button class="btn btn-outline-secondary toggle-password" type="button" data-target="#confirm_password">
                    Show
                </button>
            </div>
        </div>
    </div>
</div>


                           <button type="submit" id="submitBtn" class="ladda-button btn btn-primary" data-style="expand-right">Submit</button>

                        </fieldset>
                    </form>
                    </div>
                </div>
                </div>


                    </div>
                </div>
            
                
            </div>


            <?php include '../includes/footer_copyrights.php'; ?>


    <!-- </div> -->
</div>



<?php include  '../includes/footer.php';?>
<script>
$(document).ready(function () {
    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
    });
});

   $(document).ready(function () {
        $('.toggle-password').click(function () {
            const target = $($(this).data('target'));
            const type = target.attr('type') === 'password' ? 'text' : 'password';
            target.attr('type', type);
            $(this).text(type === 'password' ? 'Show' : 'Hide');
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


<script>

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

</script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {

            $('.footable').footable();
            $('.footable2').footable();

        });

    </script>


<script src="../scripts/add_admin.js"></script>
<?php include  '../api/add_admin_ajax.php';?>

</body>

</html>

