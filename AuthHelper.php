<?php
class AuthHelper{
	private static $obfuscator='<?php die() ?>';

    //This function will sign the user up
    //The parameters are: a file where users are stored, a user email, and a user password
    static function signup($file,$email,$password){
        if(!isset($email)) //test if email was submitted
		    die('please enter your email');
	    if(!isset($password)) //test if password was submitted
		    die('please enter your password');
	    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) //test if email is valid
		    die('Your email is invalid');
	    if(file_exists($file)){ //checks that the file that stores files exist and is submitted
		    $fh=fopen($file,'r');
		    while($line=fgets($fh)){//This while loop checks every line in the users file to verify a user doesnt craeted a 2nd account with the same email
			    $line=trim($line);
			    if($line[0]==$email)
				    die('You already have an account');
		    }
		fclose($fh);
	}
	$fh=fopen($file,'a');
	fputs($fh,$email.';'.password_hash($password,PASSWORD_DEFAULT).PHP_EOL); //writes new user email and encypted password to users file
	fclose($fh);
	echo('You created your account');
	}

    //This functin signs in a user
    //The parameters are 
    static function signin($file,$email,$password){
        if(isset($email)){ //test if email was submitted
            if(isset($password)){
                $fh=fopen($file,'r'); //test if password was submitted
                while($data=fgetcsv($fh, 1000, ";")){ //Loops to find is an email in users file matches the submitted email
                    if($data[0]==$email){
                        if(password_verify($password,$data[1])){ //verifies that the password submitted is the correct password to the account
                            $_SESSION['logged']=true;
                        }
                        else die("incorrect password");
                    }
                }
            }
        }
    }

    //This function can be called to sign a user out of thier account
    static function signout(){
        session_destroy();
    }

    //This function can be called to see if a user is currently logged into an account
    static function is_logged(){
        if(isset($_SESSION['logged']) || $_SESSION['logged']==true)
            return true;
        else return false;
    }
}

