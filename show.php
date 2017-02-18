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
            <form id="showForm" method="" action="">
                <h4>**ข้อมูลผู้ใช้งานทั้งหมด**</h4>
                <table id="userData" border="1">
                    <thead>
                        <tr>
                            <th>ลำดับที่</th>
                            <th>อีเมล์</th>
                            <th>ชื่อ</th>
                            <th>นามสกุล</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require_once('api.php');
                            $call = new API();
                            $db = $call->db;
                            
                            $sqlCmd = "SELECT * FROM users";
                            $query = $db->query($sqlCmd);

                            $index = 1;
                            while($item = $query->fetch_array()){
                                echo "<tr>
                                    <td>".$index."</td>
                                    <td>".$item['email']."</td>
                                    <td>".$item['firstname']."</td>
                                    <td>".$item['lastname']."</td>
                                    <td><a href='index.php?update&id=".$item['id']."'>แก้ไข</a></td>
                                    <td><a href='api.php?funcName=deleteData&id=".$item['id']."'>ลบ</a></td>
                                </tr>";
                                $index++;
                            }
                        ?>
                    </tbody>
                </table><br>
                <a href="index.php"><< ไปที่หน้าเพิ่มข้อมูล</a>
            </form>
        </div>
    </section>
</body>
</html>