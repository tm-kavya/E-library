<?php
  include 'includes/throwback-admin.php';
  include 'includes/database.php';  
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/view-admins.css" />
    <link rel="icon" href="images/ebook-icon.png" type="image/x-icon" />
    <title>View Admin Details</title>    
    </head>

    <body>
        <div class='container'>
        <h1>Admin Details</h1>
        <main>
        <?php
            $sql = "SELECT * FROM admin;";
            $result = mysqli_query($dbc,$sql);
            if(mysqli_num_rows($result) > 0)
            {
                echo "<table>
                        <thead>
                        <tr>
                            <th>S NO</th>
                            <th>NAME</th>
                            <th>PASSWORD</th>
                        </tr>
                        </thead>
                        <tbody>";
                        
                        $i = 0;
                        while($row = mysqli_fetch_assoc($result)){
                            $i++;
                            echo "<tr>
                                <td class='first'>$i</td>
                                <td class='second'>{$row['aname']}</td>
                                <td class='third'>{$row['apassword']}</td>";                            
                        }

                echo "</tbody>  
                </table>";
            }
            else{
                echo "<p class='not-found'>No Admins Found</p>";
            }
        ?>
        </main>
        </div>
        
    </body>

</html>