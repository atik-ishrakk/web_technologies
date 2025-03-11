<!DOCTYPE html>
<html>
<head>
  <title>AutoDrive</title>
</head>
<body>

<h3>Vehicle Registration Form:</h3>

<form action="action_page.php" method="post" target="_blank">
  
  <fieldset>
    <legend>Owner Details</legend>
    <table>
      <tr>
        <td><label for="fname">First Name:</label></td>
        <td><input type="text" id="fname" name="fname" placeholder="Atik" required></td>
      </tr>
      <tr>
        <td><label for="lname">Last Name:</label></td>
        <td><input type="text" id="lname" name="lname" placeholder="Ishrak" required></td>
      </tr>
      <tr>
        <td><label for="phone">Phone Number:</label></td>
        <td><input type="text" id="phone" name="phone" value="+8801" pattern="\+880\d{9}" required></td>
      </tr>
      <tr>
        <td><label for="email">Email:</label></td>
        <td><input type="email" id="email" name="email" placeholder="example@gmail.com" required></td>
      </tr>
      <tr>
        <td><label for="dob">Date of Birth:</label></td>
        <td><input type="date" id="dob" name="dob" required></td>
      </tr>
      <tr>
        <td><label>Your Gender:</label></td>
        <td>
          <input type="radio" name="gender" value="male"> Male
          <input type="radio" name="gender" value="female"> Female
          <input type="radio" name="gender" value="other"> Other
          <input type="radio" name="gender" value="prefer-not-to-say"> Prefer not to say
        </td>
      </tr>
      <tr>
        <td><label for="address">Your Address:</label></td>
        <td><textarea id="address" name="address" rows="4" cols="50" placeholder="Type your address here" required></textarea></td>
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
        <td><input type="text" id="model" name="model" placeholder="Model Name" required></td>
      </tr>
      <tr>
        <td><label for="year">Year of Manufacture:</label></td>
        <td><input type="number" id="year" name="year" placeholder="YYYY" min="1900" max="2025" required></td>
      </tr>
      <tr>
        <td><label for="color">Vehicle Color:</label></td>
        <td><input type="text" id="color" name="color" placeholder="Red, Black, White..." required></td>
      </tr>
      <tr>
        <td><label for="engine">Engine Number:</label></td>
        <td><input type="text" id="engine" name="engine" placeholder="Engine No." required></td>
      </tr>
      <tr>
        <td><label for="chassis">Chassis Number:</label></td>
        <td><input type="text" id="chassis" name="chassis" placeholder="Chassis No." required></td>
      </tr>
      <tr>
        <td><label for="fuel">Fuel Type:</label></td>
        <td>
          <select id="fuel" name="fuel">
            <option value="petrol">Petrol</option>
            <option value="diesel">Diesel</option>
            <option value="electric">Electric</option>
            <option value="hybrid">Hybrid</option>
          </select>
        </td>
      </tr>
    </table>
  </fieldset>

  <fieldset>
    <legend>Registration Details</legend>
    <table>
      <tr>
        <td><label for="vtype">Vehicle Type:</label></td>
        <td><input type="text" id="vtype" name="vtype" placeholder="Car, Truck, Motorcycle..." required></td>
      </tr>
      <tr>
        <td><label for="regnumber">Registration Number:</label></td>
        <td><input type="text" id="regnumber" name="regnumber" placeholder="Reg No." required></td>
      </tr>
      <tr>
        <td><label for="insprovider">Insurance Provider:</label></td>
        <td><input type="text" id="insprovider" name="insprovider" placeholder="Insurance Company Name" required></td>
      </tr>
      <tr>
        <td><label for="inspolicy">Insurance Policy Number:</label></td>
        <td><input type="text" id="inspolicy" name="inspolicy" placeholder="Policy No." required></td>
      </tr>
      <tr>
        <td><label for="insdate">Insurance Expiry Date:</label></td>
        <td><input type="date" id="insdate" name="insdate" required></td>
      </tr>
    </table>
  </fieldset>

  <fieldset>
    <legend>Additional Details</legend>
    <table>
      <tr>
        <td><label for="powner">Previous Owner:</label></td>
        <td><input type="text" id="powner" name="powner" placeholder="Previous Owner Name"></td>
      </tr>
      <tr>
        <td><label>Loan Applied:</label></td>
        <td>
          <input type="radio" name="loan_applied" value="yes"> Yes
          <input type="radio" name="loan_applied" value="no"> No
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <p>"I, the undersigned, confirm that the information provided above is accurate and complete."</p>
          <p>Owner's Signature: ___________</p>
          <p>Date: ___________</p>
        </td>
      </tr>
    </table>
  </fieldset>

  <br>
  <input type="submit" value="Submit">
  <input type="reset" value="Clear">
</form>

</body>
</html>
