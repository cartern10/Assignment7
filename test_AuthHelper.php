<?php
include 'AuthHelper.php';
$example = new AuthHelper;
$file = 'users.csv.php';
session_start();

//calls is_logged to check whether a user is logged into an account or not
if(count($_POST)==0){
    print_r("Current Status: ");
if ($example -> is_logged()==true)
    print_r("Logged In");
else
    print_r("Not Logged In");
}

//comment out 2 of the 3 function calls to only call one function at a time
if(count($_POST)>0){
	//$example -> signup($file,$_POST['email'],$_POST['password']);
    //$example -> signin($file,$_POST['email'],$_POST['password']);
    $example -> signout($file,$_POST['email'],$_POST['password']);

    //calls is_logged to check whether a user is logged into an account or not
    if ($example -> is_logged()==true)
        print_r("Current Status: ");
    if ($example -> is_logged()==true)
        print_r("Logged In");
    else
        print_r("Not Logged In");
}




?>
</br>
<form method="POST">
    email
	<input type="email" name="email" />
    password
	<input type="password" name="password" />
	<input type="submit" value="submit"/>
</form>
