<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ระบบล็อกอิน</title>
</head>
<body>
    <haeder>
        <h3>ระบบล็อกอิน</h3>
    </header>
    <section>
        <div id="loginSection">
            <form id="loginForm" method="post" action="api.php?funcName=checkLogin">
                อีเมล์ : <input type="text" name="email"><br>
                ชื่อ : <input type="text" name="firstname"><br><br>
                <button type="submit" id="loginBtn">เข้าสู่ระบบ</button>
            </form><br>
            <a href="show.php">>> ไปที่หน้าแสดงข้อมูล</a>
        </div>
    </section>
</body>
</html>