<?php
//Monica T. Cadavez BSIT-2B
    include 'db.php'; 

    $sql = "SELECT * FROM students";
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Students</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h2 {
            color: #333;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 2px solid #ffffff;
            text-align: left;
            padding: 8px;
            background-color: #d6dcec;
            font-family: Calibri;
        }
        th {
            background-color: #232a3f;
        }
    </style>
</head>
<body>
    <h2 style="color: #002182; font-size: 30px; font-family: sans-serif;"><center>Registered Students</center></h2>
    <a href="addstudent.php"><button>Add</button></a>
    
    <table>
        <tr style="color: #ffffff;">
            <th>ID</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Suffix</th>
            <th>Course</th>
            <th>Year and Section</th>
            <th>Action</th>
        </tr>
        <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['student_id'] . "</td>";
                echo "<td>" . $row['first_name'] . "</td>";
                echo "<td>" . $row['middle_name'] . "</td>";
                echo "<td>" . $row['last_name'] . "</td>";
                echo "<td>" . $row['suffix'] . "</td>";
                echo "<td>" . $row['course'] . "</td>";
                echo "<td>" . $row['year_and_section'] . "</td>";
                echo "<td>";
                echo "<a href='deletestudent.php?id=" . $row['student_id'] . "'><button>Delete</button></a>";
                echo "<a href='updatestudent.php?id=" . $row['student_id'] . "'><button>Update</button></a>";
                echo "</td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>