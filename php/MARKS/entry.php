<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
        <h1><u>Mark Entry</u></h1>
        <form action="" method="post">
        <table>
            <tr>
                <th colspan="2">Mark form<br></th>
            </tr>
            <tr>
                <td>Enter your roll no.</td>
                <td>
                    <select name="rollno">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </td>
            </tr>
            
            <tr>
                <td>Enter your marks: </td>
                <td><input type="number" name="marks"></td>
            </tr>
            <tr>
                <td colspan="2"><center><input type="submit" name="post" value="Enter"></center></td>
            </tr>
        </table>
    </form>
    </center>
<?php
    if(isset($_POST["post"]))
    {
        $r = $_POST["rollno"];
        $mark = $_POST["marks"];

        $conn = mysqli_connect("localhost","root","","exam");
        if(!$conn)
        {
            echo "connection failed";
        }
        else
        {
            $q = "UPDATE marks SET mark = '$mark' WHERE rollno = '$r';
";

            $query=mysqli_query($conn, $q);

            if($query)
            {
                echo "Data entered successfully";
            }
            else
            {
                echo "Failed";
            }
            mysqli_close($conn);
        }

    }

?>  
</body>
</html>