<?php

class Logout extends Controller {
	public function logout() {
		session_start();
    session_destroy();
    echo "<script>
    alert('anda telah logout!');
    location='../public';
    </script>";
	}
}