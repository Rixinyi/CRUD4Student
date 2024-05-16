<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
</head>
<body>
    <h2 style="color: #002182; font-size: 30px; font-family: sans-serif;">Student Registration Form</h2>
    <form method="POST">
        First Name:
        <input type="text" name="first_name" required><br><br>
        Middle Name:
        <input type="text" name="middle_name" required><br><br>
        Last Name:
        <input type="text" name="last_name" required><br><br>
        Suffix:
        <input type="text" name="suffix"><br><br>
        Course:
        <input type="text" name="course" required><br><br>
        Year and Section:
        <input type="text" name="year_and_section" required><br><br>
        <input type="submit" value="Add">
        <input type="reset" value="Clear">
        <a href="homestudent.php"><input type="button" value="Back"></a>
    </form>

    <?php
    //Monica T. Cadavez BSIT-2B
        include 'db.php'; 

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $f_name = $_POST['first_name'];
            $m_name = $_POST['middle_name'];
            $l_name = $_POST['last_name'];
            $suffix = $_POST['suffix'];
            $course = $_POST['course'];
            $year_sec = $_POST['year_and_section'];

            $stmt = $conn->prepare("INSERT INTO students (first_name, middle_name, last_name, suffix, course, year_and_section) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $f_name, $m_name, $l_name, $suffix, $course, $year_sec);

            if ($stmt->execute()) {
                echo "<p style='color:green;'>Data added successfully!</p>";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
            $conn->close();
        }
    ?>
    
</body>
</html>
