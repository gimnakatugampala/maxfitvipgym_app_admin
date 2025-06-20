<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Maxfit VIP Gym | Admin List</title>

    <?php include_once '../includes/header.php';  ?>



</head>

<body>

<div id="wrapper">

<?php include '../includes/sidebar.php'; ?>

    <div id="page-wrapper" class="gray-bg">
       
    <?php include '../includes/navbar.php'; ?>

        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Admin List</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a>Admin</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <strong>Admin List</strong>
                    </li>
                </ol>
            </div>
             <div class="col-lg-2">
                <a href="../admin/add_admin.php" class="btn btn-primary mt-4 btn-lg"><i class="fa fa-plus" aria-hidden="true"></i> Add Admin</a>
            </div>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight ecommerce">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Admin List</h5>

                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#" class="dropdown-item">Config option 1</a>
                                    </li>
                                    <li><a href="#" class="dropdown-item">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <input type="text" class="form-control form-control-sm m-b-xs" id="filter"
                                   placeholder="Search in table">

                            <table class="footable table table-stripped" data-page-size="8" data-filter=#filter>
                                <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Last Login</th>
                                    <th>Status</th>
                                    <th>created by</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody id="adminList">
                                <!-- <tr class="gradeX">
                                    <td>1</td>
                                    <td>GIMNA KATUGAMPALA</td>
                                    <td>gimnakatugampala@gmail.com</td>
                                    <td>20 min ago</td>
                                    <td></td>
                                    <td>ADMIN</td>
                                    <td class="center">
                                        <button type="button" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                        <button class="btn btn-danger " type="button"><i class="fa fa-times" aria-hidden="true"></i></button>
                                        <button class="btn btn-primary " type="button"><i class="fa fa-check" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
                                <tr class="gradeC">
                                    <td>2</td>
                                    <td>GIMNA KATUGAMPALA</td>
                                    <td>gimnaktest@gmail.com</td>
                                    <td>20 min ago</td>
                                    <td></td>
                                    <td>ADMIN</td>
                                    <td class="center">
                                        <button type="button" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                        <button class="btn btn-danger " type="button"><i class="fa fa-times" aria-hidden="true"></i></button>
                                        <button class="btn btn-primary " type="button"><i class="fa fa-check" aria-hidden="true"></i></button>
                                    </td>
                                </tr> -->

                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="5">
                                        <ul class="pagination float-right"></ul>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
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

<script src="../scripts/admin_list.js"></script>

<script>

    
  $(document).on('click', '.toggle-status', function () {
    const button = $(this);
    const userId = button.data('id');
    const newStatus = button.data('status');
    const actionText = newStatus === 1 ? 'activate' : 'deactivate';

    if (confirm(`Are you sure you want to ${actionText} this admin?`)) {
        $.ajax({
            url: '../api/toggle_admin_status.php',
            method: 'POST',
            data: { id: userId, status: newStatus },
            success: function (response) {
                if (response.status === 'success') {
                    // Toggle button and badge in real time without reloading everything
                    button.data('status', newStatus === 1 ? 0 : 1);
                    button
                        .toggleClass('btn-danger btn-primary')
                        .html(`<i class="fa ${newStatus === 1 ? 'fa-times' : 'fa-check'}"></i> ${newStatus === 1 ? 'Deactivate' : 'Activate'}`);

                    // Update status badge in the same row
                    const badge = button.closest('tr').find('td:eq(4) span');
                    badge
                        .toggleClass('badge-primary badge-danger')
                        .text(newStatus === 1 ? 'Active' : 'Inactive');
                } else {
                    alert(response.message || 'Failed to update status.');
                }
            },
            error: function () {
                alert('Server error occurred.');
            }
        });
    }
});

</script>

<?php include '../api/toggle_admin_status.php'; ?>

</body>

</html>

