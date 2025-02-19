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
                            <a href="../members/member_details.html" type="button" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>
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
                            <a href="../members/member_details.html" type="button" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>
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
                        <p><strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                            printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged.</p>
                        <p><strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                            printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged.</p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>



  <!-- Mainly scripts -->
  <script src="../js/jquery-3.1.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.js"></script>
  <script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
  <script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

  <!-- Flot -->
  <script src="../js/plugins/flot/jquery.flot.js"></script>
  <script src="../js/plugins/flot/jquery.flot.tooltip.min.js"></script>
  <script src="../js/plugins/flot/jquery.flot.spline.js"></script>
  <script src="../js/plugins/flot/jquery.flot.resize.js"></script>
  <script src="../js/plugins/flot/jquery.flot.pie.js"></script>
  <script src="../js/plugins/flot/jquery.flot.symbol.js"></script>
  <script src="../js/plugins/flot/jquery.flot.time.js"></script>

  <!-- Peity -->
  <script src="../js/plugins/peity/jquery.peity.min.js"></script>
  <script src="../js/demo/peity-demo.js"></script>

  <!-- Custom and plugin javascript -->
  <script src="../js/inspinia.js"></script>
  <script src="../js/plugins/pace/pace.min.js"></script>

  <!-- jQuery UI -->
  <script src="../js/plugins/jquery-ui/jquery-ui.min.js"></script>

  <!-- Jvectormap -->
  <script src="../js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
  <script src="../js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

  <!-- EayPIE -->
  <script src="../js/plugins/easypiechart/jquery.easypiechart.js"></script>

  <!-- Sparkline -->
  <script src="../js/plugins/sparkline/jquery.sparkline.min.js"></script>

  <!-- Sparkline demo data  -->
  <script src="../js/demo/sparkline-demo.js"></script>

  <!-- Custom and plugin javascript -->
  <script src="../js/inspinia.js"></script>
  <script src="../js/plugins/pace/pace.min.js"></script>

      <!-- Flot demo data -->
      <script src="../js/demo/flot-demo.js"></script>

    <script src="../js/plugins/dataTables/datatables.min.js"></script>
    <script src="../js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>



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
