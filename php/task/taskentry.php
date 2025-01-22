<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task</title>
</head>
<body>
    <center>
        <form method="POST">
        <table>
            <tr>
                <th colspan="2"><center>Task entry</center></th>
            </tr>
            <tr>
                <th>
                    Task id: 
                </th>
                <td>
                    <input type="text" name="id" id="">
                </td>
            </tr>
            <tr>
                <th>
                    Task Name: 
                </th>
                <td>
                    <input type="text" name="name" id="">
                </td>
            </tr>
            <tr>
                <th>
                    Status:
                </th>
                <td>
                    <input type="text" name="status" id="">
                </td>
            </tr>
            <tr>
                <td colspan="2"><center><input type="submit" name="submit" value="Enter to Database"></center></td>
            </tr>

        </table>
        </form>
        <?php
            if(isset($_POST["submit"]))
            {
                $id = $_POST["id"];
                $name = $_POST["name"];
                $status = $_POST["status"];

                $conn = mysqli_connect('localhost','root','','tasks');

                if (!$conn)
                {
                    echo "coneection failed";
                }
                else
                {
                    $q = "SELECT * FROM task WHERE id = '$id'";
                    $query = mysqli_query($conn, $q);

                    if(mysqli_num_rows($query) > 0)
                    {
                        $q1 = "UPDATE task SET status='completed' WHERE id ='$id'";
                        $query1=mysqli_query($conn, $q1);
                        if($query1)
                        {
                            echo "Updated>>>";
                        }
                    }
                    elseif (mysqli_num_rows($query) == 0) 
                    {
                        $q2 = "INSERT INTO task (id,name,status) VALUES ('$id','$name','$status')";
                        $query2 = mysqli_query($conn, $q2);
                        if($query2)
                        {
                            echo "Inserted...";
                        }
                    }
                }
                mysqli_close($conn);
            }
        ?>
    <button><a href="taskdisplay.php">View Task list</a></button>
    </center>

    
</body>
</html>