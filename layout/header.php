<?php
session_start();
error_reporting(0);

include "class/method.php";
?>
<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="project 2">
	<meta property="og:title" content="project 2">
	<meta property="og:description" content="project 2">
	<meta property="og:image" content="">
	<meta name="format-detection" content="telephone=no">


	<title>Agrikulture</title>

	<link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="vendor/swiper/css/swiper-bundle.min.css" rel="stylesheet">
	<link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.bootstrap.min.css" rel="stylesheet">
	<link href="vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">


	<link href="vendor/tagify/dist/tagify.css" rel="stylesheet">

	<link href="css/style.css" rel="stylesheet">

	<style>
		.dt-table tbody tr td.sorting_1 span,
		.dt-table thead tr td.sorting_asc label,
		.dt-table thead tr td.sorting_desc label,

		table.dataTable thead td.sorting_asc:after,
		table.dataTable thead td.sorting_desc:after {
			color: var(--primary) !important;
		}

		.none {
			display: none !important;
		}
	</style>

	<link rel="stylesheet" href="http://cdn.datatables.net/responsive/1.0.2/css/dataTables.responsive.css" />

	<!--**********************************
        Scripts
    ***********************************-->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

</head>

<body data-typography="opensans" data-theme-version="light" data-layout="horizontal" data-nav-headerbg="color_1" data-headerbg="color_1" data-sidebar-style="modern" data-sidebarbg="color_1" data-sidebar-position="static" data-header-position="static" data-container="wide" direction="ltr" data-primary="color_12" data-secondary="color_1" class="loaded">
	<!--*******************
        Preloader start
    ********************-->
	<div id="preloader">
		<div class="lds-ripple">
			<div></div>
			<div></div>
		</div>
	</div>
	<!--*******************
        Preloader end
    ********************-->

	<!--**********************************
        Main wrapper start
    ***********************************-->
	<div id="main-wrapper">


		<?php
		include 'layout/sidebar.php';
		?>
		<!--**********************************
            Content body start
        ***********************************-->
		<div class="content-body">