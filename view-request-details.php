<?php
  include 'includes/throwback-admin.php';
  include 'includes/database.php';
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/view-request-details.css" />
    <link rel="icon" href="images/ebook-icon.png" type="image/x-icon" />
    <title>View Request Details</title>    
    </head>

    <body>
        <div class='container'>
        <h1>Request Details</h1>
        <section>
            <div class='status-container'>
                <form action='view-request-details.php' method='post'>
                <label>Status</label>
                <select name='status'>
                    <option value='all'>All</option>
                    <option value='completed'>Completed</option>
                    <option value='pending'>Pending</option>
                </select>                
                <button type="submit" name="submit">Go</button>
                </form>
                
            </div>
            
        </section>
            <main>
            <?php

            $sql = "SELECT users.id, request.rid, users.name, request.message, request.logs, request.rstatus FROM
            users INNER JOIN request on users.id= request.uid WHERE request.rstatus IN (0,1);";
            if(isset($_POST['submit'])){
                $option = $_POST['status'];
               if($option === 'pending'){
                    $sql = "SELECT users.id, request.rid, users.name, request.message, request.logs, request.rstatus FROM
                    users INNER JOIN request on users.id= request.uid WHERE request.rstatus=0";
                }
                else if($option === 'completed'){
                    $sql = "SELECT users.id, request.rid, users.name, request.message, request.logs, request.rstatus FROM
                    users INNER JOIN request on users.id= request.uid WHERE request.rstatus=1;";
                }
                else{
                    $sql = "SELECT users.id, request.rid, users.name, request.message, request.logs, request.rstatus FROM
                    users INNER JOIN request on users.id= request.uid WHERE request.rstatus IN (0,1);";
                }
                }
                $result = mysqli_query($dbc,$sql);
                if(mysqli_num_rows($result) > 0)
                {
                    echo "<table>
                            <thead>
                            <tr>
                                <th>S NO</th>
                                <th>USER ID</th>
                                <th>NAME</th>
                                <th>MESSAGE</th>
                                <th>REQUEST DATE</th>  
                                <th>STATUS</th>
                            </tr>
                            </thead>
                            <tbody>";
                            
                            $i = 0;
                            while($row = mysqli_fetch_assoc($result)){
                                $i++;
                                echo "<tr>
                                    <td class='first'>$i</td>
                                    <td class='second'>{$row['id']}</td>
                                    <td class='third'>{$row['name']}</td>
                                    <td class='fourth'>{$row['message']}</td>
                                    <td class='fifth'>{$row['logs']}</td>";
                                    
                                    if($row['rstatus'] == 0){
                                        echo "<td class='sixth'><a class='pending'
                href='includes/toggle-status.php?requestid={$row['rid']}&status={$row['rstatus']}'>
                                        Pending</a>";                                    
                                        echo "</td>";
                                    }
                                    
                                    else{
                                        echo "<td class='sixth'><a class='completed' 
                href='includes/toggle-status.php?requestid={$row['rid']}&status={$row['rstatus']}'>
                                        Completed</a>
                                        </td>";
                                    }
                            }

                    echo "</tbody>  
                    </table>";

                }
                else{
                    echo "<p class='not-found'>No Requests Found</p>";
                }
            
            ?>
        </main>
        </div>
        
    </body>

</html>