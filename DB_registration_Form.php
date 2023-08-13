<html>
<style>
    *{
        
        background-image: url(7.jpg);
        background-size: cover;
    }
    
    table {
        width: 800px;
        margin: auto;
        text-align: center;
        background-color: black;
        color: aqua;
        font-size: 25px;
        padding: 10px;
    }
    th{
        text-align: center;
        padding: 5px;
        font-size: 25px;
    }

    h2{
        text-align: center;
        font-size: 35px;
        color: white;
        text-decoration: underline;
    }
    td {
        text-align: center;
        padding: 5px;
        font-size: 18px;
    }

    h1 {
        text-align: center;
        font-size: 50px;
        text-decoration: underline;
    }

    button {
        font-size: 20px;
        background-color: black;
        padding: 5px;
        border-radius: 5px;
        width: 100px;
        text-align: center;
        display: inline;
    }

    a {
        color: white;
        text-decoration: none;
    }
</style>


<?php
        $host="localhost";
        $user="root";
        $password="";
        $db_name="first_web";
        $con=mysqli_connect($host,$user,$password,$db_name);
        if(!($con))
        {
            echo "<br>Connection can not establish<br>";
            die();
        }
        else
        {
            echo "<br> Connection established successfully<br>";
        }
if(isset($_POST['Insert']))
{
        $User_id=$_POST["id"];
        $User_Name=$_POST["Name"];
        $User_Dob=$_POST["DOB"];
        $State=$_POST["State"];
        $Gender=$_POST["Gender"];

        $sql="insert into registration_form_info(User_id,User_Name,Date_of_Birth,State,Gender)
        values('$User_id','$User_Name','$User_Dob','$State','$Gender')";

       $result=mysqli_query($con,$sql);
       if(!$result)
       {
        echo "<br>Data not inserted<br><br>";
       }
       else{
        echo "<br>Data inserted sucessfully<br><br>";
       }
}

if(isset($_POST['Delete']))
{
        $User_id=$_POST["id"];
        $User_Name=$_POST["Name"];
        $User_Dob=$_POST["DOB"];
        $State=$_POST["State"];
        $Gender=$_POST["Gender"];


        $sql="delete from registration_form_info where User_id='$User_id'";

       $result=mysqli_query($con,$sql);
       if(!$result)
       {
        echo "<br>Data not Deleted<br>";
       }
       else{
        echo "<br>Data Deleted sucessfully<br><br>";
       }
}

if(isset($_POST['Update']))
{
    $User_id=$_POST["id"];
    $User_Name=$_POST["Name"];
    $User_Dob=$_POST["DOB"];
    $State=$_POST["State"];
    $Gender=$_POST["Gender"];

    $sql="update registration_form_info set State='$State' where User_id='$User_id'";

    $result=mysqli_query($con,$sql);
    if(!$result)
    {
     echo "<br>Data not Updated<br>";
    }
    else{
     echo "<br>Data Updated sucessfully<br><br>";
    }

}

if(isset($_POST['Reset']))
{
    $User_id=$_POST["id"];
    $User_Name=$_POST["Name"];
    $User_Dob=$_POST["DOB"];
    $State=$_POST["State"];
    $Gender=$_POST["Gender"];
    
    $User_id=" ";
    $User_Name=" ";
    $User_Dob=" ";
    $State=" ";
    $Gender=" ";
}

if(isset($_POST['Show']))
$con=mysqli_connect("localhost","root","","first_web");
$sql="select * from registration_form_info";

$result=mysqli_query($con,$sql);
echo "<button><a href='index.html'>Home</a></button>";
echo "<table border='2'>";
echo "<h2>User Details</h2>";
echo "<tr><th> Userid </th> <th> UserName </th><th> DOB </th><th> State </th><th> Gender </th>";
while($contact=mysqli_fetch_array($result))
{
    echo"<tr><td>";
    echo $contact[0];
    echo"</td><td>";    
    echo $contact[1];
    echo"</td><td>";
    echo $contact[2];
    echo"</td><td>";
    echo $contact[3];
    echo"</td><td>";
    echo $contact[4];
    echo"</td></tr>";
}
    echo"</table>";
?>

