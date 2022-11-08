<?php
//This file showcases reading, writing, updating, and deleting JSON data from a JSON file
//Opening the page in a web browser will have all the examples run for the user
include 'JSONHelper.php';
$file='JSONContent.json';

$dummy_data = "This is a string";

$JSONHelper = new JSONHelper();
//read example
print_r("Read example:");
?><br><?php
$JSONHelper -> read($file);
?><hr><?php
print_r("Write example, adding Banana:");
?><br><?php
$array = array("Banana");
//write example
$JSONHelper -> write($file,$array);
$JSONHelper -> read($file);
?><hr><?php
print_r("Update example, changing Strawberry to Mango:");
?><br><?php
//update example
$JSONHelper -> update($file,2,"Mango");
$JSONHelper -> read($file);
?><hr><?php
print_r("Delete example, deleting Mango:");
?><br><?php
//delete example
$JSONHelper -> delete($file,2);
$JSONHelper -> read($file);
?><hr>

<a href="test_CSVHelper.php">CSV</a>
<a href="test_AuthHelper.php">Auth</a>






