<?php
    include "includes/database.php";
    include "includes/throwback-admin.php";
    function countRecord($dbc,$sql){
      $result = mysqli_query($dbc,$sql);
      return mysqli_num_rows($result);
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/admin-home.css" />
    <link rel="icon" href="images/ebook-icon.png" type="image/x-icon" />
    <title>Admin &bull; E-Library</title>
  </head>

  <body>
    <header class="container">
      <div class="slider-head">
        <div class="menu-bar">
          <hr class="menu" />
          <hr class="menu-slide" />
          <hr class="menu" />
          <hr class="menu-slide" />
          <hr class="menu" />
        </div>
        <section id="logo">
          <h1>E-Library</h1>
        </section>
      </div>
    </header>

    <div class="side-bar">
      <ul>
        <li class="menu-items">
          <a href="index.php">Home</a>
        </li>
        <hr class="bar" />

        <li class="menu-items">
          <a href="upload-books.php">Upload Books</a>
        </li>
        <hr class="bar" />

        <li class="menu-items">
          <a href="admin-change-password.php">Change Password</a>
        </li>
        <hr class="bar" />

        <li class="menu-items">
          <a href="includes/logout.php">Logout</a>
        </li>
        <li class="logged-in-as">
          <img src="images/account.png" alt="Logged-in-as" />
          <p class="admin-name"><?php echo $_SESSION['NAME']; ?></p>
        </li>
      </ul>
    </div>

    <main>
      <h2><?php echo "Welcome " . $_SESSION['NAME'] . "!"; ?></h2>
      <div class="grid-container">

        <section class="box">
          <div class="details admin-detail">
            <p class="total">Total Admins</p>
            <p class="number">
              <?php echo countRecord($dbc, 'SELECT * FROM admin;'); ?>
            </p>
          </div>
          <div class="view-details admin-link">
            <a href="view-admins.php" class="view">View Details</a>
            <a href="view-admins.php" class="arrow">&rsaquo;</a>
          </div>
        </section>

        <section class="box">
          <div class="details user-detail">
            <p class="total">Total Users</p>
            <p class="number">
              <?php echo countRecord($dbc, 'SELECT * FROM users;'); ?>
            </p>
          </div>
          <div class="view-details user-link">
            <a href="view-user-details.php" class="view">View Details</a>
            <a href="view-user-details.php" class="arrow">&rsaquo;</a>
          </div>
        </section>

        <section class="box">
          <div class="details book-detail">
            <p class="total">Total Books</p>
            <p class="number">
              <?php echo countRecord($dbc, 'SELECT * FROM book;'); ?>
            </p>
          </div>
          <div class="view-details book-link">
            <a href="view-books.php" class="view">View Details</a>
            <a href="view-books.php" class="arrow">&rsaquo;</a>
          </div>
        </section>

        <section class="box">
          <div class="details request-detail">
            <p class="total">Total Requests</p>
            <p class="number">
              <?php echo countRecord($dbc, 'SELECT * FROM request;'); ?>
            </p>
          </div>
          <div class="view-details request-link">
            <a href="view-request-details.php" class="view">View Details</a>
            <a href="view-request-details.php" class="arrow">&rsaquo;</a>
          </div>
        </section>

        <section class="box">
          <div class="details comment-detail">
            <p class="total">Total Comments</p>
            <p class="number">
              <?php echo countRecord($dbc, 'SELECT * FROM comment;'); ?>
            </p>
          </div>
          <div class="view-details comment-link">
            <a href="view-comments.php" class="view">View Details</a>
            <a href="view-comments.php" class="arrow">&rsaquo;</a>
          </div>
        </section>

      </div>
    </main>

    <script src="script.js"></script>
  </body>
</html>
