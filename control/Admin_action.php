<?php 
    $usernameError=$passwordError=$roleError=$firstNameError=$lastNameError=$phoneNumberError=$emailError=$dobError=$genderError="";
    
    $username=$password=$role=$firstName=$lastName=$phoneNumber=$email=$dob=$gender="";
    
    function validate_input($data){
        return htmlspecialchars(stripslashes(trim($data)));
    }
    // if(isset($_REQUEST('submit')){} or,
    
    if($_SERVER["REQUEST_METHOD"]=="POST"){
//validate username
        if(empty($_POST["username"])){
            $usernameError= '* UserName is required';
        }
        else{
            $username=validate_input($_POST["username"]);
        }
// valildate password
        if(empty($_POST['password'])){
            $passwordError='* Password is required';
        }
        else{
            $password =validate_input($_POST['password']);
        }
// Validate Role
        if (isset($_POST["role"])) {
            $role = validate_input($_POST["role"]);
            $allowedRole = ['admin', 'user'];
            if (!in_array($role, $allowedRole)) {
                $roleError = "* Invalid role selected";
                $role = '';
            }
        } else {
            $roleError = "* Role is required";
        }
        

// validate firstname
        if(empty($_POST['firstname'])){
            $firstNameError='Firstname is required'; 
        }
        else{
            $firstName=validate_input($_POST["firstname"]);
        }
// validate lastname
        if(empty($_POST['lastname'])){
            $lastNameError='Lastname is required'; 
        }
        else{
            $lastName=validate_input($_POST["lastname"]);
        }
    
// validate dob
        if (empty($_POST["dob"])) {
            $dobError = "Date of birth is required.";
        } else {
            $dob = validate_input($_POST["dob"]);
            $today = date("Y-m-d");
            if ($dob >= $today) {
                $dob = "Date of birth must be in the past.";
            }
        }  
// Validate Phone
        $phoneNumber = validate_input($_POST["phoneNumber"]);
        if (!preg_match("/^\+8801[3-9][0-9]{8}$/", $phoneNumber)) {
            $phoneNumber = "";
            $phoneNumberError = "Invalid Bangladeshi phone number format.";
        }
     
// Validate Email
    if (empty($_POST["email"])) {
        $emailError = "Email is required.";
    } else {
        $email = validate_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email = "Invalid email format.";
        }
    }

// Validate Gender
    $genderError = "Gender is required.";
        
    $gender = validate_input($_POST["gender"]);
    $allowedGenders = ['male', 'female', 'other', 'preferNotToSay'];
    if (!in_array($gender, $allowedGenders)) {
        $gender = "Invalid gender selected.";
    }
}
 
  

    echo '<h2> Form Submitted! <h2>';
    echo '<br>';
    echo `Username:.$username`;
    echo '<br>';
    echo 'Password:'.$password;
    echo '<br>';
    echo 'Role:'.$role;
    echo '<br>';
    echo 'Firstname:'.$firstName;
    echo '<br>';
    echo 'Lastname:'.$lastName;
    echo '<br>';
    echo 'Date of birth:'.$dob;
    echo '<br>';
    echo 'Phone-no:'.$phoneNumber;
    echo '<br>';
    echo 'Email:'.$email;
    echo '<br>';
    echo 'Gender:'.$gender;
    echo '<br>';
    
?>