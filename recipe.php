<?php 
error_reporting(E_ALL);
require_once 'database.php';
require_once 'crud.php';
require_once 'session.php';
 
    if ( !empty($_POST)) {
         
        // keep track post values
      $name = $_POST['name'];
      $category_FK = $_POST['category_FK'];
      $description = $_POST['description'];
      $calories = $_POST['calories'];
      $cooktime = $_POST['cooktime'];
      $ingredients = $_POST['ingredients'];
      $instructions = $_POST['instructions'];
	
      $recipe = new recipeCrud($_SESSION['uid']);

      $response = $recipe->create($name,$category_FK,$description,$calories,$cooktime,$ingredients,$instructions);
  
      if ($response) {
          header("Location: update.php");
        } else {
          header("Location: update.php");
        }
}

?>

<!DOCTYPE html>
<html>

<?php require_once('header.php'); ?>

<body>

<?php require_once('nav.php'); ?>
<br><br><br><br><br><br>

<p>Welcome <i><?php echo $_SESSION['username']; ?></i></p>
<p>This is RECIPE</p>
<br><br><br><br><br><br>

<div class="container">
      <div class="span10 offset1">
        <div class="row">
          <h3>Please fill out all fields to create a recipe!</h3>
        </div>           
        
        <form class="form-horizontal" action="recipe.php" method="post"> 

          <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
            <label class="control-label">Name</label>
            <div class="controls">
              <input name="name" type="text" placeholder="name" value="<?php echo !empty($name)?$name:'';?>">
              <?php if (!empty($nameError)): ?>
                <span class="help-inline"><?php echo $nameError;?></span>
              <?php endif;?>
            </div>
          </div>
          <br><br><br>

	<?php
            try {
              $pdo = Database::connect();
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $sql = "SELECT `category`.`id`, `category`.`name` FROM `category` ORDER BY `name` ASC";
	     	  $cat = $pdo->query($sql);
              echo "<select name='category_FK'>";
              foreach ($cat as $row) {
                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
              }
              echo "</select>";
              Database::disconnect();
            } catch (PDOException $e) {
              echo $e->getMessage();
              Database::disconnect();
            }
          ?>

<br><br><br>
    

          <div class="control-group <?php echo !empty($descriptionError)?'error':'';?>">
            <label class="control-label">description</label>
            <div class="controls">
              <input name="description" type="text" placeholder="description" value="<?php echo !empty($description)?$description:'';?>">
              <?php if (!empty($descriptionError)): ?>
                <span class="help-inline"><?php echo $descriptionError;?></span>
              <?php endif;?>
            </div>
          </div>


          <div class="control-group <?php echo !empty($caloriesError)?'error':'';?>">
            <label class="control-label">calories</label>
            <div class="controls">
              <input name="calories" type="text" placeholder="calories" value="<?php echo !empty($calories)?$calories:'';?>">
              <?php if (!empty($caloriesError)): ?>
                <span class="help-inline"><?php echo $caloriesError;?></span>
              <?php endif;?>
            </div>
          </div>

           <div class="control-group <?php echo !empty($cooktimeError)?'error':'';?>">
            <label class="control-label">cooktime</label>
            <div class="controls">
              <input name="cooktime" type="text" placeholder="cooktime" value="<?php echo !empty($cooktime)?$cooktime:'';?>">
              <?php if (!empty($cooktimeError)): ?>
                <span class="help-inline"><?php echo $cooktimeError;?></span>
              <?php endif;?>
            </div>
          </div>

           <div class="control-group <?php echo !empty($ingredientsError)?'error':'';?>">
            <label class="control-label">ingredients</label>
            <div class="controls">
              <input name="ingredients" type="text" placeholder="ingredients" value="<?php echo !empty($ingredients)?$ingredients:'';?>">
              <?php if (!empty($ingredientsError)): ?>
                <span class="help-inline"><?php echo $ingredientsError;?></span>
              <?php endif;?>
            </div>
          </div>

           <div class="control-group <?php echo !empty($instructionsError)?'error':'';?>">
            <label class="control-label">instructions</label>
            <div class="controls">
              <input name="instructions" type="text" placeholder="instructions" value="<?php echo !empty($instructions)?$instructions:'';?>">
              <?php if (!empty($instructionsError)): ?>
                <span class="help-inline"><?php echo $instructionsError;?></span>
              <?php endif;?>
            </div>
          </div>


		<div class="form-actions">
            <button type="submit" class="btn btn-success">Add Recipe</button>
          </div>
        </form>
      </div>
    </div>




<?php require_once('footer.php'); ?>

</body>
</html>
