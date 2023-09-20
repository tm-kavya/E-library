<?php
    
    include 'includes/database.php';
    include 'includes/throwback-user.php' ;
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Post Comments</title>
    <link rel="stylesheet" href="css/user-comments.css" />
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

    <main>
        <?php
       
       if(isset($_GET['id']) && is_numeric($_GET['id'])){ 
        
           
            $sql = "SELECT * FROM book WHERE bid={$_GET['id']}";
            $result = mysqli_query($dbc,$sql);
            $row = mysqli_fetch_assoc($result);
            if(mysqli_num_rows($result) > 0)
            {
              echo "<table>
                      <tr class='first'>
                      <th class='first'>BOOK NAME</th>
                      <td class='second'>{$row['btitle']}</td>
                      </tr>
                      <tr>
                      <th class='third'>KEYWORDS</th>
                      <td class='fourth'>{$row['keywords']}</td>
                      </tr>
                    </table>";
            }
       }  
        ?>
        </main>
        <section class="login-form">

            <h2>Post Comment Here.</h2>
            <?php
            if(isset($_POST['submit']) && is_numeric($_GET['id'])){
            $check = "SELECT * FROM book WHERE bid={$_GET['id']}";
            $count = mysqli_num_rows(mysqli_query($dbc,$check));

                if($count===1)
                {
                    $sql_query = "INSERT INTO comment (cid,bid, uid, comments, logs) VALUES
                    (6,{$_GET['id']}, {$_SESSION["UID"]}, '{$_POST['comment']}', now())";
                    mysqli_query($dbc,$sql_query);
                    echo "<p class='success'>Comment Posted</p>";
                }
            }
            ?>

            <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">

                <label for="comment">Comment</label>
                <input type="text" name="comment" id="comment" maxlength="150" required />

                <div class="container-button">
                <button type="submit" name="submit">Post Now</button>
                </div>

            </form>
        </section>
        <main>
          <?php
          if(isset($_GET['id'])  && is_numeric($_GET['id'])){
            $check = "SELECT * FROM book WHERE bid={$_GET['id']}";
            $count = mysqli_num_rows(mysqli_query($dbc,$check));
            if($count===1)
            {
                    $query = "SELECT users.name, comment.comments, comment.logs from comment inner join
                    users on comment.uid=users.id WHERE comment.bid={$_GET['id']} order by comment.cid desc";
                    $run = mysqli_query($dbc,$query);

                      if(mysqli_num_rows($run) > 0){
                          
                            while($fetch = mysqli_fetch_assoc($run)){
                              echo "
                              <section class='comment-container'>
                              <div class='name-date'>
                                <strong>{$fetch['name']}</strong>
                                {$fetch['logs']}
                              </div>
                              <p class='comment'>{$fetch['comments']}</p>
                              </section>";
                            }  
                      }
                      else{
                        echo "<p class='not-found'>No Comments Yet</p>";
                    }
            }   
          }
          ?>
        </main>
        <script src="alert.js"></script>
  </body>
</html>
