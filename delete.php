<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include("connect.php");

    $sql = "DELETE FROM daily_tasks WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "ลบข้อมูลสำเร็จ";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<a href="view.php">กลับไปที่รายการงาน</a>

