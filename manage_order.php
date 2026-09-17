<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>รายการการจองห้องพัก</title>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Sarabun', Arial, sans-serif;
    }

    body {
        background: #fcf8f8; /* เปลี่ยนเป็นสีขาวอมเทาอ่อน */
        color: #333333;
        min-height: 100vh;
        font-size: 16px;
        line-height: 1.7;
    }

    /* ================= NAVBAR ================= */
   nav{
    background:#d32f2f; /* เปลี่ยนเป็นสีแดงหลัก */
    color:white;
    font-size:23px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:18px 40px;
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
    color:white;
    text-decoration:none;
    font-size:18px;
    font-weight:bold;
    transition:.3s;
}

nav ul li a:hover{
    color:#ffcdd2; /* สีชมพูอ่อนเมื่อ Hover */
}

    .nav-menu a:hover {
        background: rgba(255,255,255,0.2);
    }

    /* ================= CONTENT ================= */
    .container {
        width: 90%;
        max-width: 1200px;
        margin: 40px auto;
        background: white;
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0 8px 25px rgba(211, 47, 47, 0.08);
        border: 1px solid #ffebee;
    }

    h1 {
        text-align: center;
        color: #c62828; /* หัวข้อสีแดงเข้ม */
        margin-bottom: 25px;
        font-size: 28px;
        font-weight: 600;
    }

    /* ปุ่มเพิ่ม */
    .add-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #d32f2f;
        color: white;
        text-decoration: none;
        padding: 10px 22px;
        border-radius: 20px;
        margin-bottom: 20px;
        transition: 0.3s;
        box-shadow: 0 4px 12px rgba(211, 47, 47, 0.2);
    }

    .add-btn:hover {
        background: #b71c1c;
        transform: translateY(-2px);
    }

    /* ================= TABLE ================= */
    table {
        width: 100%;
        border-collapse: collapse;
        overflow: hidden;
        border-radius: 15px;
        border: 1px solid #ffcdd2;
    }

    thead {
        background: linear-gradient(90deg, #d32f2f, #ef5350); /* ไล่เฉดสีแดง */
        color: white;
    }

    th {
        padding: 15px;
        font-size: 16px;
        font-weight: 600;
    }

    td {
        padding: 12px;
        text-align: center;
        border-bottom: 1px solid #ffebee;
        font-size: 15px;
    }

    tbody tr:nth-child(even) {
        background: #fff5f5;
    }

    tbody tr:hover {
        background: #ffebee;
    }

    td img {
        width: 150px !important;
        height: 100px;
        object-fit: cover;
        border-radius: 12px;
        border: 2px solid #ef5350;
        box-shadow: 0 3px 10px rgba(211, 47, 47, 0.15);
    }

    /* ================= BUTTON ================= */
    .edit-btn,
    .delete-btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        text-decoration: none;
        padding: 8px 14px;
        border-radius: 15px;
        margin: 3px;
        color: white;
        font-size: 14px;
        transition: 0.3s;
    }

    .edit-btn {
        background: #e53935; /* สีแดงสดสำหรับปุ่มแก้ไข */
    }

    .delete-btn {
        background: #757575; /* สีเทาเข้มสำหรับปุ่มลบ เพื่อให้ตัดกับสีแดง */
    }

    .edit-btn:hover {
        background: #c62828;
    }

    .delete-btn:hover {
        background: #424242;
    }

    /* ================= BACK BUTTON ================= */
    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-top: 25px;
        padding: 11px 20px;
        background: #ffebee;
        color: #c62828;
        text-decoration: none;
        border-radius: 20px;
        border: 1px solid #ffcdd2;
        transition: 0.3s;
    }

    .back-btn:hover {
        background: #d32f2f;
        color: white;
    }

    /* ================= FOOTER ================= */
    footer {
        margin-top: 50px;
        background: linear-gradient(90deg, #d32f2f, #b71c1c); /* ไล่เฉดสีแดงเข้ม */
        color: white;
        text-align: center;
        padding: 25px;
    }

    footer p {
        margin: 5px;
    }

    /* ================= RESPONSIVE ================= */
    @media (max-width: 768px) {
        nav {
            padding: 15px 20px;
            flex-direction: column;
            gap: 10px;
        }

        .container {
            width: 95%;
            padding: 15px;
            overflow-x: auto;
        }

        table {
            min-width: 800px;
        }
    }
</style>

</head>

<body>

<!-- ================= NAVBAR ================= -->
<nav class="navbar">
    <h2>🏨 ระบบจองห้องพัก</h2>

    <ul>
        <li><a href="index.php">หน้าการจองพัก</a></li>
        <li><a href="room.php">ข้อมูลห้องพัก</a></li>
        <li><a href="manage_order.php">การจอง</a></li>
    </ul>
</nav>


<!-- ================= PHP ================= -->
<?php
include "action/connect.php";

$sql = "SELECT * FROM orders";
$result = mysqli_query($con, $sql);
?>


<!-- ================= CONTENT ================= -->
<div class="container">

    <h1>📋 รายการการจองห้องพัก</h1>

    <a href="add_order.php" class="add-btn">➕ เพิ่มรายการจอง</a>

    <table>
        <thead>
            <tr>
                <th>รหัสรายการ</th>
                <th>ชื่อผู้เข้าพัก</th>
                <th>ชำระเงิน</th>
                <th>ประเภท</th>
                <th>ห้อง</th>
                <th>ภาพ</th>
                <th>จัดการ</th>
            </tr>
        </thead>

        <tbody>

        <?php
        foreach($result as $order){
        ?>

        <tr>
            <td><?= $order["order_id"] ?></td>

            <td><?= $order["name"] ?></td>

            <td><?= $order["payment"] ?></td>

            <td><?= $order["usage_type"] ?></td>

            <td><?= $order["room_id"] ?></td>

            <td>
                <img src="<?= $order["image"] ?>">
            </td>

            <td>
                <!-- แก้ไข -->
                <a
                    href="edit_order.php?id=<?= $order["order_id"] ?>"
                    class="edit-btn"
                >
                    ✏️ แก้ไข
                </a>

                <!-- ลบ -->
                <a
                    href="action/delete_order.php?id=<?= $order["order_id"] ?>"
                    class="delete-btn"
                    onclick="return confirm('ต้องการลบรายการนี้หรือไม่?')"
                >
                    🗑️ ลบ
                </a>
            </td>
        </tr>

        <?php
        }
        ?>

        </tbody>
    </table>

    <a href="index.php" class="back-btn">
        🏠 กลับหน้าห้องพัก
    </a>

</div>


<!-- ================= FOOTER ================= -->
<footer>
    <p>🏨 My Hotel</p>
    <p>ระบบจัดการการจองห้องพัก</p>
    <p>© 2026 All Rights Reserved</p>
</footer>

</body>
</html>