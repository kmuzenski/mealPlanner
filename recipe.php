<?php require_once('session.php'); ?>

<!DOCTYPE html>
<html>

<?php require_once('header.php'); ?>

<body>

<?php require_once('nav.php'); ?>
<br><br><br><br><br><br>


<p>This is RECIPE</p>
<p>Welcome <i><?php echo $_SESSION['username']; ?></i></p>


<?php require_once('footer.php'); ?>

</body>
</html>
