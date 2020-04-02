<?php 
//Form Init
$title = '';
$email = '';
$ingredients = '';

//validation

$errors = array('email'=>'', 'title'=>'', 'ingredients'=>'');
  if(isset($_POST['submit'])) {
    if(empty($_POST['email'])) {
      $errors['email'] = 'An Email is Required';
    } else {
      $email = $_POST['email'];
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] ='Email must be a valid email address';
      }
    }
    
    if(empty($_POST['title'])) {
      $errors['title'] = 'A Recipe Name is Required';
    } else {
      $title = $_POST['title'];
      //Letters and spaces only
      if(!preg_match('/^[a-zA-Z\s]+$/', $title)) {
        $errors['title'] ='Title must only contain letters';
      }
    }
    
    if(empty($_POST['list'])) {
      $erors['ingredients'] = 'At least one ingredient is Required';
    } else {
      $ingredients = $_POST['list'];
      //Looking for a comma separated list
      if(!preg_match('/(^[a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
        $erors['ingredients'] = 'Each ingredient must be separated by a comma';
      }
    }
  }
?>

<!DOCTYPE html>
<html>
 
  <?php include('templates/header.php'); ?>
    <section class="container grey-text">
      <h4 class="center">
        Add a Post
      </h4>
      <form action="add.php" method="post" class="white" 
        style="padding: 2rem 14rem; 
          margin: 2rem 0">
        <label>Your Email</label>
        <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
        <p class="red-text">
          <?php echo $errors['email'] ?>
        </p>

        <label>Recipe Name</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
        <p class="red-text">
          <?php echo $errors['title'] ?>
        </p>

        <label>Ingredients (comma separated):</label>
        <input type="text" name="list" value="<?php echo htmlspecialchars($ingredients) ?>">
        <p class="red-text">
          <?php echo $errors['ingredients'] ?>
        </p>
        
        <div class="center">
          <input type="submit" name="submit" value="submit" class="btn z-depth-0">
        </div>
      </form>
    </section>
  <?php include('templates/footer.php'); ?>

</html>