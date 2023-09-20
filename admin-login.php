<?php
  session_start();           
  include "includes/database.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/admin-login.css" />
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
              <a href="user-registration.php">New User</a>
            </li>
            <li class="navigation">
              <a href="user-login.php">User Login</a>
            </li>
          </ul>
        </nav>
      </div>
    </header>

    <section class="form-section">
      <div class="login-form">
        <h2>Admin Login Here.</h2>
        <?php       
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          $sql = "SELECT * FROM admin WHERE aname='{$_POST["aname"]}'
          AND apassword='{$_POST["apassword"]}'; "; 
          
          $result = mysqli_query($dbc, $sql);
          
              if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_assoc($result);
                $_SESSION['ID'] = $row['aid'];
                $_SESSION['NAME'] = $row['aname'];
                header("Location: admin-home.php");
                
              }
              else{
                echo '<p class="error">Invalid User Details</p>';         
              }
          }

        ?>
        <form action="admin-login.php" method="post">
          <label for="name">Name</label>
          <input type="text" name="aname" id="name" value="" required />

          <label for="password">Password</label>
          <input type="password" name="apassword" value="" id="password" required/>

          <div class="container-button">
            <button type="submit"  name="submit">Login Now</button>
          </div>
        </form>
      </div>
    </section>
    <script src="alert.js"></script>
  </body>
</html>
