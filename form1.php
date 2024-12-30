<?php
$connection=mysqli_connect("localhost","root","","form");
if(!$connection)
{
    die("Connection failed: " . mysqli_connect_error());
}
else
{
    echo "Connected successfully";
}
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $age=$_POST['age'];
    $stmt = $connection->prepare("INSERT INTO formdata (name, email, age) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $name, $email, $age);

    if ($stmt->execute()) {
        echo "Data inserted successfully<br>";
    } else {
        echo "Data not inserted. Error: " . $stmt->error;
    }

    $stmt->close();
}

mysqli_close($connection);

?>