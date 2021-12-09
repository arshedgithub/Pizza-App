<?php 

 	$errors = array('email'=>'','title'=>'','ingredients'=>'');

	if(isset($_POST['submit'])){
		if (empty($_POST['email'])) {
			$errors['email'] = 'Email is required';
		}else{
			$email = $_POST['email'];
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$errors['email'] = 'Email must be a valid email address';
			}
		}

		if (empty($_POST['title'])) {
			$errors['title'] = 'Title is required';
		}else{
			$title = $_POST['title'];
			if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
				$errors['title'] = 'Title must be letters and spaces only';
			}
		}

		if (empty($_POST['ingredients'])) {
			$errors['ingredients'] ='At least one ingredient is required';
		}else{
			$ingredients = $_POST['ingredients'];
			if (!preg_match('/(^[a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
				$errors['ingredients'] ='Ingredients must be a comma seperated list';
			}
		}

		if (!array_filter($errors)) {
			header('Location: index.php');	
		}
	}

?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>

	<section class="container grey-text">
		<h4 class="center">Add a Pizza</h4>
		<form class="white" action="add.php" method="POST">
			<label>Your Email</label>
			<input type="text" name="email">
			<div class="red-text"><?php echo $errors['email'] ?></div>
			<label>Pizza Title</label>
			<input type="text" name="title">
			<div class="red-text"><?php echo $errors['title'] ?></div>
			<label>Ingredients (comma separated)</label>
			<input type="text" name="ingredients">
			<div class="red-text"><?php echo $errors['ingredients'] ?></div>
			<div class="center">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>

	<?php include('templates/footer.php'); ?>

</html>