<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลการจอง</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&display=swap');

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family: "Sarabun", "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }

        body{
            background:#fcf8f8; /* พื้นหลังสีขาวอมเทาอ่อน */
            font-size:16px;
            line-height:1.7;
            color:#333;
        }

        /* Navbar */
        nav{
            background:#d32f2f; /* สีแดงหลัก */
            color:white;
            padding:18px 40px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            box-shadow:0 2px 8px rgba(0,0,0,.1);
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
            font-size:16px;
            font-weight:bold;
            border-radius:30px;
            transition:.3s;
            box-shadow:0 5px 15px rgba(211, 47, 47, 0.25);
        }

        .btn:hover{
            background:#b71c1c; /* สีแดงเข้มขึ้นเมื่อ Hover */
            transform:translateY(-3px);
        }

        /* Container */
        .container{
            width:420px;
            margin:50px auto;
            background:white;
            padding:30px;
            border-radius:15px;
            box-shadow:0 8px 25px rgba(211, 47, 47, 0.08);
            border:1px solid #ffebee;
        }

        .container h2{
            text-align:center;
            color:#c62828; /* หัวข้อสีแดงเข้ม */
            margin-bottom:25px;
            font-size:26px;
            font-weight:600;
        }

        label{
            display:block;
            margin-top:15px;
            color:#c62828; /* ข้อความ Label สีแดงเข้ม */
            font-weight:600;
            font-size:15px;
        }

        input,select{
            width:100%;
            padding:10px;
            margin-top:8px;
            border:1px solid #ffcdd2; /* ขอบสีแดงอ่อน */
            border-radius:8px;
            outline:none;
            transition:.3s;
        }

        input:focus,
        select:focus{
            border:1px solid #e53935; /* สีขอบเมื่อคลิกพิมพ์ */
            box-shadow:0 0 5px rgba(229, 57, 53, 0.3);
        }

        button{
            width:100%;
            margin-top:25px;
            padding:12px;
            background:#d32f2f; /* ปุ่มบันทึกสีแดง */
            color:white;
            border:none;
            border-radius:8px;
            cursor:pointer;
            font-size:16px;
            font-weight:bold;
            display:flex;
            align-items:center;
            justify-content:center;
            gap:8px;
            transition:.3s;
            box-shadow:0 4px 10px rgba(211, 47, 47, 0.2);
        }

        button:hover{
            background:#b71c1c;
        }

        footer{
            background:#d32f2f; /* ส่วนท้ายสีแดง */
            color:white;
            text-align:center;
            padding:18px;
            margin-top:60px;
        }

    </style>
</head>

<body>

<!-- Navbar -->
<nav>
    <h2>🏨 ระบบจองห้องพัก</h2>

    <ul>
        <li><a href="index.php">หน้าการจองพัก</a></li>
        <li><a href="#">ข้อมูลห้องพัก</a></li>
        <li><a href="#">การจอง</a></li>
        <li><a href="edit_order.php">การเเก้ไขข้อมูล</a></li>
    </ul>
</nav>

<div class="container">

<h2>เพิ่มข้อมูลการเข้าพัก</h2>

<form action="action/insert_order.php" method="post">

<label>ชื่อผู้เข้าพัก</label>
<input type="text" name="name" required>

<label>การจ่ายเงิน</label>
<input type="text" name="payment" required>

<label>ประเภทการใช้งาน</label>
<input type="text" name="usage_type" required>

<label>ภาพผู้เข้าพัก</label>
<input type="text" name="image">

<?php
include "action/connect.php";

$sql = "SELECT * FROM rooms";
$result = mysqli_query($con,$sql);
?>

<label>เลือกห้องพัก</label>

<select name="room_id">

<?php
foreach($result as $room){
?>

<option value="<?= $room["room_id"] ?>">
<?= $room["room_id"] ?> - <?= $room["price"] ?> บาท
</option>

<?php
}
?>

</select>

<button type="submit">💾 บันทึกข้อมูล</button>

</form>

</div>

<a href="index.php" class="btn">🏠 กลับรายการการจองห้องพัก</a>
<!-- Footer -->
<footer>
    <p>
        สโรชา เจียมเจริญ BIT2/3 เลขที่28 | Red & White Theme ❤️🤍
    </p>
</footer>

</body>
</html>