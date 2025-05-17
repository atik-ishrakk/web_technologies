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
            $username=validate_input($_POST["usern6ame"]);
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
                $roleError = "* Invalid role";
                // $role = '';
            }
        } 
        

// validate firstname
        if(empty($_POST['firstname'])){
            $firstNameError='* Firstname is required'; 
        }
        else{
            $firstName=validate_input($_POST["firstname"]);
        }
// validate lastname
        if(empty($_POST['lastname'])){
            $lastNameError='* Lastname is required'; 
        }
        else{
            $lastName=validate_input($_POST["lastname"]);
        }
    
// validate dob
        if (empty($_POST["dob"])) {
            $dobError = "* Date of birth is required.";
        } else {
            $dob = validate_input($_POST["dob"]);
            $today = date("Y-m-d");
            if ($dob >= $today) {
                $dobError = " Date of birth must be in the past.";
            }
        }  
// Validate Phone
        $phoneNumber = validate_input($_POST["phoneNumber"]);
        if (!preg_match("/^\+8801[3-9][0-9]{8}$/", $phoneNumber)) {
            $phoneNumberError = "* Invalid Bangladeshi phone number format.";
            // $phoneNumber = "";
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
        
    $gender = validate_input($_POST["gender"]);
    $allowedGenders = ['male', 'female', 'other', 'preferNotToSay'];
    if (!in_array($gender, $allowedGenders)) {
        $genderError = "Invalid gender selected.";
        // $gender='';
    }
    else{
        $gender = validate_input($_POST['gender']);
    }

    // validate File

    if (empty($_FILES['serviceHistoryFile']['name'])) {
        echo 'No file uploaded';
    } else {
        $uploadDir = "../uploads/";
        $fileName = time() ."-" .$_FILES['serviceHistoryFile']['name'];
        $targetPath = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES['serviceHistoryFile']['tmp_name'], $targetPath)) {
            echo $_FILES['serviceHistoryFile']['name'];
            }   
        }
    
    }

  
    // echo '<h2> Form Submitted! <h2>';

    // echo `Username:. $username` . '<br>';
    // echo 'Password:'. $password . '<br>';
    // echo 'Role:'. $role . '<br>';
    // echo 'Firstname:'. $firstName . '<br>';
    // echo 'Lastname:'. $lastName . '<br>';
    // echo 'Date of birth:'. $dob . '<br>';
    // echo 'Phone-no:'. $phoneNumber . '<br>';
    // echo 'Email:'. $email . '<br>';
    // echo 'Gender:'. $gender . '<br>';
    
?>