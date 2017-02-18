<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ระบบบันทึกข้อมูล</title>
</head>
<body>
    <haeder>
        <h3>ระบบบันทึกข้อมูล</h3>
    </header>
    <section>
        <div id="manageSection">
            <?php if(!isset($_GET['update'])){ ?>
                <form id="insertForm" method="post" action="api.php?funcName=insertData">
                    <h4>**เพิ่มข้อมูลผู้ใช้งาน**</h4>
                    อีเมล์ : <input type="text" name="email"><br>
                    ชื่อ : <input type="text" name="firstname"><br>
                    นามสกุล : <input type="text" name="lastname"><br><br>
                    <button type="submit" id="insertBtn">เพิ่มข้อมูล</button>
                </form>
            <?php }else{ ?>
                <form id="updateForm" method="post" action="api.php?funcName=updateData&id=<?php echo $_GET['id']; ?>">
                    <h4>**แก้ไขผู้ใช้งาน**</h4>
                    <?php
                        require_once('api.php');
                        $call = new API();
                        $db = $call->db;

                        $id = $_GET['id'];
                        $sqlCmd = "SELECT * FROM users WHERE id = '$id'";
                        $query = $db->query($sqlCmd);
                        $item = $query->fetch_assoc();
                    ?>
                    อีเมล์ : <input type="text" name="email" value="<?php echo $item['email']; ?>"><br>
                    ชื่อ : <input type="text" name="firstname" value="<?php echo $item['firstname']; ?>"><br>
                    นามสกุล : <input type="text" name="lastname" value="<?php echo $item['lastname']; ?>"><br><br>
                    <button type="submit" id="updateBtn">แก้ไขข้อมูล</button>
                </form>
            <?php } ?><br>
            <a href="show.php">>> ไปที่หน้าแสดงข้อมูล</a><br>
            <a href="login.php">>> ไปที่หน้าล็อกอิน</a>
        </div>
    </section>
</body>
</html>