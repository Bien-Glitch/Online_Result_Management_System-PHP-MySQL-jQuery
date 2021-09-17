<div class="col-auto col-md-3 col-xl-2 px-lg-2 px-0 bg-dark">
	<div class="d-flex flex-column align-items-center align-items-md-start px-3 pt-2 text-white min-vh-100">
		<a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
			<span class="fs-5 d-none d-md-inline">Menu</span>
		</a>
		<ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
			<li class="nav-item">
				<a href="<?php echo $user ? './' : './login' ?>" class="nav-link d-flex align-items-center px-0">
					<i class="fs-4 fal fa-1x fa-home"></i>
					<span class="ms-2 d-none d-md-inline">Home</span>
				</a>
			</li>
			<li>
				<a href="<?php echo $user ? './courses' : './login' ?>" class="nav-link d-flex align-items-center px-0">
					<i class="fs-4 fal fa-1x fa-table-cells"></i>
					<span class="ms-2 d-none d-md-inline">Courses</span>
				</a>
			</li>
			
			<?php if ($faculties || $user_privilege === 'superuser') { ?>
				<li>
					<a href="#submenu2" data-bs-toggle="collapse" class="nav-link d-flex align-items-center px-0">
						<i class="fs-4  fal fa-1x fa-grid-3"></i>
						<span class="ms-2 d-none d-md-inline">Faculties</span>
					</a>
					<ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
						<?php
						if ($faculties)
							foreach ($faculties as $faculty) {
								echo '
									<li class="w-100">
										<a href="#" class="nav-link px-0">
											<span class="d-none d-md-inline">Faculty of</span> ' . $faculty['name'] . '
										</a>
									</li>
								';
							}
						else
							echo '
								<li>
									<a href="#" class="nav-link px-0">
										<i class="fa fal fa-1x fa-plus"></i>
										<span class="d-none d-md-inline">add </span> Faculty
									</a>
								</li>
							';
						?>
					</ul>
				</li>
			<?php } ?>
			
			<?php if ($departments || $user_privilege === 'superuser') { ?>
				<li>
					<a href="#submenu3" data-bs-toggle="collapse" class="nav-link d-flex align-items-center px-0">
						<i class="fs-4  fal fa-1x fa-grid-2"></i>
						<span class="ms-2 d-none d-md-inline">Departments</span>
					</a>
					<ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
						<?php
						if ($departments)
							foreach ($departments as $department) {
								echo '
									<li class="w-100">
										<a href="#" class="nav-link px-0">
											<span class="d-none d-md-inline">Department of</span> ' . $department['name'] . '
										</a>
									</li>
								';
							}
						else
							echo '
								<li>
									<a href="#" class="nav-link px-0">
										<i class="fa fal fa-1x fa-plus"></i>
										<span class="d-none d-md-inline">add </span> Department
									</a>
								</li>
							';
						?>
					</ul>
				</li>
			<?php } ?>
			
			<li>
				<a href="#" class="nav-link d-flex align-items-center px-0">
					<i class="fs-4  fal fa-1x fa-users"></i>
					<span class="ms-2 d-none d-md-inline">Students</span>
				</a>
			</li>
		</ul>
		<hr>
		<div class="dropdown pb-4">
			<?php include 'sidebar-auth.php'; ?>
		</div>
	</div>
</div>
