<?php

session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../auth/login.php");
    exit;
}
?>

<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../font-awesome/css/font-awesome.css" rel="stylesheet">

<link href="../css/plugins/summernote/summernote-bs4.css" rel="stylesheet">

<link href="../css/plugins/iCheck/custom.css" rel="stylesheet">

<link href="../css/plugins/dropzone/basic.css" rel="stylesheet">
<link href="../css/plugins/dropzone/dropzone.css" rel="stylesheet">
<link href="../css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
<link href="../css/plugins/datapicker/datepicker3.css" rel="stylesheet">

<link href="../css/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
<link href="../css/plugins/fullcalendar/fullcalendar.print.css" rel='stylesheet' media='print'>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">



    <!-- c3 Charts -->
    <link href="../css/plugins/c3/c3.min.css" rel="stylesheet">



<!-- FooTable -->
<link href="../css/plugins/footable/footable.core.css" rel="stylesheet">

<!-- Ladda style -->
<link href="../css/plugins/ladda/ladda-themeless.min.css" rel="stylesheet">

<link href="../css/animate.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">

<link href="../css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">


<link href="../css/plugins/dataTables/datatables.min.css" rel="stylesheet">


<link href="../css/plugins/slick/slick.css" rel="stylesheet">
<link href="../css/plugins/slick/slick-theme.css" rel="stylesheet">





