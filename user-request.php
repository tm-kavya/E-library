<?php
    include 'includes/database.php';
    include 'includes/throwback-user.php' ;
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>New Book Request</title>
    <link rel="stylesheet" href="css/user-request.css" />
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

        <h2>New Book Request</h2>

        <?php
            if(isset($_POST['submit'])){
                $sql = "INSERT INTO request (rid,uid,message,logs) VALUES
                (4,{$_SESSION['UID']},'{$_POST['message']}',now())";

                $result =  mysqli_query($dbc,$sql);

                echo '<p class="success">Request Sent</p>';
            }
        ?>

        <form action="user-request.php" method="post">

        <label for="message">Message</label>
          <textarea name="message" id="messsage" maxlength="150" required></textarea>

          <div class="container-button">
            <button type="submit" name="submit">Request Now</button>
          </div>

        </form>

      </div>
    </section>
    <script src="alert.js"></script>
  </body>
</html>
