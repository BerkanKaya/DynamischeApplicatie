<?php
    $id = $_GET['id'];
    $servername = "localhost";
    $username = "root";
    $password = "mysql";
    $dbname = "dynamisch";

try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch (PDOException $e){
    echo "connection failed" . $e->getMessage();
}
$query = $conn->prepare("SELECT * FROM characters WHERE id ='$id'");
$query->execute();
$result = $query->fetchall();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet"/>
</head>
<body>
<header><h1></h1>
    <a class="backbutton" href="index.php"><i class="fas fa-long-arrow-alt-left"></i> Terug</a></header>
<div id="container">
    <div class="detail">
        <div class="left">
           
            </div>
        </div>
        <div class="right">
        <?php
            foreach ($result as $naam){
        ?>

            <h1 style="position: absolute; top: 7px;  display: inline-block;"><?php echo $naam["name"]       ?> </h1>
            <img src="images/<?php echo $naam["avatar"] ?>"id="img" style="width: 100px; height: 100px; border-radius: 50%" >
            <div id="balk" style= "background-color: <?php echo $naam['color'] ?>">
            <?php
            echo  " &emsp;"."<i class=\"fas fa-heart\"></i>".$naam['health'] ." &emsp;"."<i class=\"fas fa-fist-raised\"></i>" . $naam['attack'] . " &emsp;"."<i class=\"fas fa-shield-alt\"></i>" . $naam['defense'] . "<br>" . "<br>" . $naam['weapon'] ."<br>" .   "<br>" .$naam['armor'];
        } ?>
        </div>
            <div>
                <p><?php echo $naam["bio"] ?></p>
            </div>
        </div>
        <div style="clear: both"></div>
    </div>
</div>
<footer>&copy; Berkan Kaya - 2020</footer>
</body>
</html>