<?php
    include 'includes/database.php';
    include 'includes/throwback-user.php';
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title><?php echo $_SESSION['UNAME']; ?> &bull; Change Password</title>
    <link rel="stylesheet" href="css/user-change-password.css" />
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
                 $sql = "SELECT * FROM users WHERE upassword='{$_POST["old"]}'
                 AND id='{$_SESSION["UID"]}';";

                 $result =  mysqli_query($dbc,$sql);

                 if(mysqli_num_rows($result) > 0){

                    $update = "UPDATE users SET upassword='{$_POST["new"]}'
                    WHERE id=".$_SESSION['UID'].";";
                    mysqli_query($dbc,$update);

                    echo '<p class="success">Password Changed Successfully</p>';
                 }
                 else{
                  echo '<p class="error">Invalid Password</p>';
                 }
            }
        ?>

        <form action="user-change-password.php" method="post">

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
