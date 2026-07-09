<?php
// Report all PHP errors
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// เชื่อมต่อฐานข้อมูล
$con = mysqli_connect("localhost", "root", "", "manrood_db");
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Connection Status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; height: 100vh; display: flex; justify-content: center; align-items: center; }
        .connection-card { max-width: 500px; width: 100%; padding: 20px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); background: #ffffff; }
    </style>
</head>
<body>

<div class="connection-card text-center">
    <h4 class="mb-4 text-secondary">ระบบตรวจสอบการเชื่อมต่อ</h4>
    
    <?php if (!$con): ?>
        <div class="alert alert-danger" role="alert">
            <h5 class="alert-heading">❌ เชื่อมต่อไม่สำเร็จ!</h5>
            <p class="mb-0 small text-start mt-2"><strong>สาเหตุ:</strong> <?php echo mysqli_connect_error(); ?></p>
        </div>
        <button class="btn btn-outline-danger w-100 mt-3" onclick="window.location.reload();">ลองใหม่อีกครั้ง</button>
    <?php else: ?>
        <div class="alert alert-success" role="alert">
            <h5 class="alert-heading">✅ เชื่อมต่อสำเร็จ!</h5>
            <p class="mb-0 small">ระบบเชื่อมต่อกับฐานข้อมูล <strong>manrood_db</strong> เรียบร้อยแล้ว</p>
        </div>
        <a href="../index.php" class="btn btn-success w-100 mt-3">เข้าสู่หน้าเว็บหลัก</a>
    <?php endif; ?>
</div>

</body>
</html>