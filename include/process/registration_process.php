<?php
$errors = [];
$message = NULL;
$success = NULL;
$superuser = 'admin@secure-portal:189#super';
$lecturer = 'admin@secure-portal:123#admin';
$privilege = 'lecturer';

$staff_id = NULL;
$username = NULL;
$secret_key = NULL;
$password = NULL;

if ($_POST) {
	extract($_POST);
	
	if (isset($register)) {
		if (!empty($staff_id) && !empty($username) && !empty($secret_key) && !empty($password)) {
			if (strlen($staff_id) < 3)
				$errors['staff_id'] = 'Staff Id must be more than 2 characters';
			
			if (strlen($username) > 10 || strlen($username) < 3)
				$errors['username'] = 'Username must be between 3 to 10 characters.';
			
			if ($secret_key !== $superuser && $secret_key !== $lecturer)
				$errors['secret_key'] = 'The given secret key is incorrect. Please contact the administrator for more info.';
			
			if (strlen($password) > 32 || strlen($password) < 8)
				$errors['password'] = 'Password must be between 8 to 32 characters.';
			
			if (empty($errors)) {
				$password_md5 = md5($password);
				
				if ($secret_key === $superuser)
					$privilege = 'superuser';
				
				$q = $connect->query("SELECT * FROM `users` WHERE `username` = '$username' OR `staff_id` = '$staff_id'");
				
				if ($q->num_rows < 1) {
					$q = $connect->query("INSERT INTO `users` (staff_id, username, password, privilege, created_at, updated_at) VALUES ('$staff_id', '$username', '$password_md5', '$privilege', NOW(), NOW())");
					if ($q)
						$success = 'Account created successfully';
					else
						$message = 'Error creating account, please try again. Contact us if this error continues.';
				} else
					$message = 'User Already exists (Staff Id and Username must be unique).';
			}
		} else {
			$message = 'Please fill in required fields';
		}
	}
}
