<?php

function createconn()
{
    return mysqli_connect("localhost", "root", "", "car_dealership");
}

function closeConn($conn)
{
    return mysqli_close($conn);
}

function insertData($conn, $username, $password, $role, $phone, $email, $dob, $gender, $address, $nationality, $occupation, $nid, $file)
{

    $query = "INSERT INTO user_registration (username,password,role,phone,email,dob,gender,address,nationality,occupation,nid,file) VALUES('$username','$password','$role','$phone','$email','$dob','$gender','$address','$nationality','$occupation','$nid','$file')";

    return mysqli_query($conn, $query);
}

function updateData($conn, $id, $username, $password, $role, $phone, $email, $dob, $gender, $address, $nationality, $occupation, $nid, $file)
{
    $query = "UPDATE user_registration 
              SET username='$username', password='$password', role='$role', phone='$phone',
                  email='$email', dob='$dob', gender='$gender', address='$address', 
                  nationality='$nationality', occupation='$occupation', nid='$nid', file='$file'
              WHERE id='$id'";

    return mysqli_query($conn, $query);

}
function deleteData($conn, $userId)
{
    // $userId = mysqli_real_escape_string($conn, $userId);

    $query = "DELETE FROM user_registration WHERE id = '$userId'";
    return mysqli_query($conn, $query);
}

function checkLogin($conn, $username, $password, $role)
{
    $query = "SELECT * FROM user_registration WHERE username='$username' AND password='$password' AND role='$role'";
    return mysqli_query($conn, $query);
}

function fetchData($conn, $username)
{
    $query = "SELECT * FROM user_registration where username=$username";
    $data = mysqli_query($conn, $query);
    return mysqli_num_rows($data);
}


?>