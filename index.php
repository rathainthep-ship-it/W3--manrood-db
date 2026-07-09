<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายการสั่งซื้อ (Orders) - โทนชมพูสุดหวาน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300;400;500;700&display=swap" rel="stylesheet">
    
    <style>
        body { 
            font-family: 'Noto Sans Thai', sans-serif; 
            /* เปลี่ยนพื้นหลังเป็นสีชมพูอ่อนมากๆ */
            background-color: #fff0f5; 
            color: #444; 
        }
        .table-container { 
            background-color: #ffffff; 
            border-radius: 20px; /* เพิ่มความมนให้ดูนุ่มนวล */
            /* ปรับเงาให้เป็นโทนชมพูจางๆ */
            box-shadow: 0 4px 25px rgba(255, 182, 193, 0.2); 
            padding: 30px; 
            margin-top: 40px; 
            margin-bottom: 40px; 
        }
        /* ปรับสีหัวตารางเป็นชมพูเข้ม */
        .table th { 
            background-color: #ff1493 !important; /* Deep Pink */
            color: white !important; 
            font-weight: 500; 
            text-align: center; 
            border-color: #ff1493;
        }
        .table td { 
            vertical-align: middle; 
            text-align: center; 
        }
        /* เพิ่มเอฟเฟกต์รูปภาพเวลา Hover โทนชมพู */
        .img-preview { 
            object-fit: cover; 
            border-radius: 10px; 
            box-shadow: 0 2px 8px rgba(255, 105, 180, 0.2); 
            transition: all 0.3s ease; 
            border: 2px solid transparent;
        }
        .img-preview:hover { 
            transform: scale(1.08); 
            box-shadow: 0 4px 15px rgba(255, 105, 180, 0.4);
            border-color: #ff69b4; /* Hot Pink */
        }
        /* สีตัวอักษรเน้นย้ำโทนชมพู */
        .text-pink-dark { color: #c71585; } /* Medium Violet Red */
        .text-pink-hot { color: #ff69b4; } /* Hot Pink */
    </style>
</head>
<body>
    
    <?php
        // เชื่อมต่อฐานข้อมูล
        $con = mysqli_connect("localhost", "root", "", "manrood_db");

        if (!$con) {
            die("<div class='container mt-4'><div class='alert alert-danger'>เกิดข้อผิดพลาดในการเชื่อมต่อฐานข้อมูล</div></div>");
        }
        
        // ดึงข้อมูลทั้งหมดจากตาราง orders
        $sql = "SELECT * FROM orders";
        $result = mysqli_query($con, $sql);

        // ตรวจสอบว่ามีข้อมูลในฐานข้อมูลไหม ถ้าไม่มีให้สร้างข้อมูลจำลอง 6 คนพร้อมรูปภาพประกอบ
        $orders_list = [];
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $orders_list[] = $row;
            }
        } else {
            // ชุดข้อมูลจำลองพร้อมรูปภาพประกอบ (กรณีในเบสยังไม่มีข้อมูล)
            $orders_list = [
                ["order_id" => 1, "name" => "สมชาย สายลม", "payment" => "โอนเงินสำเร็จ", "usage_type" => "พักค้างคืน", "room_id" => "101", "image" => "https://images.unsplash.com/photo-1566073771259-6a8506099945?w=400&auto=format&fit=crop&q=60"],
                ["order_id" => 2, "name" => "สมหญิง จริงใจ", "payment" => "โอนเงินสำเร็จ", "usage_type" => "ชั่วคราว", "room_id" => "102", "image" => "https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?w=400&auto=format&fit=crop&q=60"],
                ["order_id" => 3, "name" => "กิตติศักดิ์ รักดี", "payment" => "โอนเงินสำเร็จ", "usage_type" => "พักค้างคืน", "room_id" => "201", "image" => "https://images.unsplash.com/photo-1540555700478-4be289fbecef?w=400&auto=format&fit=crop&q=60"],
                ["order_id" => 4, "name" => "นภา สดใส", "payment" => "โอนเงินสำเร็จ", "usage_type" => "พักค้างคืน", "room_id" => "203", "image" => "https://images.unsplash.com/photo-1571896349842-33c89424de2d?w=400&auto=format&fit=crop&q=60"],
                ["order_id" => 5, "name" => "ปกรณ์ วงศ์ดี", "payment" => "โอนเงินสำเร็จ", "usage_type" => "ชั่วคราว", "room_id" => "105", "image" => "https://images.unsplash.com/photo-1590490360182-c33d57733427?w=400&auto=format&fit=crop&q=60"],
                ["order_id" => 6, "name" => "อลิสา พาเพลิน", "payment" => "โอนเงินสำเร็จ", "usage_type" => "พักค้างคืน", "room_id" => "302", "image" => "https://images.unsplash.com/photo-1512917774080-9991f1c4c750?w=400&auto=format&fit=crop&q=60"]
            ];
        }
    ?>

    <div class="container">
        <div class="table-container">
            <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom border-pink-subtle">
                <h2 class="fw-bold m-0" style="color: #ff1493;">📋 รายการข้อมูลการจองห้องพัก</h2>
                <span class="badge fs-6 px-3 py-2" style="background-color: #ffb6c1; color: #c71585; border-radius: 20px;">ทั้งหมด <?= count($orders_list) ?> รายการ</span>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-striped table-danger align-middle border-pink-subtle">
                    <thead>
                        <tr>
                            <th style="width: 120px; border-top-left-radius: 10px;">รหัสรายการ</th>
                            <th>ชื่อผู้เข้าพัก</th>
                            <th>การชำระเงิน</th>
                            <th>ประเภท</th>
                            <th>ห้อง</th>
                            <th style="width: 220px; border-top-right-radius: 10px;">ภาพหลักฐาน / ห้องพัก</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($orders_list as $order){
                        ?>
                        <tr>
                            <td>
                                <span class="badge border px-2 py-1.5" style="background-color: #fff0f5; color: #ff69b4; border-color: #ffb6c1 !important;">
                                    #<?= $order["order_id"] ?>
                                </span>
                            </td>
                            <td class="text-start fw-semibold text-pink-dark"><?= $order["name"] ?></td>
                            <td>
                                <span class="badge border px-3 py-1.5" style="background-color: #ffe4e1; color: #db7093; border-color: #ffb6c1 !important; border-radius: 15px;">
                                    <span class="me-1">💗</span><?= $order["payment"] ?>
                                </span>
                            </td>
                            <td>
                                <span class="badge text-wrap px-2 py-1.5" style="background-color: #dda0dd; color: #4b0082;">
                                    <?= $order["usage_type"] ?>
                                </span>
                            </td>
                            <td>
                                <span class="fw-bold fs-5" style="color: #ff1493;">
                                    ห้อง <?= $order["room_id"] ?>
                                </span>
                            </td>
                            <td>
                                <?php if(!empty($order["image"])): ?>
                                    <img src="<?= $order["image"] ?>" alt="Order Image" class="img-preview" style="width: 180px; height: 110px;">
                                <?php else: ?>
                                    <span class="text-muted small">ไม่มีรูปภาพ</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            
            <div class="text-center mt-4 pt-3 border-top border-pink-subtle text-pink-hot small">
                💖 ระบบจัดการจองห้องพัก ม่านรูด แสนหวาน 💖
            </div>
        </div>
    </div>

</body>
</html>