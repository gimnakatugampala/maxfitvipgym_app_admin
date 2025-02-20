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
                                                    <h1 class="h2 fw-bold">GIMNA KATUGAMPALA</h1>
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
                                    <strong>Donec quam felis</strong>

                                    <p>Thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects
                                        and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath </p>

                                    <p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite
                                        sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet.</p>
                                </div>
                            </div>

                            <div role="tabpanel" id="tab-4" class="tab-pane">
                                <div class="panel-body">
                                    <strong>Donec quam felis</strong>

                                    <p>Thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects
                                        and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath </p>

                                    <p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite
                                        sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet.</p>
                                </div>
                            </div>


                        </div>


                    </div>

            
            



        </div>
        <?php include '../includes/footer_copyrights.php'; ?>


    </div>
</div>



<?php include_once '../includes/footer.php'?>

<script>
    $(document).ready(function(){


        $('.product-images').slick({
            dots: true
        });

    });

</script>

</body>

</html>
