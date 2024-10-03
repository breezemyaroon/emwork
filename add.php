<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $task_type = $_POST['task_type'];
    $task_name = $_POST['task_name'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $status = $_POST['status'];

  include("connect.php");

    $sql = "INSERT INTO daily_tasks (task_type, task_name, start_time, end_time, status)
            VALUES ('$task_type', '$task_name', '$start_time', '$end_time', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "บันทึกข้อมูลสำเร็จ";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มงานใหม่</title>
</head>
<body>
    <h1>เพิ่มงานใหม่</h1>
    <form method="post" action="add.php">
        ประเภทงาน: <input type="text" name="task_type" required><br>
        ชื่องาน: <input type="text" name="task_name" required><br>
        เวลาเริ่ม: <input type="datetime-local" name="start_time" required><br>
        เวลาสิ้นสุด: <input type="datetime-local" name="end_time" required><br>
        สถานะ: 
        <select name="status">
            <option value="ดำเนินการ">ดำเนินการ</option>
            <option value="เสร็จสิ้น">เสร็จสิ้น</option>
            <option value="ยกเลิก">ยกเลิก</option>
        </select><br>
        <input type="submit" value="บันทึก">
    </form>
    <a href="html/index.html">กลับหน้าหลัก</a>
</body>
</html>

