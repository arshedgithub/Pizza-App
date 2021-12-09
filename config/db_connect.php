<?php

$con = mysqli_connect('localhost', 'arshed', '1234', 'ninja_pizza');

if (!$con) {
	echo 'connection Error: '. mysqli_connect_error($con);
}

?>