<?php

$username = $_POST['nom'];

if (!empty($username)){/*  */
    $host = "buwd3fyvnjp7yxrdicdg-mysql.services.clever-cloud.com";
    $dbUsername = "u1dz0875bomnfbtp";
    $dbPass = "vhrLqaVInbn20dHDM3vi";
    $dbname = "buwd3fyvnjp7yxrdicdg";

    $connection=mysqli_connect($host,$dbUsername,$dbPass,$dbname);

    if (mysqli_connect_error()){
        die('connect Error ('.mysqli_connect_error().')'.mysqli_connect_error());

    }
    $Insertname="INSERT INTO test (nom) VALUES ('$username')";
    mysqli_query($connection, $Insertname) or die('Erreur SQL !'.$Insertname.'<br>'.mysqli_error($connection));
        echo('ok');

}
else{
    echo "champs vide";
    die();
}
?>