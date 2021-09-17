<?php include './include/session.php'; ?>
<?php include './include/template/app-struct.php'; ?>

<?php
$message = NULL;
$success = NULL;
$username = NULL;

if ($_POST) {
	extract($_POST);
	
	if (isset($login)) {
		if (!empty($username) && !empty($password)) {
			$password_md5 = md5($password);
			
			$q = $connect->query("SELECT * FROM `users` WHERE `username` = '$username'");
			
			if ($q->num_rows > 0 && $q->num_rows < 2) {
				$q = $connect->query("SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password_md5'");
				
				if ($q->num_rows > 0) {
					$login = $q->fetch_array();
					
					$_SESSION['orms_admin_login'] = $login['id'];
					$success = 'Login successful';
				} else
					$message = 'Input correct password.';
			} else {
				if ($q->num_rows < 1)
					$message = 'Account does not exist.';
				else
					$message = 'An error occurred on the server: Multiple accounts found. Please contact us.';
			}
		} else
			$message = 'Please enter your credentials.';
	}
}
?>

<body>
	<div class="position-absolute auth-bg" style=""></div>
	<main class="container-fluid auth-wrapper position-absolute d-flex border border-danger">
		<div class="m-auto col-md-6 col-sm-8 col-12">
			<div class="card">
				<div class="card-header text-white bg-dark">
					<span class="card-title">LOGIN</span>
				</div>
				<div class="card-body">
					<form action="" method="post" id="login-form">
						<?php
						if (!empty($success))
							echo '
								<div class="alert alert-success d-flex justify-content-between align-items-center pr-0 p-1 mt-1 fade show">
									<div class="px-1">
										<i class="fa fa-1x fa-check-circle"></i>
										' . $success . '
									</div>
								</div>
								<meta http-equiv="refresh" content="4; url=./">
							';
						
						if (!empty($message))
							echo '
								<div class="alert alert-danger d-flex justify-content-between align-items-center pr-0 p-1 mt-1 fade show" data-bs-dismiss="alert">
									<div class="px-1">
										<i class="fa fa-1x fa-exclamation-triangle"></i>
										' . $message . '
									</div>
									<a type="button" class="text-danger" data-bs-dismiss="alert"><i class="fa fa-times-circle"></i></a>
								</div>
							';
						?>
						<div class="form-group">
							<label for="username">Username</label>
							<div class="input-group input-group-sm align-items-center flex-nowrap">
								<i class="far fa-1x fa-user pe-2"></i>
								<input type="text" name="username" id="username" class="form-control form-control-sm" placeholder="Username" autocomplete="new-username">
							</div>
							<div id="usernameValid" class="w3-small valid-text"></div>
						</div>
						
						<div class="form-group">
							<label for="password">Password</label>
							<div class="input-group input-group-sm align-items-center flex-nowrap">
								<i class="far fa-1x fa-lock pe-2"></i>
								<input type="password" name="password" id="password" minlength="8" maxlength="32" class="form-control form-control-sm" placeholder="Password" autocomplete="new-password">
							</div>
							<div id="passwordValid" class="w3-small valid-text"></div>
						</div>
						
						<div class="">
							<button type="submit" class="btn btn-sm btn-primary w-100" name="login">LOGIN</button>
							<a href="./register">Don't Have an account ?</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</main>
</body>

<?php include './include/template/scripts.php'; ?>
