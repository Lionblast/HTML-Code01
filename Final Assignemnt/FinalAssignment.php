<html>


<?php 

    $username = "ethan";
    $password = "password";
    $database = "Reviews";
    $server = "localhost";

    $connection = new mysqli($server, $username, $password, $database);
    ?>

<Head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="Assignment-1.js"></script>

    <link rel="stylesheet" type="text/css" href="FinalAssignment.css">

</Head>

<div id="blue" class="container">
    <div id="red" class="row">
        <h3> Submit Your Product Review </h3>
    </div>
    <div id="red2" class="row">
        <div id="miniRed" class="collum">
            <form action="/Finalassignment.php" method="post">
                <h4>Contact me </h4> <br>
                First name:<br>
                <input type="text" name="firstname"> <br>
                Last name <br>
                <input type="text" name="lastname"> <br>
                E-mail address <br>
                <input type="text" name="email"> <br>
                Message <br>
                <textarea rows="4" cols="40">

                  </textarea>
                <div id="enterButton" class="collum"></div>
                <input type="submit" value="Submit">
        </div>
        </form>
    </div>
    <div id="tablediv" class="row">
        <h2> Past Reviews </h2>
        <table class="response">
            <tr>
                <thread>
                    <th scope="col">Name</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Phone Number </th>
                    <th scope="col">Review</th>
                </thread>
            </tr>
        </table>
        <tbody>
            <?php

                $query = $connection->prepare("SELECT * FROM reviewList");

                $result = $query->get_result();

                while ($row = $result->fetch_assoc()) {
                    echo("<tr><th scope='row'>" . $row['name'] . "</th>");
                    echo("<th>" . $row['email'] . "</th>");
                    echo("<th>" . $row['review'] . "</th></tr>");

                }
                ?>
        </tbody>
    </div>
</div>
</div>

</html>
<?php 

$name = NULL;
$email = NULL;
$phoneNumber = NULL;
$review = NULL;


if (isset($_POST['name'])){
    $name = $_POST['name'];
}
if(isset($_POST['email'])){
    $email = $_POST['email'];
}
if(isset($_POST['phoneNumber'])){
    $phoneNumber = $_POST['phoneNumber'];
}
if(isset($_POST['review'])){
    $review = $_POST['review'];
}


if($name && $email && $phoneNumber && $review) {
    $query = $connection->prepare("INSERT INTO Reviews (name, email, phoneNumber, review) VALUES (?, ?, ?, ?)");
    $query->bind_param('sss', $name, $email, $phoneNumber, $review);
    $query->execute();
    $result = $query->get_result();

    $connection->close();

    header('Location;FinalAssignmen.php');
};

$connection->close();
?>