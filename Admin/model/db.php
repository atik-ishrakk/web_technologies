<?php

function createconn(){
    return mysqli_connect("localhost","root","","car_dealership");
}

function closeConn($conn){
    return mysqli_close($conn);
}

function insert($conn,$username,$password,$role,$phone,$email,$dob,$gender,$address,$nationality,$occupation,$nid,$file){

    $query="INSERT INTO user_registration (username,password,role,phone,email,dob,gender,address,nationality,occupation,nid,file) VALUES('$username','$password','$role','$phone','$email','$dob','$gender','$address','$nationality','$occupation','$nid','$file')";

    return mysqli_query($conn,$query);
}

function checkLogin($conn, $username, $password, $role){
    $sql = "SELECT * FROM user_registration WHERE username='$username' AND password='$password' AND role='$role'";
    return mysqli_query($conn, $sql);
}

function fetchData($conn) {
    $sql = "SELECT * FROM user_registration where username=$username";
    $data= mysqli_query($conn, $sql);
    return mysqli_num_rows($data);
}
?>