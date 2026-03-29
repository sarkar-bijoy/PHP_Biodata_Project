<!DOCTYPE html>
<html>
<head>
    <title>Biodata Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="form-container">

<h1>BIODATA FORM</h1>

<form action="process.php" method="post" enctype="multipart/form-data">

<h3>Personal Information</h3>

<label>Name:</label>
<input type="text" name="name" required>

<label>Date of Birth:</label>
<input type="date" name="birthdate">

<label>Birth Place:</label>
<select name="birthplace">
    <option value="">Select</option>
    <option>Dhaka</option>
    <option>Chittagong</option>
    <option>Khulna</option>
    <option>Rajshahi</option>
</select>

<label>Gender:</label>
<select name="gender">
    <option value="">Select</option>
    <option>Male</option>
    <option>Female</option>
    <option>Other</option>
</select>

<label>Religion:</label>
<input type="text" name="religion">

<label>Height:</label>
<input type="text" name="height">

<label>Blood Group:</label>
<select name="blood">
    <option value="">Select</option>
    <option>A+</option><option>B+</option>
    <option>O+</option><option>AB+</option>
</select>

<label>Marital Status:</label>
<select name="marital">
    <option value="">Select</option>
    <option>Single</option>
    <option>Married</option>
</select>

<label>Email:</label>
<input type="email" name="email" required>

<label>Phone:</label>
<input type="text" name="phone" required>

<label>Photo:</label>
<input type="file" name="photo">

<h3>Education</h3>

<label>Degree:</label>
<input type="text" name="degree">

<label>Institute:</label>
<input type="text" name="institute">

<label>Year:</label>
<input type="text" name="year">

<h3>Family Info</h3>

<label>Father Name:</label>
<input type="text" name="father">

<label>Mother Name:</label>
<input type="text" name="mother">

<label>Address:</label>
<input type="text" name="address">

<br>
<input type="submit" value="Submit">

</form>

</div>

</body>
</html>