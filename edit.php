<?php
// ดึงข้อมูลงานที่ต้องการแก้ไข
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include("connect.php");

 
    $sql = "SELECT * FROM daily_tasks WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "ไม่พบข้อมูล";
    }
    $conn->close();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $task_type = $_POST['task_type'];
    $task_name = $_POST['task_name'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $status = $_POST['status'];

    include("connect.php");

    
    $sql = "UPDATE daily_tasks SET task_type='$task_type', task_name='$task_name', start_time='$start_time', end_time='$end_time', status='$status' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "แก้ไขข้อมูลสำเร็จ";
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
    <title>แก้ไขงาน</title>
</head>
<body>
    <h1>แก้ไขงาน</h1>
    <form method="post" action="edit.php?id=<?php echo $id; ?>">
        ประเภทงาน: <input type="text" name="task_type" value="<?php echo $row['task_type']; ?>"><br>
        ชื่องาน: <input type="text" name="task_name" value="<?php echo $row['task_name']; ?>"><br>
        เวลาเริ่ม: <input type="datetime-local" name="start_time" value="<?php echo $row['start_time']; ?>"><br>
        เวลาสิ้นสุด: <input type="datetime-local" name="end_time" value="<?php echo $row['end_time']; ?>"><br>
        สถานะ: 
        <select name="status">
            <option value="ดำเนินการ" <?php if ($row['status'] == 'ดำเนินการ') echo 'selected'; ?>>ดำเนินการ</option>
            <option value="เสร็จสิ้น" <?php if ($row['status'] == 'เสร็จสิ้น') echo 'selected'; ?>>เสร็จสิ้น</option>
            <option value="ยกเลิก" <?php if ($row['status'] == 'ยกเลิก') echo 'selected'; ?>>ยกเลิก</option>
        </select><br>
        <input type="submit" value="แก้ไข">
    </form>
    <a href="view.php">กลับไปที่รายการงาน</a>
</body>
</html>

