<?php 
//This is a comment in PHP//
#This is also a comment

/*
Multi line comment
*/ 

//This prints//
echo("Hello");
echo "World";

// Creating a variable
$variable =10;

//printing a variable
echo ($variable);

// Concat (puts strings together)//
$variable = $variable . "ten";
$variable .= "ten";

$array = array("Troy", "Tyler", "Mii", "Nathan");

echo ("" . $array [0] . " " . $array [1]. " " . $array [2]. " " . $array [3]. " " . $array [4]);

for($i = 0; $i < sizeof($array); $i++) {
    echo($array [$i]);
}

$i = 0;
while($i < 10) {
ECHO($ARRAY[$I]);
$i++;

}

//Creating a function

function myFunction($array) {
    echo(array[0]);
}

//Using a function

myFunction($array);

//Get a GET variable//

echo($_GET["userID"]);
echo($_POST["userID"]);

// Setting up MySQL //
$username = "<yourUsername>";
$password = "<yourPassword>";
$database = "<yourDatabase>";
$server = "localhost";

$connection = new mysqli($server, $username, $password, $database);

$query = $connection->prepare("Insert into contactList  (name, phoneNumber) VLAUES (?, ?)");

$query->bind_param("ss", 'nathan', '911'); 
   
$query->execute();

$query = $connection->prepare("SELECT (name, phoneNumber) FROM contactList");

$query->execute();

$result = $query -> get-result();

while($row = $result ->fetch_assoc()){

    echo($row['name']);
    echo($row['[phoneNumber']);
}

?>