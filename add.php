<?php 
  if(isset($_POST['submit'])) {
    if(empty($_POST['email'])) {
      echo 'An Email is Required';
    } else {
      $email = $_POST['email'];
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Email must be a valid email address';
      }
    }
    
    if(empty($_POST['title'])) {
      echo 'A Recipe Name is Required';
    } else {
      $title = $_POST['title'];
      //Letters and spaces only
      if(!preg_match('/^[a-zA-Z\s]+$/', $title)) {
        echo 'Title must only contain letters';
      }
    }
    
    if(empty($_POST['list'])) {
      echo 'At least one ingredient is Required';
    } else {
      $ingredients = $_POST['list'];
      //Looking for a comma separated list
      if(!preg_match('/(^[a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
        echo 'Each ingredient must be separated by a comma';
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
        <input type="text" name="email">
        <label>Recipe Name</label>
        <input type="text" name="title">
        <label>Ingredients (comma separated):</label>
        <input type="text" name="list">
        <div class="center">
          <input type="submit" name="submit" value="submit" class="btn z-depth-0">
        </div>
      </form>
    </section>
  <?php include('templates/footer.php'); ?>

</html>