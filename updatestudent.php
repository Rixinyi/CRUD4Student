<?php
//Monica T. Cadavez BSIT-2B
include 'db.php'; 

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];

    $stmt = $conn->prepare("SELECT * FROM students WHERE student_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $f_name = $row["first_name"];
        $m_name = $row["middle_name"];
        $l_name = $row["last_name"];
        $suffix = $row["suffix"];
        $course = $row["course"];
        $year_sec = $row["year_and_section"];
    } else {
        echo "No student found with the given ID.";
        exit();
    }

    $stmt->close();
} else {
    echo "No ID provided.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $f_name = $_POST['first_name'];
    $m_name = $_POST['middle_name'];
    $l_name = $_POST['last_name'];
    $suffix = $_POST['suffix'];
    $course = $_POST['course'];
    $year_sec = $_POST['year_and_section'];

    $stmt = $conn->prepare("UPDATE students SET first_name = ?, middle_name = ?, last_name = ?, suffix = ?, course = ?, year_and_section = ? WHERE student_id = ?");
    $stmt->bind_param("ssssssi", $f_name, $m_name, $l_name, $suffix, $course, $year_sec, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Data updated successfully!');</script>";
    } else {
        echo "Error updating data: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
    </style>
</head>
<body>
    <form method="POST">
        <h2 style="color: #002182; font-size: 30px; font-family: sans-serif;">Student Registration Form</h2>
        <input type="hidden" name="id" value="<?php echo $id; ?>"><br>
        First Name:
        <input type="text" name="first_name" value="<?php echo $f_name; ?>" required><br><br>
        Middle Name:
        <input type="text" name="middle_name" value="<?php echo $m_name; ?>" required><br><br>
        Last Name:
        <input type="text" name="last_name" value="<?php echo $l_name; ?>" required><br><br>
        Suffix:
        <input type="text" name="suffix" value="<?php echo $suffix; ?>"><br><br>
        Course:
        <input type="text" name="course" value="<?php echo $course; ?>" required><br><br>
        Year and Section:
        <input type="text" name="year_and_section" value="<?php echo $year_sec; ?>" required><br><br>
        <input type="submit" value="Update">
        <a href="homestudent.php"><input type="button" value="Back"></a>
    </form>
</body>
</html>
