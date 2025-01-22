<html>
    <head>
        <center><h1>Mark entry</h1></center>
    </head>
    <form action="" method=POST>
        <select name="valuetopass">
            <option>select</option>
            <?php
                $server='localhost';
                $username='root';
                $password='';
                $db='login';
                $conn='';

                $conn=mysqli_connect($server,$username,$password,$db);
                if($conn){
                    echo "connected";
                    $q="SELECT namereg FROM  entry";
                    $query=mysqli_query($conn,$q);
                    while($row = mysqli_fetch_assoc($query)){
                        foreach ($row as $key => $value) {
                            echo "<option value=$value>$value</option>";
                        }                    
                    }
                }
                else{
                    echo "not connected";
                }
            ?>
        </select>
        <center>
            <label>SUBJECT CODE</label>
            <input type="number" name="sub"><br><br><br><br>
            <label>INTERNAL MARK</label>
            <input type="number" name="num" max=40><br><br><br><br>
            <label>EXTERNAL MARK</label>
            <input type="number" name="exnum" max=60><br><br><br><br>
            <input type="submit" name="submit">

            <?php
                if(isset($_POST['submit'])){
                    $valuename=$_POST['valuetopass'];
                    $subject=$_POST['sub'];
                    $internal=$_POST['num'];
                    $external=$_POST['exnum'];
                    $total=$internal+$external;

                    if($total>90){
                        $grade="S";
                    }
                    else if($total>80){
                        $grade="A";
                    }
                    else if($total>70){
                        $grade="B";
                    }
                    else{
                        $grade="F";
                    }
                    $q="UPDATE entry SET subjectcode='$subject', internal='$internal', external='$external', totalmark='$total', grade='$grade' WHERE namereg='$valuename'";
                    $query=mysqli_query($conn,$q);
                    if($query){
                        echo "Successfull entry";
                    }
                    else{
                        echo "failed";
                    }

                }
            ?>

        </center>
    </form>
</html>