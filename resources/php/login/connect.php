<?php
$hostname="localhost"; //local server name default localhost
$username="awzctixl_ommatte";  //mysql username default is root.
$password="123A654B789C";       //blank if no password is set for mysql.
$database="awzctixl_localhost";  //database name which you created
$con=mysql_connect($hostname,$username,$password);
if(! $con)
{
    die('Connection Failed'.mysql_error());
}
mysql_select_db($database,$con);