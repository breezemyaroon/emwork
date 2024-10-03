<?php
include("connect.php");


$sql = "SELECT * FROM daily_tasks";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ดูงานทั้งหมด</title>
</head>
<body>
    <h1>รายการงานทั้งหมด</h1>
    <table border="1">
        <tr>
            <th>ประเภทงาน</th>
            <th>ชื่องาน</th>
            <th>เวลาเริ่ม</th>
            <th>เวลาสิ้นสุด</th>
            <th>สถานะ</th>
            <th>การจัดการ</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['task_type'] . "</td>";
                echo "<td>" . $row['task_name'] . "</td>";
                echo "<td>" . $row['start_time'] . "</td>";
                echo "<td>" . $row['end_time'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "<td><a href='edit.php?id=" . $row['id'] . "'>แก้ไข</a> | <a href='delete.php?id=" . $row['id'] . "'>ลบ</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>ไม่มีข้อมูล</td></tr>";
        }
        $conn->close();
        ?>
    </table>
    <a href="html/index.html">กลับหน้าหลัก</a>
</body>
</html>

