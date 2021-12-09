<?php 

$con = mysqli_connect('localhost', 'arshed', '1234', 'ninja_pizza');

if (!$con) {
	echo 'connection Error: '. mysqli_connect_error($con);
}

?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>

	<?php include('templates/footer.php'); ?>

</html>