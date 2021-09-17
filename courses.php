<?php include './include/session.php'; ?>
<?php include './include/template/app-struct.php'; ?>

<?php
	if (!$user)
		echo '<meta http-equiv="refresh" content="0; url=./login">'
?>

<body>
	<main class="container-fluid">
		<div class="row flex-nowrap">
			<?php include './include/template/sidebar.php'; ?>
			<div class="col">
				Hello
			</div>
		</div>
	</main>
</body>

<?php include './include/template/scripts.php'; ?>
