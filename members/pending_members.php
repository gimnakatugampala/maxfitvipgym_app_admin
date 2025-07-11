<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Maxfit VIP Gym | Pending Members List</title>

    <?php include_once '../includes/header.php';  ?>


</head>

<body>

    <div id="wrapper">

        <?php include '../includes/sidebar.php'; ?>

        <div id="page-wrapper" class="gray-bg">
            
        <?php include '../includes/navbar.php'; ?>


            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Pending Members</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>Members</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Pending Members List</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>All the members using the Maxfit VIP Gym</h5>
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

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Membership ID</th>
                        <th>Full Name</th>
                        <th>Phone Number</th>
                        <th>Member Since</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="gradeX">
                        <td>1</td>
                        <td>NDIJU590</td>
                        <td>GIMNA KATUGAMPALA</td>
                        <td class="center">0764961707</td>
                        <td class="center">4 months ago</td>
                        <td class="center">
                            <button type="button" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Activate</button>
                            <button type="button" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Deactivate</button>
                        </td>
                    </tr>
    
                
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#ID</th>
                        <th>Membership ID</th>
                        <th>Full Name</th>
                        <th>Phone Number</th>
                        <th>Member Since</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                    </table>
                        </div>

                    </div>
                </div>
            </div>
            </div>
        </div>
        <?php include '../includes/footer_copyrights.php'; ?>


        </div>
        </div>



  <?php include '../includes/footer.php'; ?>



    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });

    </script>

</body>

</html>
