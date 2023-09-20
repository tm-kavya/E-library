<?php
  include 'includes/throwback-admin.php'; 
  include 'includes/database.php';
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/view-books.css" />
    <link rel="icon" href="images/ebook-icon.png" type="image/x-icon" />
    <title>View Book Details</title>    
    </head>

    <body>
        <div class='container'>
        <h1>Book Details</h1>
        <main>
        <?php
            $sql = "SELECT * FROM book;";
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
                                <td class='fourth'><a href={$row['bfile']} target='_blank'>View</a> </td>";                          
                        }

                echo "</tbody>  
                </table>";

            }
            else{
                echo "<p class='not-found'>No Books Found</p>";
            }
        ?>
        </main>
        </div>
        
    </body>

</html>