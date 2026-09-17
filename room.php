โค้ด HTML/CSS ที่ปรับเปลี่ยนธีมจากโทนสีม่วงเป็น โทนสีแดง-ขาว (Red & White Theme) อย่างสมบูรณ์เรียบร้อยครับ

HTML
<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ข้อมูลห้องพัก</title>

<style>

@import url('https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&display=swap');

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:"Sarabun","Segoe UI",Tahoma,Geneva,Verdana,sans-serif;
}

body{
    background:#fcf8f8; /* เปลี่ยนเป็นสีขาวอมเทาอ่อน */
    display:flex;
    flex-direction:column;
    min-height:100vh;
    font-size:16px;
    line-height:1.7;
}

/* ================= Navbar ================= */

nav{
    background:#d32f2f; /* เปลี่ยนเป็นสีแดงหลัก */
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:18px 40px;
    color:white;
    box-shadow:0 2px 10px rgba(0,0,0,.15);
}

nav h2{
    font-size:26px;
    font-weight:600;
    display:flex;
    align-items:center;
    gap:8px;
}

nav ul{
    list-style:none;
    display:flex;
    gap:25px;
}

nav ul li a{
    text-decoration:none;
    color:white;
    font-weight:bold;
    transition:.3s;
}

nav ul li a:hover{
    color:#ffcdd2; /* สีชมพูอ่อนเมื่อ Hover */
}

/* ================= Container ================= */

.container{
    width:95%;
    max-width:1200px;
    margin:40px auto;
    background:white;
    border-radius:20px;
    padding:30px;
    box-shadow:0 8px 25px rgba(211, 47, 47, 0.08);
    border:1px solid #ffebee;
    flex:1;
}

.container h2{
    text-align:center;
    color:#c62828; /* หัวข้อสีแดงเข้ม */
    margin-bottom:25px;
    font-size:30px;
    font-weight:600;
}

/* ================= Table ================= */

table{
    width:100%;
    border-collapse:collapse;
    overflow:hidden;
    border-radius:15px;
    border:1px solid #ffcdd2;
}

thead{
    background:#d32f2f; /* หัวตารางสีแดง */
    color:white;
}

th,td{
    padding:16px;
    text-align:center;
}

th{
    font-size:17px;
    font-weight:600;
}

td{
    border-bottom:1px solid #ffebee;
    font-size:15px;
    color:#333;
}

tbody tr:nth-child(even){
    background:#fff5f5; /* สลับแถวด้วยสีแดงอ่อนมาก */
}

tbody tr:hover{
    background:#ffebee; /* สีไฮไลต์เมื่อเอาเมาส์วาง */
    transition:.3s;
}

/* ================= Button ================= */

.btn{
    display:flex;
    align-items:center;
    justify-content:center;
    gap:8px;
    width:fit-content;
    margin:30px auto 0;
    padding:13px 28px;
    background:#d32f2f; /* ปุ่มสีแดงหลัก */
    color:white;
    text-decoration:none;
    border-radius:30px;
    font-size:18px;
    font-weight:bold;
    transition:.3s;
    box-shadow:0 5px 15px rgba(211, 47, 47, 0.25);
}

.btn:hover{
    background:#b71c1c; /* สีแดงเข้มขึ้นเมื่อ Hover */
    transform:translateY(-3px);
}

/* ================= Footer ================= */

footer{
    background:#d32f2f; /* ส่วนท้ายสีแดง */
    color:white;
    text-align:center;
    padding:18px;
    margin-top:auto;
}

footer p{
    font-size:16px;
}

</style>

</head>
<body>

<!-- Navbar -->

<nav>

    <h2>🏨 ระบบจองห้องพัก</h2>

    <ul>
        <li><a href="index.php">หน้าการจองพัก</a></li>
        <li><a href="room.php">ข้อมูลห้องพัก</a></li>
        <li><a href="manage_order.php">การจอง</a></li>

    </ul>

</nav>

<div class="container">

<?php
include "action/connect.php";

// ดึงข้อมูลทั้งหมดจากตาราง rooms
$sql = "SELECT * FROM rooms";
$result = mysqli_query($con, $sql);
?>

<h2>🏨 ข้อมูลห้องพัก</h2>

<table>

<thead>
<tr>
    <th>รหัสห้อง</th>
    <th>สูบบุหรี่</th>
    <th>อ่างอาบน้ำ</th>
    <th>ราคา (บาท)</th>
</tr>
</thead>

<tbody>

<?php foreach($result as $room){ ?>

<tr>
    <td><?= $room["room_id"] ?></td>
    <td><?= $room["smoke"] ?></td>
    <td><?= $room["bathtub"] ?></td>
    <td><?= number_format($room["price"]) ?></td>
</tr>

<?php } ?>

</tbody>

</table>

<a href="add_order.php" class="btn">📋 หน้าการจอง</a>

</div>

<!-- Footer -->

<footer>
    <p>© 2026 ระบบจัดการห้องพัก | Red & White Theme ❤️🤍</p>
</footer>

</body>
</html>