<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <center>
    <h1><u>Registration form</u></h1><br><br>

    <div id="form">
        <form action="" method="post">
        <table>
            <tr>
                <th>Enter your Name: </th>
                <td>
                    <input type = 'text' name="name" placeholder="Enter your name" required>
                </td>
            </tr>
            <tr>
                <th>Enter your Email: </th>
                <td>
                    <input type="text" name="email" placeholder="Enter email" required>
                </td>
            </tr>
            <tr>
                <th>Enter password: </th>
                <td>
                    <input type="password" name="password"  placeholder="Enter pssword" required>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <br><center><input type="submit" name="login" value="Register"></center>
                </td>
            </tr>
            <tr>
                <td colspan="2"><br><br>If you are alredy registered -> <a href='Login page.php'>Login</a></td>
            </tr>

        </table>
    </form>
    </div>
        
    </center>
    <?php
    if(isset($_POST['login']))
    {
        $name = $_POST['name'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        $conn = mysqli_connect('localhost','root','','William');

        if(!$conn)
        {
            die('Connection failed successfully :'.mysqli_connect_error());
        }
        else{
            $q = "INSERT INTO register(name, email, password) VALUES ('$name', '$email', '$password')";
            $query = mysqli_query($conn, $q);
        }
        if($query)
        {
            echo "Executed Succensfully";
        }
        else
        {
            echo "Error";   
        }
        mysqli_close($conn);
    }
    ?>
</body>
</html>