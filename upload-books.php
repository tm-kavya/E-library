<?php
    include 'includes/throwback-admin.php';
    include 'includes/database.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Upload Books</title>
    <link rel="stylesheet" href="css/upload-books.css" />
    <link rel="icon" href="images/ebook-icon.png" type="image/x-icon" />
  </head>
  <body>
    <header>
      <div class="container">
        <section id="logo">
          <h1>E-Library</h1>
        </section>
    </header>

    <section class="form-section">
      <div class="login-form">
        <h2>Upload Book Here.</h2>

        <?php
            if(isset($_POST["submit"])){
                //print_r($_FILES['upload']);
                
                $file_name = $_FILES['upload']['name'];
                $file_tmp = $_FILES['upload']['tmp_name'];
                $get_extension = explode('.',$file_name);
                $file_extension = strtolower(end($get_extension));

                if($file_extension == 'pdf'){

                  $btitle = $_POST['title'];
                  $keywords = $_POST['keyword'];
                  $file = str_replace(' ','%20',$file_name);
                  
                  echo $sql = "INSERT INTO book (bid,btitle,keywords,bfile) VALUES
                    ('7','$btitle','$keywords','uploads/$file')";

                  mysqli_query($dbc,$sql);

                  if(move_uploaded_file($file_tmp, "uploads/".$file_name)){
                      
                      echo "<p class='success'>File Uploaded Successfully</p>";
                  }
                  else{
                      echo "<p class='error'>Failed to Upload</p>";
                  }
            }
          }
        ?>
        <form action="upload-books.php" method="post" enctype="multipart/form-data">
          <label for="book-title">Book Title</label>
          <input type="text" name="title" id="book-title" required />

          <label for="book-keyword">Keywords</label>
          <textarea name="keyword" id="book-keyword" maxlength="150" srequired></textarea>

          <label for="upload-file">Upload</label>
          <input type="file" name="upload" id="upload-file" required />
          <div class="container-button">
            <button type="submit" name="submit">Upload Book</button>
          </div>
        </form>
      </div>
    </section>
    <script src="alert.js"></script>
  </body>
</html>

