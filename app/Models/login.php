<?php
function login($uname,$upassword){
    $query =   $this->db->query("SELECT  * FROM  'users' WHERE name='. $uname. ' AND password='. $upassword"); // Query modify as per ur requirement

    if(count($query) ==1  ){
        echo "success";
        }else{
        echo "failed";
        }}
?>