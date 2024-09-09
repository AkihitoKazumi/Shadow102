<?php

session_start(); // เริ่มต้นเซสชัน

if (isset($_POST['username']) && isset($_POST['password'])) {
  // รับค่าชื่อผู้ใช้และรหัสผ่านจาก POST
  $username = $_POST['username'];
  $password = $_POST['password'];

  // เชื่อมต่อกับฐานข้อมูล
  $db = new mysqli('localhost', 'username', 'password', 'database');

  // ตรวจสอบว่าชื่อผู้ใช้และรหัสผ่านถูกต้องหรือไม่
  $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  $result = $db->query($sql);

  if ($result->num_rows > 0) {
    // เข้าสู่ระบบสำเร็จ
    $_SESSION['username'] = $username; // เก็บชื่อผู้ใช้ในเซสชัน
    header('Location: main.php'); // ไปยังหน้าหลัก
    exit;
  } else {
    // เข้าสู่ระบบไม่สำเร็จ
    $error = 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง';
  }

  $db->close(); // ปิดการเชื่อมต่อฐานข้อมูล
}

?>

<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>หน้าเข้าสู่ระบบ</title>
</head>
<body>
  <div class="container">
    <h1>เข้าสู่ระบบ</h1>

    <?php if (isset($error)): ?>
      <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <label for="username">ชื่อผู้ใช้:</label>
      <input type="text" id="username" name="username" required><br>

      <label for="password">รหัสผ่าน:</label>
      <input type="password" id="password" name="password" required><br>

      <button type="submit">เข้าสู่ระบบ</button>
    </form>
  </div>
</body>
</html>
