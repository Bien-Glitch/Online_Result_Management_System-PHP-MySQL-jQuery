<?php include './include/session.php'; ?>
<?php include './include/template/app-struct.php'; ?>
<?php require './include/process/registration_process.php'; ?>

<body>
	<div class="position-absolute auth-bg" style=""></div>
	<main class="container-fluid auth-wrapper position-absolute d-flex border border-danger">
		<div class="m-auto col-md-6 col-sm-8 col-12">
			<div class="card">
				<div class="card-header text-white bg-dark">
					<span class="card-title">REGISTER</span>
				</div>
				<div class="card-body">
					<form action="" method="post" id="register-form">
						<?php
						if (!empty($success))
							echo '
								<div class="alert alert-success d-flex justify-content-between align-items-center pr-0 p-1 mt-1 fade show">
									<div class="px-1">
										<i class="fa fa-1x fa-check-circle"></i>
										' . $success . '
									</div>
								</div>
								<meta http-equiv="refresh" content="4; url=./login">
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
						
						if (!empty($_POST) && !empty($errors))
							foreach ($errors as $error) {
								echo '
									<div class="alert alert-danger d-flex justify-content-between align-items-center pr-0 p-1 mt-1 fade show" data-bs-dismiss="alert">
										<div class="px-1">
											<i class="fa fa-1x fa-exclamation-triangle"></i>
											' . $error . '
										</div>
										<a type="button" class="text-danger" data-bs-dismiss="alert"><i class="fa fa-times-circle"></i></a>
									</div>
								';
							}
						?>
						
						<div class="form-group">
							<label for="staff_id">Staff ID</label>
							<div class="input-group input-group-sm align-items-center flex-nowrap">
								<i class="far fa-1x fa-id-badge pe-2"></i>
								<input type="text" name="staff_id" id="staff_id" class="form-control form-control-sm" placeholder="Staff ID Number" value="<?php echo $staff_id; ?>">
							</div>
							<div id="staff_idValid" class="w3-small valid-text"></div>
						</div>
						
						<div class="form-group">
							<label for="username">Username</label>
							<div class="input-group input-group-sm align-items-center flex-nowrap">
								<i class="far fa-1x fa-user pe-2"></i>
								<input type="text" name="username" id="username" class="form-control form-control-sm" placeholder="Username" autocomplete="current-username" value="<?php echo $username; ?>">
							</div>
							<div id="usernameValid" class="w3-small valid-text"></div>
						</div>
						
						<div class="form-group">
							<label for="secret_key">Secret Key</label>
							<div class="input-group input-group-sm align-items-center flex-nowrap">
								<i class="far fa-1x fa-key pe-2"></i>
								<input type="password" name="secret_key" id="secret_key" class="form-control form-control-sm" placeholder="Secret Key [Gotten from the Admin]" value="<?php echo $secret_key; ?>">
							</div>
							<div id="secret_keyValid" class="w3-small valid-text"></div>
						</div>
						
						<div class="form-group">
							<label for="password">Password</label>
							<div class="input-group input-group-sm align-items-center flex-nowrap">
								<i class="far fa-1x fa-lock pe-2"></i>
								<input type="password" name="password" id="password" minlength="8" maxlength="32" class="form-control form-control-sm" placeholder="Password" autocomplete="current-password" value="<?php echo $password; ?>">
							</div>
							<div id="passwordValid" class="w3-small valid-text"></div>
						</div>
						
						<div class="">
							<button type="submit" name="register" class="btn btn-sm btn-primary w-100">REGISTER</button>
							<a href="./login">Already an Administrator ?</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</main>
</body>

<?php include './include/template/scripts.php'; ?>
