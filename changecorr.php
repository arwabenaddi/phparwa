
<?php

$host = 'localhost';
$dbUsername = 'root';
$dbPass = '';
$dbname = 'buwd3fyvnjp7yxrdicdg';

 $connection=mysqli_connect($host,$dbUsername,$dbPass,$dbname);
if (mysqli_connect_error()){
    die('connect Error ('.mysqli_connect_error().')'.mysqli_connect_error());
}


// Temporary variable, used to store current query
$templine = '';
// Read in entire file
$filename = 'db.sql';
//  $contents = file_get_contents('db.sql'); 
//  $contents = str_replace(' ','',$contents);

// $lines = str_replace(CHR(13).CHR(10),"",$contents);

 $lines = file($filename);
// Loop through each line
foreach ($lines as $line)
{
// Skip it if it's a comment
// || $line == str_replace(CHR(13).CHR(10),"",$line) 
if (substr($line,0,2) == '--' || $line == '' )
    continue;

// Add this line to the current segment
$templine = $line;

// If it has a semicolon at the end, it's the end of the query
if (substr(trim($line), -1, 1) == ';')
{
    // $line = str_replace(CHR(13).CHR(10),"",$line);
    // Perform the query
    // $insertfile = "INSERT INTO db VALUES ($templine)";
    mysqli_query($connection,$templine) or die('Erreur insertion file'.$templine.'<br>'.mysqli_error($connection));
    // Reset temp variable to empty
    $templine = '';
}
}
 echo "Tables imported successfully";
?>
