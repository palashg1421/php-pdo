<?php require_once './include/Functions.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<title>PDO</title>
		<link rel="stylesheet" href="./assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="./assets/css/font-awesome.min.css" />
		<link rel="stylesheet" href="./assets/css/custom.css" />
		<link rel="stylesheet" href="./assets/css/responsive.css" />
		<script src="./assets/js/jquery.min.js"></script>
		<script src="./assets/js/bootstrap.min.js"></script>
		<script src="./assets/js/bootbox.js"></script>
		<script src="./assets/js/custom.js"></script>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row nav-wrapper"><?php require_once './pages/layout/nav.php'; ?></div>
			<div class="row body-wrapper">
				<div class="col col-sm-3">
						<?php include './pages/layout/search.php'; ?>
				</div>
				<div class="col col-sm-9">
					<div class="content-bg">
						<?php include('./pages/home.php'); ?>
					</div>
				</div>
			</div>
		</div>
		<!-- User modal-->
		<div id="userModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">User</h4>
					</div>
					<div class="modal-body"></div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
