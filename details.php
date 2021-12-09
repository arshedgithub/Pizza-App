<?php

include('config/db_connect.php');

if (isset($_POST['delete'])) {
    $id_to_delete = mysqli_real_escape_string($con, $_POST['id_to_delete']);
    $sql = "DELETE FROM pizzas WHERE id = $id_to_delete";

    if (mysqli_query($con, $sql)) {
        header('Location: index.php');
    } else {
        echo 'query error: '.mysqli_error($con);
    }
}

if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($con, $_GET['id']);
    $sql = "SELECT * FROM pizzas WHERE id = $id";

    $result = mysqli_query($con, $sql);
    $pizza = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    mysqli_close($con);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Details</title>
</head>
<body>
	
    <?php include('templates/header.php'); ?>
	
    <div class="container center">
    <?php if($pizza): ?>
        <h4><?php echo htmlspecialchars($pizza['title']); ?></h4>
        <p>Created by:<?php echo htmlspecialchars($pizza['email']); ?></p>
        <p><?php echo date($pizza['created_at']); ?></p>
        <h6>Ingredients:</h6>
        <p><?php echo htmlspecialchars($pizza['ingredients']); ?></p>

        <!-- delete form  -->
        <form action="details.php" method="post">
            <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id']?>">
            <input type="submit" name='delete' value="Delete" class="btn brand z-depth-0">
        </form>
     <?php else: ?>
        <h4>No such pizza exists.</h4>
    <?php endif; ?>
    </div>

    <?php include('templates/footer.php'); ?>
    
</body>
</html>