<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Maxfit VIP Gym | Members List</title>

    <?php include_once '../includes/header.php';  ?>


</head>

<body>

    <div id="wrapper">

        <?php include '../includes/sidebar.php'; ?>

        <div id="page-wrapper" class="gray-bg">
            
        <?php include '../includes/navbar.php'; ?>


            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Members</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>Members</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Members List</strong>
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
                        <th>Active Date</th>
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
                        <td class="center">1 months ago</td>
                        <td class="center">
                            <a href="../members/member_details.php" type="button" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <button data-toggle="modal" data-target="#myModal5" type="button" class="btn btn-success"><i class="fa fa-line-chart" aria-hidden="true"></i></button>
                        </td>
                    </tr>
                    <tr class="gradeC">
                        <td>2</td>
                        <td>NDIJU59045</td>
                        <td>JOHN SMITH</td>
                        <td class="center">0764961343</td>
                        <td class="center">19 days ago</td>
                        <td class="center">1 day ago</td>
                        <td class="center">
                            <a href="../members/member_details.php" type="button" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <button data-toggle="modal" data-target="#myModal5" type="button" class="btn btn-success"><i class="fa fa-line-chart" aria-hidden="true"></i></button>
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
                        <th>Active Date</th>
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

<!-- Modal -->
        <div class="modal inmodal fade" id="myModal5" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Add Body Stats</h4>
                        <small class="font-bold">20th February 2025 11:00PM</small>
                    </div>
                    <div class="modal-body">

                    <div class="form-group  row"><label class="col-sm-3 col-form-label"><b>Weight [kg]</b>:<span class="text-danger">*</span> </label>
                    <div class="col-sm-9"><input type="text" class="form-control"></div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group  row"><label class="col-sm-3 col-form-label"><b>Hip Size [inch]</b>:<span class="text-danger">*</span> </label>
                    <div class="col-sm-9"><input type="text" class="form-control">
                    </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group  row"><label class="col-sm-3 col-form-label"><b>Chest [inch]</b>:<span class="text-danger">*</span> </label>
                    <div class="col-sm-9"><input type="text" class="form-control">
                    </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group  row"><label class="col-sm-3 col-form-label"><b>Bicep [inch]</b>:<span class="text-danger">*</span> </label>
                    <div class="col-sm-9"><input type="text" class="form-control">
                    </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group  row"><label class="col-sm-3 col-form-label"><b>Max H/R [inch]</b>:<span class="text-danger">*</span> </label>
                    <div class="col-sm-9"><input type="text" class="form-control">
                    </div>
                    </div>
                    
                   
                    
                    
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Submit</button>
                    </div>
                </div>
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
