<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../CSS/Admin.css">

</head>

<body>
    <h3>Admin Panel</h3>
    <form action="Admin_action.php" method="post" onsubmit="return validateForm()">


        <!-- User Management -->
        <h4 id="user-management">User Management</h4>
        <fieldset>
            <legend>Create User</legend>
            <table>
                <tr>
                    <td><label for="username">Username:</label></td>
                    <td><input type="text" id="username" name="username" placeholder="Soumik Sarker"
                            onblur="validateUsername(this)">
                        <span id="usernameError" class="error"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="password">Password:</label></td>
                    <td><input type="password" id="password" name="password" placeholder="Ss1@"
                            onblur="validatePassword(this)">
                        <span id="passwordError" class="error"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="role">Role:</label></td>
                    <td>
                        <select id="role" name="role" onchange="if(this.value == '') alert('Please select a role.')">
                            <option value="">Select role</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                        <span id="roleError" class="error"></span>
                    </td>
                </tr>
            </table>
            <input type="submit" value="Create User">

        </fieldset>

        <!-- Vehicle Registration -->
        <h4 id="vehicle-registration">Vehicle Registration</h4>
        <fieldset>
            <legend>Owner Details</legend>
            <table>
                <tr>
                    <td><label for="firstName">First Name:</label></td>
                    <td><input type="text" id="firstName" name="firstName" placeholder="Soumik">

                    </td>
                </tr>
                <tr>
                    <td><label for="lastName">Last Name:</label></td>
                    <td><input type="text" id="lastName" name="lastName" placeholder="Sarker"></td>
                </tr>
                <tr>
                    <td><label for="phoneNumber">Phone Number:</label></td>
                    <td colspan="2"><input type="tel" id="phoneNumber" name="phoneNumber" value="+8801"
                            onblur="validatePhone(this)">
                        <span id="phoneError" class="error"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td colspan="2"><input type="email" id="email" name="email" placeholder="sarker@gmail.com"
                            onblur="validateEmail(this)">
                        <span id="emailError" class="error"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="dob">Date of Birth:</label></td>
                    <td colspan="2"><input type="date" id="dob" name="dob" onchange="validateDOB(this)">
                        <span id="dobError" class="error"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="gender">Gender:</label></td>
                    <td>
                        <select id="gender" name="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                            <option value="preferNotToSay">Prefer not to say</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="address">Address:</label></td>
                    <td><input type="text" id="address" name="address" placeholder="Type your address"></td>
                </tr>
                <tr>
                    <td><label for="nationality">Nationality:</label></td>
                    <td><input type="text" id="nationality" name="nationality"></td>
                </tr>
                <tr>
                    <td><label for="occupation">Occupation:</label></td>
                    <td><input type="text" id="occupation" name="occupation"></td>
                </tr>
                <tr>
                    <td><label for="idNumber">Identification Number:</label></td>
                    <td colspan="2"><input type="text" id="idNumber" name="idNumber" placeholder="NID Number"
                            onblur="validateNID(this)">
                        <span id="nidError" class="error"></span>
                    </td>
                </tr>
            </table>
        </fieldset>
        <fieldset>
            <legend>Vehicle Details</legend>
            <table>
                <tr>
                    <td><label for="make">Vehicle Make:</label></td>
                    <td>
                        <select id="make" name="make">
                            <option value="volvo">Volvo</option>
                            <option value="saab">Saab</option>
                            <option value="mercedes">Mercedes</option>
                            <option value="audi">Audi</option>
                            <option value="toyota">Toyota</option>
                            <option value="honda">Honda</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="model">Vehicle Model:</label></td>
                    <td><input type="text" id="model" name="model" placeholder="Model Name"></td>
                </tr>
                <tr>
                    <td><label for="year">Year of Manufacture:</label></td>
                    <td colspan="2"><input type="number" id="year" name="year" placeholder="YYYY" onblur="validateYear(this)">
                        <span id="yearError" class="error"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="color">Vehicle Color:</label></td>
                    <td><input type="text" id="color" name="color" placeholder="Red,Black,White..."></td>
                </tr>
                <tr>
                    <td><label for="engineNumber">Engine Number:</label></td>
                    <td><input type="text" id="engineNumber" name="engineNumber" placeholder="Engine No."></td>
                </tr>
                <tr>
                    <td><label for="chassisNumber">Chassis Number:</label></td>
                    <td><input type="text" id="chassisNumber" name="chassisNumber" placeholder="Chasis No."></td>
                </tr>
                <tr>
                    <td><label for="vin">Vehicle Identification Number (VIN):</label></td>
                    <td><input type="text" id="vin" name="vin"></td>
                </tr>
                <tr>
                    <td><label for="mileage">Mileage:</label></td>
                    <td><input type="number" id="mileage" name="mileage"></td>
                </tr>
                <tr>
                    <td><label for="fuelType">Fuel Type:</label></td>
                    <td><input type="text" id="fuelType" name="fuelType"></td>
                </tr>
            </table>
        </fieldset>
        <fieldset>
            <legend>Registration Details</legend>
            <table>
                <tr>
                    <td><label for="vehicleType">Vehicle Type:</label></td>
                    <td><input type="text" id="vehicleType" name="vehicleType" placeholder="EV/Fuel Based"></td>
                </tr>
                <tr>
                    <td><label for="regNumber">Registration Number:</label></td>
                    <td><input type="text" id="regNumber" name="regNumber"></td>
                </tr>
                <tr>
                    <td><label for="insuranceProvider">Insurance Provider:</label></td>
                    <td><input type="text" id="insuranceProvider" name="insuranceProvider">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="policyNumber">Insurance Policy Number:</label></td>
                        <td><input type="text" id="policyNumber" name="policyNumber"></td>
                    </tr>
                    <tr>
                        <td><label for="insuranceExpiry">Insurance Expiry Date:</label></td>
                        <td colspan="2"><input type="date" id="insuranceExpiry" name="insuranceExpiry" onchange="validateInsuranceDate">

                        <span id="insuranceError" class="error"></span>
                            
                    </td>
                </tr>
                <tr>
                    <td><label for="licensePlate">License Plate Number:</label></td>
                    <td><input type="text" id="licensePlate" name="licensePlate"></td>
                </tr>
                <tr>
                    <td><label for="registrationDate">Registration Date:</label></td>
                    <td><input type="date" id="registrationDate" name="registrationDate"></td>
                </tr>
                <tr>
                    <td><label for="emissionStandard">Emission Standard:</label></td>
                    <td><input type="text" id="emissionStandard" name="emissionStandard"></td>
                </tr>
            </table>
        </fieldset>
        <fieldset>
            <legend>Additional Details</legend>
            <table>
                <tr>
                    <td><label for="previousOwner">Previous Owner:</label></td>
                    <td><input type="text" id="previousOwner" name="previousOwner" placeholder="If available"></td>
                </tr>
                <tr>
                    <td><label for="loanApplied">Loan Applied:</label></td>
                    <td>
                        <select id="loanApplied" name="loanApplied">
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="warrantyProvider">Warranty Provider:</label></td>
                    <td><input type="text" id="warrantyProvider" name="warrantyProvider"></td>
                </tr>
                <tr>
                    <td><label for="warrantyExpiry">Warranty Expiry Date:</label></td>
                    <td><input type="date" id="warrantyExpiry" name="warrantyExpiry"></td>
                </tr>
                <tr>
                    <td><label for="serviceHistory">Service History (attach file):</label></td>
                    <td><input type="file" id="serviceHistory" name="serviceHistory"></td>
                </tr>
            </table>
        </fieldset>
        <input type="submit" value="Submit">
    </form>

    <script src="../JavaScript/A.js"></script>

</body>

</html>