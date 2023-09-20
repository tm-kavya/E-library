<?php
    include 'includes/database.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>New User Registration</title>
    <link rel="stylesheet" href="css/user-registration.css" />
    <link rel="icon" href="images/ebook-icon.png" type="image/x-icon" />
  </head>
  <body>
    <header>
      <div class="container">
        <section id="logo">
          <h1>E-Library</h1>
        </section>
        <nav>
          <ul>
            <li class="navigation">
              <a href="index.php">Home</a>
            </li>
            <li class="navigation">
              <a href="user-login.php">User Login</a>
            </li>
            <li class="navigation">
              <a href="admin-login.php">Admin Login</a>
            </li>
          </ul>
        </nav>
      </div>
    </header>

    <section class="form-section">
      <div class="login-form">
        <h2>User Registration Here.</h2>

        <?php
            if(isset($_POST['submit'])){
              
              $check = "SELECT * FROM users WHERE name='{$_POST['name']}'";
              $row = mysqli_query($dbc,$check);

              if(mysqli_num_rows($row) > 0){
                  echo "<p class='error'>User Already Exists</p>";
              }
              else{ 

                  $username = trim($_POST['name']);
                  $password = trim($_POST['password']);

                  $sql = "INSERT INTO users (name,upassword,mail) VALUES 
                  ( '$username','$password','{$_POST['mail']}')";
                  
                  mysqli_query($dbc,$sql);
                  
                  echo "<p class='success'>User Added Successfully</p>";
              }
            }
           
        ?>

        <form action="user-registration.php" method="post">
          <label for="name">Name</label>
          <input type="text" name="name" id="name" required />

          <label for="password">Password</label>
          <input type="password" name="password" id="password" required />

          <label for="mail">E-mail</label>
          <input type="email" name="mail" id="mail" required />
          <div class="container-button">
            <button type="submit" name="submit">Login Now</button>
          </div>
        </form>
      </div>
    </section>
    <script src="alert.js"></script>
  </body>
</html>
