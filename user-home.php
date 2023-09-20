<?php
    include "includes/database.php";
    include 'includes/throwback-user.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/user-home.css" />
    <link rel="icon" href="images/ebook-icon.png" type="image/x-icon" />
    <title><?php echo $_SESSION['UNAME']; ?> &bull; E-Library</title>
  </head>

  <body>
    <div class="container">
      
        <div class="slider-head">
            <div class="menu-bar">
              <hr class="menu" />
              <hr class="menu-slide" />
              <hr class="menu" />
              <hr class="menu-slide" />
              <hr class="menu" />
            </div>   
            <section>
              <h1>E-Library</h1>
            </section>
        </div> 
      
          <section>
            <p class='profile'><?php echo "Welcome " . $_SESSION['UNAME'] . "!"; ?></p>
          </section>

    </div>

    <div class="side-bar">
      <ul>
        <li class="menu-items">
          <a href="index.php">Home</a>
        </li>
        <hr class="bar" />

        <!-- <li class="menu-items">
          <a href="search-books.php">Search Books</a>
        </li>
        <hr class="bar" /> -->

        <li class="menu-items">
          <a href="user-request.php">Request</a>
        </li>
        <hr class="bar" />
        <li class="menu-items">
          <a href="user-change-password.php">Change Password</a>
        </li>
        <hr class="bar" />
        <li class="menu-items">
          <a href="includes/logout.php">Logout</a>
        </li>
        <li class="logged-in-as">
          <img src="images/account.png" alt="Logged-in-as" />
          <p class="admin-name"><?php echo $_SESSION['UNAME']; ?></p>
        </li>
      </ul>
    </div>
    
    <section class="login-form">
   
    <h2>Search Book Here.</h2>

    <form action="user-home.php" method="post">

        <label for="book-search">Enter book name or keywords</label>
        <input type="text" name="book-search" id="book-search" maxlength="150" required />

        <div class="container-button">
        <button type="submit" name="submit">Search Now</button>
        </div>

    </form>
    </section>
    <main>
     
      <?php
        if(isset($_POST['submit'])){

            $sql = "SELECT * FROM book WHERE btitle LIKE '%{$_POST['book-search']}%' OR 
            keywords LIKE '%{$_POST['book-search']}%'";

            $result = mysqli_query($dbc,$sql);

                if(mysqli_num_rows($result) > 0)
                {
                  echo "<table>
                          <thead>
                          <tr>
                              <th>S NO</th>
                              <th>BOOK TITLE</th>
                              <th>KEYWORDS</th>
                              <th>VIEW</th>
                              <th>COMMENT</th>
                          </tr>
                          </thead>
                          <tbody>";
                          
                          $i = 0;
                          while($row = mysqli_fetch_assoc($result)){
                              $i++;
                              echo "<tr>
                                  <td class='first'>$i</td>
                                  <td class='second'>{$row['btitle']}</td>
                                  <td class='third'>{$row['keywords']}</td>
                                  <td class='fourth'><a href={$row['bfile']} target='_blank'>View</a> </td>
                                  <td class='fifth'>                             
                                  <a href='user-comments.php?id={$row['bid']}'>Go</a>
                                  </td>";                          
                          }

                  echo "</tbody>  
                  </table>";

                }
                else{
                    echo "<p class='not-found'>No Books Found</p>";
                }
        }
        else{
          
          $sql = "SELECT * FROM book";

          $result = mysqli_query($dbc,$sql);

              if(mysqli_num_rows($result) > 0)
              {
                echo "<table>
                        <thead>
                        <tr>
                            <th>S NO</th>
                            <th>BOOK TITLE</th>
                            <th>KEYWORDS</th>
                            <th>VIEW</th>
                            <th>COMMENT</th>
                        </tr>
                        </thead>
                        <tbody>";
                        
                        $i = 0;
                        while($row = mysqli_fetch_assoc($result)){
                            $i++;
                            echo "<tr>
                                <td class='first'>$i</td>
                                <td class='second'>{$row['btitle']}</td>
                                <td class='third'>{$row['keywords']}</td>
                                <td class='fourth'><a href={$row['bfile']} target='_blank'>View</a> </td>
                                <td class='fifth'>                             
                                <a href='user-comments.php?id={$row['bid']}'>Go</a>
                                </td>";                          
                        }

                echo "</tbody>  
                </table>";

              }
        }
        ?>
    </main>

    <script src="script.js"></script>
  </body>
</html>
