<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <th colspan="3"><center><u>Tasklist</u></center></th>
        </tr>
        <tr>
            <th>
                Task Id
            </th>
            <th>
                Task name
            </th>
            <th>
                Status
            </th>
        </tr>
        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'tasks');

        if (!$conn) {
            echo "coneection failed";
        } else 
        {
            $q = "SELECT * FROM task";
            $result = mysqli_query($conn, $q);

            if(mysqli_num_rows($result) > 0)
            {
               while($row = mysqli_fetch_assoc($result))
               {
                echo "<tr><td>".$row['id']."</td>
                    <td>".$row['name']."</td>
                    <td>".$row['status']."</td></tr>";

               }
            }
        }
        mysqli_close($conn);
        ?>
    </table>
    
</body>
</html>