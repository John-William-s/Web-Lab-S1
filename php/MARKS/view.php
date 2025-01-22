<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
        <h1><u>Mark View</u></h1>

        <table border="1">
            <tr>
                <th colspan="3"><center>Marks Table</center></th>
            </tr>
            <tr>
                <th>Roll No.</th>
                <th>Name</th>
                <th>Mark</th>
            </tr>
            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'exam');

            if (!$conn) 
            {
                die('Connection failed successfully :' . mysqli_connect_error());
            } else 
            {
                $q = "SELECT * FROM marks";
                $query = mysqli_query($conn, $q);
                if(mysqli_num_rows($query) > 0)
                {
               while( $row = mysqli_fetch_assoc($query))
                    {
                        echo "<tr>
                                <td>".$row['rollno']."</td>
                                <td>".$row['name']."</td>
                                <td>".$row['mark']."</td></tr>";
                    }

                }
                else{
                    echo "<tr><td colspan='3'>No Data found</td></tr>";
                }
            }
            ?>
                
        </table>
    </center>
    
</body>
</html>