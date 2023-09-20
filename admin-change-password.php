<?php
    include 'includes/throwback-admin.php';
    include 'includes/database.php';    
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Admin Change Password</title>
    <link rel="stylesheet" href="css/admin-change-password.css" />
    <link rel="icon" href="images/ebook-icon.png" type="image/x-icon" />
  </head>
  <body>

    <header>
      <div class="container">
        <section>
          <h1>E-Library</h1>
        </section>
      </div>
    </header>

    <section class="form-section">
      <div class="login-form">

        <h2>Change Password Here.</h2>

        <?php
            if(isset($_POST['submit'])){
                 $sql = "SELECT * FROM admin WHERE apassword='{$_POST["old"]}'
                 AND aid='{$_SESSION["ID"]}';";

                 $result =  mysqli_query($dbc,$sql);

                 if(mysqli_num_rows($result) > 0){
                    $update = "UPDATE admin SET apassword='{$_POST["new"]}'
                    WHERE aid=".$_SESSION['ID'].";";
                    mysqli_query($dbc,$update);
                    echo "<p class='success'>Password Changed Successfully</p>";
                 }
                 else{
                  echo "<p class='error'>Invalid Password</p>";
                 }
            }
        ?>

        <form action="admin-change-password.php" method="post">

          <label for="old-password">Old password</label>
          <input type="password" name="old" id="old-password" required />

          <label for="new-password">New password</label>
          <input type="password" name="new" id="new-password" required />

          <div class="container-button">
            <button type="submit" name="submit">Change Now</button>
          </div>

        </form>

      </div>
    </section>
    <script src="alert.js"></script>
  </body>
</html>
