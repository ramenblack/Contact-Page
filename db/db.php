<?php
   $hostname = "localhost";
   $database = "stream";
   $username = "keegy";
   $password = "whitehat";
  	function clean($input, $maxlength)
 	{
     $input = substr($input, 0, $maxlength);
    $input = EscapeShellCmd($input);
   return ($input);
  }
?>
