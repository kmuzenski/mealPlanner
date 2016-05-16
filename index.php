<?php require_once('session.php'); ?>

<!DOCTYPE html>
<html>
<head>
<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="assets/css/styles.css" rel="stylesheet" type="text/css">
</head>

<body>
<nav class="navbar navbar-default navbar-fixed-top">
        
    <div class="container">
        <div class="navbar-header">
          
        <button type="button" class="navbar-toggle btn-custom" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
              
        </div>
         
     <div id="navbar" class="collapse navbar-collapse">
            
        <ul class="nav navbar-nav">
        
        <li><a  href="index.php">Home</a></li>                                    
                            
    
        <?php
          if ($loggedin) {
            echo '<li>';
            echo '<a href="logout.php">';
            echo "Logout";
            echo '</a>';
            echo '</li>';
             
           } else {
            echo '<li>';
            echo '<a href="loginpage.php">';
            echo "Login";
            echo '</a>';
            echo '</li>';
            echo '<li>';
            echo '<a href="register.php">';
            echo "Register";
            echo '</a>';
            echo '</li>';
        } 
        ?>

 </nav>
 <br><br><br><br><br><br>


<p>This is where stuff goes</p>
<p>Welcome : <i><?php echo $_SESSION['username']; ?></i></p>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

</body>
</html>
