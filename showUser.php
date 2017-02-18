<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ระบบล็อกอิน</title>
    <?php session_start(); ?>
</head>
<body>
    <haeder>
        <h3>สวัสดีคุณ <?php echo $_SESSION['firstname']." ".$_SESSION['lastname']; ?></h3>
    </header>
    <section>
        <div id="loginSection">
            <form id="showUserForm" method="" action="">
                <b>รหัสผู้ใช้งาน :</b> <?php echo $_SESSION['id']; ?><br>
                <b>อีเมล์ :</b> <?php echo $_SESSION['email']; ?><br>
                <b>ชื่อ-นามสกุล :</b> <?php echo $_SESSION['firstname']." ".$_SESSION['lastname'] ?><br>
            </form><br>
            <a href="login.php"><< ไปที่หน้าล็อกอิน</a>
        </div>
    </section>
</body>
</html>