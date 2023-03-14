<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet"> -->
    <style>
        body{
            background-color: whitesmoke; 
            font-family: 'Tajawal', sans-serif;
        }
        #mother{
            width: 100%;
            font-size: 20px;
        }
        main{
            float:left;
            border: 1px solid gray;
            padding: 5px;
        }
        input{
            padding: 4px;
            border: 2px solid black;
            text-align: center;
            font-size: 17px;
            font-family: 'Tajawal', sans-serif;
        }
        aside{
            text-align: center;
            width: 300px;
            float: right;
            border:1px solid black;
            padding: 10px;
            font-size: 20px;
            background-color:silver;
            color: white;
        }
        #tbl{
            width: 890px;
            font-size: 20px;
            text-align: center;
        }
        #tbl:hover{
            color: red;
            background-color: white;
        }
        #tbl th{
            background-color: silver;
            color: black;
            font-size: 20px;
            padding: 10px;
        }
        aside button{
            width: 190px;
            padding: 8px;
            margin-top: 10px;
            font-size: 17px;
            font-family: 'Tajawal', sans-serif;
            font-weight: bold;
        }
    </style>
</head>
<body dir="rtl">
    <?php 
    $dsn='localhost';
    $user='root';
    $pass='';
    $ndb='students';
    //$option=array(PDO::MYSQL_ATTR_INIT_COMMAND =>  "SET NAMES 'UTF8'");
    $db=mysqli_connect($dsn,$user,$pass,$ndb);
    $res=mysqli_query($db,"select * from student");
    $id='';
    $name='';
    $address='';
    if(isset($_POST['id'])){
        $id=$_POST['id'];
    }
    if(isset($_POST['name'])){
        $name=$_POST['name'];
    }
    if(isset($_POST['address'])){
        $address=$_POST['address'];
    }
    $sql='';
    if(isset($_POST['add'])){
        $sql="insert into student value($id,'$name','$address')";
      mysqli_query($db,$sql);
        header("location: Home.php");

    }
    if(isset($_POST['del'])){
        $sql="delete from student where name='$name'";
        mysqli_query($db,$sql);
        header("location: Home.php");
    }
    ?>
    <div id="mother">
        <form method="POST">
            <aside>
                <div id="div">
                   <img src="login-lady.png"alt="لوجو الموقع" width="200px"> 
                   <h3>لوحة المدير</h3>
                   <label>رقم الطالب:</label><br>
                   <input type="text" name="id" id="id"><br>
                   <label>اسم الطالب:</label><br>
                   <input type="text" name="name" id="name"><br>
                   <label>عنوان الطالب:</label><br>
                   <input type="text" name="address" id="address"><br> 
                   <button name="add">اضافة طالب</button>
                   <button name="del">حذف الطالب</button><br>          
                </div>
            </aside>
            <main>
                <table id="tbl">
                    <tr>
                        <th>الرقم التسلسلى</th>
                        <th>اسم الطالب</th>
                        <th>عنوان الطالب</th>
                    </tr>
                    <?php 
                    while($row= mysqli_fetch_array($res)){
                        echo"<tr>";
                        echo"<td>".$row['id']."</td>";
                        echo"<td>".$row['name']."</td>";
                        echo"<td>".$row['address']."</td>";
                        echo"</tr>";
                    }
                    ?>
                </table>

            </main>
        </form>
    </div>
</body>
</html>