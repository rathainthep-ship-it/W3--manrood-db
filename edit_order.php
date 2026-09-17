<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลการจอง</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&display=swap');

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:"Sarabun","Segoe UI",Tahoma,Geneva,Verdana,sans-serif;
        }

        body{
            background:#f8f2ff;
            font-size:16px;
            line-height:1.7;
            min-height:100vh;
            display:flex;
            flex-direction:column;
        }

        /* Navbar */
        nav{
            background:#c8a2ff;
            color:white;
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
            font-weight:bold;
            transition:.3s;
        }

        nav ul li a:hover{
            color:#fdf4ff;
        }

        main{
            flex:1;
            padding:30px;
        }

        form{
            width:420px;
            margin:20px auto;
            background:white;
            padding:30px;
            border-radius:15px;
            box-shadow:0 8px 20px rgba(63, 38, 38, 0.1);
        }

        label{
            display:block;
            margin-top:15px;
            color:#6a1b9a;
            font-weight:600;
            font-size:15px;
        }

        input,select{
            width:100%;
            padding:10px;
            margin-top:8px;
            border:1px solid #e2bdc9;
            border-radius:8px;
            outline:none;
            font-family:"Sarabun",sans-serif;
            font-size:15px;
        }

        input:focus,
        select:focus{
            border:1px solid rgb(107, 47, 49);
        }

        button{
            width:100%;
            margin-top:25px;
            padding:12px;
            background:#b388eb;
            color:white;
            border:none;
            border-radius:8px;
            cursor:pointer;
            font-size:16px;
            font-family:"Sarabun",sans-serif;
            display:flex;
            align-items:center;
            justify-content:center;
            gap:8px;
            transition:.3s;
        }

        button:hover{
            background:#9b59b6;
        }

        footer{
            background:#c8a2ff;
            color:white;
            text-align:center;
            padding:18px;
            margin-top:auto;
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

<main>

    <?php


      $id = $_GET["id"];

     include "action/connect.php";
         // Report all PHP errors
    error_reporting(E_ALL);

    // Force errors to be displayed on the screen
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

     $sql = "SELECT * FROM orders WHERE  order_id='$id'";

     $result = mysqli_query($con, $sql);

     $order =mysqli_fetch_assoc($result);

//var_dump($result);
?>

  <form action="action/update_order.php" method="post">

 <label for="">ชื่อผู้เข้าพัก</label>
 <input type="text" name="name" value="<?= $order["name"] ?>" > <br>

 <label for="">การจ่ายเงิน</label>
 <input type="text" name="payment" value="<?= $order["payment"] ?>" > <br>

 <label for="">ประเภทการใช้งาน</label>
 <input type="text" name="usage_type" value="<?= $order["usage_type"] ?>" > <br>

 <label for="">ภาพผู้เข้าพัก</label>
 <input type="text" name="image" value="<?= $order["image"] ?>" > <br>


      <?php
      include "action/connect.php";

      $sql = "SELECT * FROM rooms";

     $result = mysqli_query($con,$sql);

    ?>

     <label for="select rooms">เลือกห้องพัก</label>
        <select name="room_id" id="">
           <?php
            foreach($result as $room){
             ?>
             <option 
                 value="<?= $room["room_id"] ?>"
                 <?= $order['room_id'] == $room['room_id']? 'selected' : '' ?>
                 >
                 <?=$room["room_id"] . "-" . $room["price"] . "บาท" ?>
                 </option>
             <?php
            }
        ?>

  </select>
  <input type="hidden" name="order_id" value ="<?= $order['order_id']?>">
  <br>

  <button>💾 บันทึก</button>
</form>

</main>

<!-- Footer -->
<footer>
    <p>รฐา อินทร์เทพ BIT2/3 เลขที่21</p>
</footer>

</body>
</html>
