<?php
  include 'includes/throwback-admin.php';    
  include 'includes/database.php';
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/view-comments.css" />
    <link rel="icon" href="images/ebook-icon.png" type="image/x-icon" />
    <title>View Comment Details</title>    
    </head>

    <body>
        <div class='container'>
        <h1>Comment Details</h1>
        <main>
        <?php
            $sql = "SELECT book.bid, book.btitle, users.id, users.name, comment.comments, comment.logs from
             comment INNER JOIN book on book.bid = comment.bid INNER JOIN users on users.id = comment.uid;";
            $result = mysqli_query($dbc,$sql);
            if(mysqli_num_rows($result) > 0)
            {
                echo "<table>
                        <thead>
                        <tr>
                            <th>S NO</th>
                            <th>BOOK ID</th>
                            <th>BOOK TITLE</th>
                            <th>USER ID</th>
                            <th>USER NAME</th>
                            <th>COMMENTS</th>
                            <th>COMMENT DATE</th>
                        </tr>
                        </thead>
                        <tbody>";
                        
                        $i = 0;
                        while($row = mysqli_fetch_assoc($result)){
                            $i++;
                            echo "<tr>
                                <td class='first'>$i</td>
                                <td class='second'>{$row['bid']}</td>
                                <td class='third'>{$row['btitle']}</td>
                                <td class='fourth'>{$row['id']}</td>
                                <td class='fifth'>{$row['name']}</td>                            
                                <td class='sixth'>{$row['comments']}</td>                            
                                <td class='seventh'>{$row['logs']}</td>";                            
                        }

                echo "</tbody>  
                </table>";
            }
            else{
                echo "<p class='not-found'>No Comments Found</p>";
            }
        ?>
        </main>
        </div>
        
    </body>

</html>