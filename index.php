<?php require_once('session.php'); ?>

<!DOCTYPE html>
<html>

<?php require_once('header.php'); ?>

<body>

<?php require_once('nav.php'); ?>
<br><br><br><br><br><br>


<p>This is where stuff goes</p>
<p>Welcome <i><?php echo $_SESSION['username']; ?></i></p>
<br><br><br>
<div class="row">
			<div class="col-xs-12" id="app"></div>
		</div>

	    <hr>


<?php require_once('footer.php'); ?>
<script src="app.js"></script>

</body>
</html>
