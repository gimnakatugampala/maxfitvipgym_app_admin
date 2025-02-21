<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Maxfit VIP Gym | Gimna Katugampala</title>

    <?php include '../includes/header.php';  ?>




    <style>
    
    .profile-info h1 {
            font-size: 24px;
            font-weight: bold;
        }
        .profile-info h5 {
            font-size: 16px;
            color: #555;
        }
        .details {
            margin-top: 15px;
        }
        .details h5 {
            font-size: 14px;
            color: #6c757d;
            margin-bottom: 5px;
        }

        
    </style>

</head>

<body>

<div id="wrapper">

<?php include '../includes/sidebar.php'; ?>
    
    <div id="page-wrapper" class="gray-bg">
    
    <?php include '../includes/navbar.php'; ?>

        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Member Details</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a>Members</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <strong>Member Details - Gimna Katugampala</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight">

        <div class="tabs-container">
                        <ul class="nav nav-tabs" role="tablist">
                            <li><a class="nav-link active" data-toggle="tab" href="#tab-1"> Member Info</a></li>
                            <li><a class="nav-link" data-toggle="tab" href="#tab-2">Workout Schedule</a></li>
                            <li><a class="nav-link" data-toggle="tab" href="#tab-3">Body Stats</a></li>
                            <li><a class="nav-link" data-toggle="tab" href="#tab-4">Attendance</a></li>
                        </ul>
                        <div class="tab-content">

                            <div role="tabpanel" id="tab-1" class="tab-pane active">
                                <div class="panel-body">
                                <div class="row">
                                <div class="col-lg-12">
                                    <div class="ibox product-detail">
                                        <div class="ibox-content">

                                        <div class="text-center">
                                        <div class="row mx-auto">
                                            <div class="col-md-12">
                                                <img alt="Profile Image" class="rounded-circle img-fluid" src="../img/a7.jpg" style="width: 120px; height: 120px;">
                                                <div class="mt-3">
                                                    <h1 class="h2 fw-bold"><b>GIMNA KATUGAMPALA</b></h1>
                                                    <h4 class="text-muted">+94 764961707</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3 text-start">
                                            <div class="col-6">
                                                <h4 class="text-muted">Member since:</h4>
                                                <h3 class="fw-semibold">20th February 2025</h3>
                                            </div>
                                            <div class="col-6">
                                                <h4 class="text-muted">Next Payment:</h4>
                                                <h3 class="fw-semibold">20th February 2025</h3>
                                            </div>
                                            <div class="col-6">
                                                <h4 class="text-muted">Last Active:</h4>
                                                <h3 class="fw-semibold">20th February 2025</h3>
                                            </div>
                                            <div class="col-6">
                                                <h4 class="text-muted">Expiry Date:</h4>
                                                <h3 class="fw-semibold">20th February 2025</h3>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>

                                        </div>
                                       
                                    </div>

                                </div>
                            </div>
                                </div>
                            </div>

                            <div role="tabpanel" id="tab-2" class="tab-pane">
                                <div class="panel-body">
                                    <strong>Donec quam felis</strong>

                                    <p>Thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects
                                        and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath </p>

                                    <p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite
                                        sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet.</p>
                                </div>
                            </div>

                          

                            <div role="tabpanel" id="tab-3" class="tab-pane">
                                <div class="panel-body">
                                   <div class="row">

                                        <div class="col-lg-6">
                                        <div class="ibox ">
                                            <div class="ibox-title">
                                                <h5>Weight Progress</h5>
                                                <div class="ibox-tools">
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myWeightModal">
                                                    See as Table
                                                </button>
                                                </div>
                                            </div>
                                            <div class="ibox-content">
                                                    <div class="flot-chart">
                                                        <div class="flot-chart-content" id="flot-bar-chart"></div>
                                                    </div>
                                            </div>
                                        </div>
                                        </div>


                                                
                                    <div class="col-lg-6">
                                        <div class="ibox ">
                                            <div class="ibox-title">
                                                <h5>Hip Size</h5>
                                                <div class="ibox-tools">
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myHeightModal">
                                                    See as Table
                                                </button>
                                                </div>
                                            </div>
                                            <div class="ibox-content">

                                                <div class="flot-chart">
                                                    <div class="flot-chart-content" id="flot-line-chart"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Chest Progress
                            </h5>
                            <div class="ibox-tools">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myChestModal">
                                                    See as Table
                                                </button>
                                                </div>
                        </div>
                        <div class="ibox-content">
                            <div>
                                <canvas id="lineChart" height="140"></canvas>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-6">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Bicep Progress</h5>
                            <div class="ibox-tools">
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myBicepModal">
                                                    See as Table
                                                </button>
                                                </div>
                        </div>
                        <div class="ibox-content">
                            <div>
                                <canvas id="barChart" height="140"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                                    

                               

                                        
                                   </div>
                                </div>
                            </div>

                            <div role="tabpanel" id="tab-4" class="tab-pane">
                                <div class="panel-body">
                                    <div class="ibox-content">
                                        <div id="calendar"></div>
                                    </div>
                                </div>
                            </div>

                            


                        </div>


                    </div>

            
            



        </div>
        <?php include '../includes/footer_copyrights.php'; ?>


    </div>
</div>

                    <!-- Weight -->
                        <div class="modal inmodal fade" id="myWeightModal" tabindex="-1" role="dialog"  aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">Weight Progress</h4>
                                            <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
                                        </div>
                                        <div class="modal-body">
                                       
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Progress</th>
                                            <th>Weight (KG)</th>
                                            <th>Date Recorded</th>
                                            <th>From the Previous</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><span class="line">5,3,2,-1,-3,-2,2,3,5,2</span></td>
                                            <td>59</td>
                                            <td>23th February 2025</td>
                                            <td class="text-navy"> <i class="fa fa-level-up"></i> 40% </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td><span class="line">5,3,9,6,5,9,7,3,5,2</span></td>
                                            <td>55.6</td>
                                            <td>23th February 2025</td>
                                            <td class="text-warning"> <i class="fa fa-level-down"></i> -20% </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td><span class="line">1,6,3,9,5,9,5,3,9,6,4</span></td>
                                            <td>46</td>
                                            <td>23th February 2025</td>
                                            <td class="text-navy"> <i class="fa fa-level-up"></i> 26% </td>
                                        </tr>
                                        </tbody>
                                    </table>
                            
                            
                                        </div>

                                    </div>
                                </div>
                    </div>

                        <!-- Hip Size -->
                        <div class="modal inmodal fade" id="myHeightModal" tabindex="-1" role="dialog"  aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">Hip Size Progress</h4>
                                            <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
                                        </div>
                                        <div class="modal-body">
                                       
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Progress</th>
                                            <th>Hip Size (Inch)</th>
                                            <th>Date Recorded</th>
                                            <th>From the Previous</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><span class="line">5,3,2,-1,-3,-2,2,3,5,2</span></td>
                                            <td>59</td>
                                            <td>23th February 2025</td>
                                            <td class="text-navy"> <i class="fa fa-level-up"></i> 40% </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td><span class="line">5,3,9,6,5,9,7,3,5,2</span></td>
                                            <td>55.6</td>
                                            <td>23th February 2025</td>
                                            <td class="text-warning"> <i class="fa fa-level-down"></i> -20% </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td><span class="line">1,6,3,9,5,9,5,3,9,6,4</span></td>
                                            <td>46</td>
                                            <td>23th February 2025</td>
                                            <td class="text-navy"> <i class="fa fa-level-up"></i> 26% </td>
                                        </tr>
                                        </tbody>
                                    </table>
                            
                            
                                        </div>

                                    </div>
                                </div>
                    </div>

                    <!-- Chest -->
                    <div class="modal inmodal fade" id="myChestModal" tabindex="-1" role="dialog"  aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">Chest Progress</h4>
                                            <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
                                        </div>
                                        <div class="modal-body">
                                       
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Progress</th>
                                            <th>Chest Size (Inch)</th>
                                            <th>Date Recorded</th>
                                            <th>From the Previous</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><span class="line">5,3,2,-1,-3,-2,2,3,5,2</span></td>
                                            <td>59</td>
                                            <td>23th February 2025</td>
                                            <td class="text-navy"> <i class="fa fa-level-up"></i> 40% </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td><span class="line">5,3,9,6,5,9,7,3,5,2</span></td>
                                            <td>55.6</td>
                                            <td>23th February 2025</td>
                                            <td class="text-warning"> <i class="fa fa-level-down"></i> -20% </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td><span class="line">1,6,3,9,5,9,5,3,9,6,4</span></td>
                                            <td>46</td>
                                            <td>23th February 2025</td>
                                            <td class="text-navy"> <i class="fa fa-level-up"></i> 26% </td>
                                        </tr>
                                        </tbody>
                                    </table>
                            
                            
                                        </div>

                                    </div>
                                </div>
                    </div>

                    <!-- Bicep -->
                    <div class="modal inmodal fade" id="myBicepModal" tabindex="-1" role="dialog"  aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">Bicep Progress</h4>
                                            <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
                                        </div>
                                        <div class="modal-body">
                                       
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Progress</th>
                                            <th>Bicep Size (Inch)</th>
                                            <th>Date Recorded</th>
                                            <th>From the Previous</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><span class="line">5,3,2,-1,-3,-2,2,3,5,2</span></td>
                                            <td>59</td>
                                            <td>23th February 2025</td>
                                            <td class="text-navy"> <i class="fa fa-level-up"></i> 40% </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td><span class="line">5,3,9,6,5,9,7,3,5,2</span></td>
                                            <td>55.6</td>
                                            <td>23th February 2025</td>
                                            <td class="text-warning"> <i class="fa fa-level-down"></i> -20% </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td><span class="line">1,6,3,9,5,9,5,3,9,6,4</span></td>
                                            <td>46</td>
                                            <td>23th February 2025</td>
                                            <td class="text-navy"> <i class="fa fa-level-up"></i> 26% </td>
                                        </tr>
                                        </tbody>
                                    </table>
                            
                            
                                        </div>

                                    </div>
                                </div>
                    </div>



<?php include '../includes/footer.php'?>



<script>

    $(document).ready(function() {

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green'
            });

        /* initialize the external events
         -----------------------------------------------------------------*/


        $('#external-events div.external-event').each(function() {

            // store data so the calendar knows to render an event upon drop
            $(this).data('event', {
                title: $.trim($(this).text()), // use the element's text as the event title
                stick: true // maintain when user navigates (see docs on the renderEvent method)
            });

            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 1111999,
                revert: true,      // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
            });

        });
       

        /* initialize the calendar
         -----------------------------------------------------------------*/
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month'
            },
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar
            drop: function() {
                // is the "remove after drop" checkbox checked?
                if ($('#drop-remove').is(':checked')) {
                    // if so, remove the element from the "Draggable Events" list
                    $(this).remove();
                }
            },
            events: [
                {
                    title: 'All Day Event',
                    start: new Date(y, m, 1)
                },
                {
                    title: 'Long Event',
                    start: new Date(y, m, d-5),
                    end: new Date(y, m, d-2)
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: new Date(y, m, d-3, 16, 0),
                    allDay: false
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: new Date(y, m, d+4, 16, 0),
                    allDay: false
                },
                {
                    title: 'Meeting',
                    start: new Date(y, m, d, 10, 30),
                    allDay: false
                },
                {
                    title: 'Lunch',
                    start: new Date(y, m, d, 12, 0),
                    end: new Date(y, m, d, 14, 0),
                    allDay: false
                },
                {
                    title: 'Birthday Party',
                    start: new Date(y, m, d+1, 19, 0),
                    end: new Date(y, m, d+1, 22, 30),
                    allDay: false
                },
                {
                    title: 'Click for Google',
                    start: new Date(y, m, 28),
                    end: new Date(y, m, 29),
                    url: 'http://google.com/'
                }
            ]
        });


    });

</script>

<script>

        $(document).ready(function () {

            c3.generate({
                bindto: '#lineChart',
                data:{
                    columns: [
                        ['data1', 30, 200, 100, 400, 150, 250],
                        ['data2', 50, 20, 10, 40, 15, 25]
                    ],
                    colors:{
                        data1: '#1ab394',
                        data2: '#BABABA'
                    }
                }
            });

            c3.generate({
                bindto: '#slineChart',
                data:{
                    columns: [
                        ['data1', 30, 200, 100, 400, 150, 250],
                        ['data2', 130, 100, 140, 200, 150, 50]
                    ],
                    colors:{
                        data1: '#1ab394',
                        data2: '#BABABA'
                    },
                    type: 'spline'
                }
            });

            c3.generate({
                bindto: '#scatter',
                data:{
                    xs:{
                        data1: 'data1_x',
                        data2: 'data2_x'
                    },
                    columns: [
                        ["data1_x", 3.2, 3.2, 3.1, 2.3, 2.8, 2.8, 3.3, 2.4, 2.9, 2.7, 2.0, 3.0, 2.2, 2.9, 2.9, 3.1, 3.0, 2.7, 2.2, 2.5, 3.2, 2.8, 2.5, 2.8, 2.9, 3.0, 2.8, 3.0, 2.9, 2.6, 2.4, 2.4, 2.7, 2.7, 3.0, 3.4, 3.1, 2.3, 3.0, 2.5, 2.6, 3.0, 2.6, 2.3, 2.7, 3.0, 2.9, 2.9, 2.5, 2.8],
                        ["data2_x", 3.3, 2.7, 3.0, 2.9, 3.0, 3.0, 2.5, 2.9, 2.5, 3.6, 3.2, 2.7, 3.0, 2.5, 2.8, 3.2, 3.0, 3.8, 2.6, 2.2, 3.2, 2.8, 2.8, 2.7, 3.3, 3.2, 2.8, 3.0, 2.8, 3.0, 2.8, 3.8, 2.8, 2.8, 2.6, 3.0, 3.4, 3.1, 3.0, 3.1, 3.1, 3.1, 2.7, 3.2, 3.3, 3.0, 2.5, 3.0, 3.4, 3.0],
                        ["data1", 1.4, 1.5, 1.5, 1.3, 1.5, 1.3, 1.6, 1.0, 1.3, 1.4, 1.0, 1.5, 1.0, 1.4, 1.3, 1.4, 1.5, 1.0, 1.5, 1.1, 1.8, 1.3, 1.5, 1.2, 1.3, 1.4, 1.4, 1.7, 1.5, 1.0, 1.1, 1.0, 1.2, 1.6, 1.5, 1.6, 1.5, 1.3, 1.3, 1.3, 1.2, 1.4, 1.2, 1.0, 1.3, 1.2, 1.3, 1.3, 1.1, 1.3],
                        ["data2", 2.5, 1.9, 2.1, 1.8, 2.2, 2.1, 1.7, 1.8, 1.8, 2.5, 2.0, 1.9, 2.1, 2.0, 2.4, 2.3, 1.8, 2.2, 2.3, 1.5, 2.3, 2.0, 2.0, 1.8, 2.1, 1.8, 1.8, 1.8, 2.1, 1.6, 1.9, 2.0, 2.2, 1.5, 1.4, 2.3, 2.4, 1.8, 1.8, 2.1, 2.4, 2.3, 1.9, 2.3, 2.5, 2.3, 1.9, 2.0, 2.3, 1.8]
                    ],
                    colors:{
                        data1: '#1ab394',
                        data2: '#BABABA'
                    },
                    type: 'scatter'
                }
            });

            c3.generate({
                bindto: '#stocked',
                data:{
                    columns: [
                        ['data1', 30,200,100,400,150,250],
                        ['data2', 50,20,10,40,15,25]
                    ],
                    colors:{
                        data1: '#1ab394',
                        data2: '#BABABA'
                    },
                    type: 'bar',
                    groups: [
                        ['data1', 'data2']
                    ]
                }
            });

            c3.generate({
                bindto: '#gauge',
                data:{
                    columns: [
                        ['data', 91.4]
                    ],

                    type: 'gauge'
                },
                color:{
                    pattern: ['#1ab394', '#BABABA']

                }
            });

            c3.generate({
                bindto: '#pie',
                data:{
                    columns: [
                        ['data1', 30],
                        ['data2', 120]
                    ],
                    colors:{
                        data1: '#1ab394',
                        data2: '#BABABA'
                    },
                    type : 'pie'
                }
            });

        });

    </script>

</body>

</html>
