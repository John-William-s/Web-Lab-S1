<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
    <h1>
        Factorial of a Number
    </h1>
    <br><br><br>
    <form action="" method="post">
        <h4>Enter the Number: <input type="number" name="num"></h4>

        <br><br>

        <input type="submit" name="submit" value="Get Answer">
    </form>
    </center>
    <?php
    
        function factorial($num)
        {
            if($num == 0)
            {
                return 1;
            }
            $fact = $num * factorial($num-1);

            return $fact;
        }
        
    if(isset($_POST["submit"]))
    {
        $num = $_POST["num"];
        $f = factorial($num);

        echo "<h3><center>The factorial of the number is ".$f."</h3></center>";
    } 
    ?>
    
</body>
</html>