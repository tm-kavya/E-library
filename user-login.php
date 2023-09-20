<?php
    session_start();
    include 'includes/database.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>User Login</title>
    <link rel="stylesheet" href="css/user-login.css" />
    <link rel="icon" href="images/ebook-icon.png" type="image/x-icon" />
  </head>
  <body>
    <header>
      <div class="container">
        <section>
          <h1>E-Library</h1>
        </section>
        <nav>
          <ul>
            <li class="navigation">
              <a href="index.php">Home</a>
            </li>
            <li class="navigation">
              <a href="user-registration.php">New User</a>
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
        <h2>User Login Here.</h2>
     
        <?php       
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          $sql = "SELECT * FROM users WHERE name='{$_POST["name"]}'
          AND upassword='{$_POST["password"]}'; "; 
          
          $result = mysqli_query($dbc, $sql);
          
              if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_assoc($result);
                $_SESSION['UID'] = $row['id'];
                $_SESSION['UNAME'] = $row['name'];
                header("Location: user-home.php");
              }
              else{
                echo '<p class="error">Invalid User Details</p>';         
              }
          }

        ?>

        <form action="user-login.php" method="post">
          <label for="name">Name</label>
          <input type="text" name="name" id="name" required />

          <label for="password">Password</label>
          <input type="password" name="password" id="password" required />

          <div class="container-button">
            <button type="submit" name="submit">Login Now</button>
          </div>
        </form>
      </div>
    </section>
    <script src="alert.js"></script>
  </body>
</html>
