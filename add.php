<?php 
  if(isset($_POST['submit'])) {
    if(empty($_POST['email'])) {
      echo 'An Email is Required';
    } else {
      echo htmlspecialchars($_POST['email']);
    }
    
    if(empty($_POST['title'])) {
      echo 'A title is Required';
    } else {
      $email = $_POST['email'];
      echo $email;
      echo htmlspecialchars($_POST['title']);
    }
    
    if(empty($_POST['list'])) {
      echo 'At least one recipe is Required';
    } else {
      echo htmlspecialchars($_POST['list']);
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
      <form action="add.php" method="" class="white" 
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