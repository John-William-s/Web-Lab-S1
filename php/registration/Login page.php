<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
    <h1>Login Page</h1>
    <form action="" method="post">
    <table>
        <tr>
            <th>Enter your Email: </th>
            <td><input type="text" name="email" required placeholder="Usernmae or email"></td>
        </tr>
        <tr>
            <th>Enter your Password</th>
            <td><input type="password" name="password" required placeholder="password"></td>
        </tr>
        <tr>
            <td colspan="2"><br><br><input type="submit" name="submit" value="Login"></td>
        </tr>
        <tr>
            <td colspan="2"><br><br>If you are not registered -> <a href="reg.php">Register here</a></td>
        </tr>
    </table>
    </form>
    </center>
    <?php
    session_start();
    if (isset($_POST['submit']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $conn = mysqli_connect('localhost','root','','William');
        if(!$conn)
        {
            die('Connection was aborted'. mysqli_connect_error());
        }
        else
        {
            $q = "SELECT * FROM register where email='$email' AND password='$password'";

            $query=mysqli_query($conn, $q);

            if(mysqli_num_rows($query)>0)
            {
                $row=mysqli_fetch_assoc($query);
                $_SESSION['name']= $row['name'];
                header('Location: welcome.php');
                exit();
            }
            else
            {
                echo 'Invalid Credentials';
            }
            mysqli_close($conn);
        }
    }
    ?>
</body>
</html>