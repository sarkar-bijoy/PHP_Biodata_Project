<?php
include "db.php";

function clean($data) {
    return htmlspecialchars(trim($data));
}

// -------- GET DATA --------
$name = clean($_POST['name']);
$birthdate = clean($_POST['birthdate']);
$birthplace = $_POST['birthplace'];
$gender = $_POST['gender'];
$religion = clean($_POST['religion']);
$height = clean($_POST['height']);
$blood = $_POST['blood'];
$marital = $_POST['marital'];
$email = clean($_POST['email']);
$phone = clean($_POST['phone']);

$degree = clean($_POST['degree']);
$institute = clean($_POST['institute']);
$year = clean($_POST['year']);

$father = clean($_POST['father']);
$mother = clean($_POST['mother']);
$address = clean($_POST['address']);

// -------- IMAGE UPLOAD --------
$photoPath = "";

if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {

    $ext = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png'];

    if (in_array($ext, $allowed)) {

        if (!is_dir("uploads")) {
            mkdir("uploads");
        }

        $photoPath = "uploads/" . time() . "." . $ext;

        move_uploaded_file($_FILES['photo']['tmp_name'], $photoPath);
    }
}

// -------- INSERT INTO DATABASE --------
$sql = "INSERT INTO users 
(name, birthdate, birthplace, gender, religion, height, blood, marital, email, phone, degree, institute, year, father, mother, address, photo)
VALUES 
('$name','$birthdate','$birthplace','$gender','$religion','$height','$blood','$marital','$email','$phone','$degree','$institute','$year','$father','$mother','$address','$photoPath')";

if ($conn->query($sql) !== TRUE) {
    echo "Database Error: " . $conn->error;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Biodata</title>

<style>
body {
    font-family: Arial;
    background: #dcd3b5;
}

.container {
    width: 850px;
    margin: auto;
    background: #e6ddc6;
    padding: 25px;
    border: 5px solid #b89c3c;
    position: relative;
}

h1 {
    text-align: center;
    font-size: 32px;
}

.section-title {
    font-weight: bold;
    margin-top: 20px;
    border-bottom: 2px solid #b89c3c;
    padding-bottom: 5px;
}

.info p {
    margin: 8px 0;
}

.info b {
    display: inline-block;
    width: 150px;
}

.photo {
    position: absolute;
    right: 30px;
    top: 120px;
    border: 2px solid black;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

table th {
    background: #d6c27a;
}

table, th, td {
    border: 1px solid black;
    padding: 8px;
    text-align: center;
}

.print-btn {
    margin-top: 20px;
    padding: 10px;
    background: #b89c3c;
    border: none;
    cursor: pointer;
    font-weight: bold;
}

@media print {
    .print-btn {
        display: none;
    }
}
</style>

</head>

<body>

<div class="container">

<h1>BIODATA</h1>

<?php if ($photoPath != "") { ?>
    <img src="<?php echo $photoPath; ?>" width="140" class="photo">
<?php } ?>

<div class="section-title">PERSONAL INFORMATION</div>

<div class="info">
<p><b>Name :</b> <?php echo $name; ?></p>
<p><b>Birthdate :</b> <?php echo $birthdate; ?></p>
<p><b>Birth Place :</b> <?php echo $birthplace; ?></p>
<p><b>Gender :</b> <?php echo $gender; ?></p>
<p><b>Religion :</b> <?php echo $religion; ?></p>
<p><b>Height :</b> <?php echo $height; ?></p>
<p><b>Blood Group :</b> <?php echo $blood; ?></p>
<p><b>Marital Status :</b> <?php echo $marital; ?></p>
<p><b>Email :</b> <?php echo $email; ?></p>
<p><b>Contact No :</b> <?php echo $phone; ?></p>
</div>

<div class="section-title">EDUCATIONAL QUALIFICATION</div>

<table>
<tr>
<th>Degree</th>
<th>Institute</th>
<th>Year</th>
</tr>

<tr>
<td><?php echo $degree; ?></td>
<td><?php echo $institute; ?></td>
<td><?php echo $year; ?></td>
</tr>
</table>

<div class="section-title">FAMILY INFORMATION</div>

<div class="info">
<p><b>Father Name :</b> <?php echo $father; ?></p>
<p><b>Mother Name :</b> <?php echo $mother; ?></p>
<p><b>Contact No :</b> <?php echo $phone; ?></p>
<p><b>Address :</b> <?php echo $address; ?></p>
</div>

<button class="print-btn" onclick="window.print()">Print / Save PDF</button>

</div>

</body>
</html>