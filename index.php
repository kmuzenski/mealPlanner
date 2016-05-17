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
<script>
function request() {	
	return $.ajax({
		type:'GET',
		dataType:'jsonp',
		cache: false,


	
		url: "http://food2fork.com/api/search?key=41ea6ca476ba23e6554856b78d66c9d6&q=shredded%20chicken",
		success: function(r) {
			

					var output = ' ';
					$.each(r.results.slice(1,9), function(key, value){
						console.log(value.title);
						$("#app").append('<div class=col-md-4><p>' + value.title + '</p></div>');
			
						
					});
	
				}
	})
}


request();
</script>

</body>
</html>
