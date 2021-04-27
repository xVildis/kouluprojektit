<?php
// Store the string into variable
$password = 'Password';
  
// Use password_hash() function to
// create a password hash
$hash_default_salt = password_hash($password,
                            PASSWORD_DEFAULT);
  
$hash_variable_salt = password_hash($password,
        PASSWORD_DEFAULT, array('cost' => 9));
  
// Use password_verify() function to
// verify the password matches
echo password_verify('Password',
            $hash_default_salt ) . "<br>";
  
echo password_verify('Password',
            $hash_variable_salt ) . "<br>";
  
echo password_verify('Password123',
            $hash_default_salt );
  
?>