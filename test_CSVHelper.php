<?php
include 'CSVHelper.php';

$example = new CSVHelper();

$file = 'CSVContent.csv';
print_r("Read example:");
?><br><?php
//read example
$example -> read($file);
?><hr><?php
print_r("Writing example");
?><br><?php
//write example
$example -> write($file,"DUMMY_DATA");
$example -> read($file);
?><hr><?php
print_r("Updating example, changing Nick Carter to Backstreet Boy - DOESNT WORK");
?><br><?php
//update example
$example -> update($file,"Nick Carter","Backstreet Boy");
$example -> read($file);
?><hr><?php
print_r("Delete Example, Deleting index 5");
?><br><?php
//delete example
$example -> delete($file,5);
$example -> read($file);
?><hr>
<a href="test_JSONHelper.php">JSON</a>
<a href="test_AuthHelper.php">Auth</a>