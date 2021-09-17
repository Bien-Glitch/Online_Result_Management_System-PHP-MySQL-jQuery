<?php
	if ($user)
		$auth = '
			<a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
				<img src="https://github.com/mdo.png" alt="User" width="30" height="30" class="rounded-circle">
				<span class="d-none d-md-inline mx-1">John Doe</span>
			</a>
			<ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
				<li><a class="dropdown-item" href="#">Settings</a></li>
				<li><a class="dropdown-item" href="#">Dashboard</a></li>
				<li>
					<hr class="dropdown-divider">
				</li>
				<li><a class="dropdown-item" href="#">Sign out</a></li>
			</ul>
		';
	else
		$auth = '
			<a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
				<img src="./design/img/user.png" class="img-fluid rounded-circle" alt="Guest" style="height: 30px; width: 30px">
				<span class="d-none d-md-inline mx-1">Guest</span>
			</a>
			<ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
				<li><a class="dropdown-item" href="./login">Login</a></li>
				<li><a class="dropdown-item" href="#">Register</a></li>
			</ul>
		';
	echo $auth;
