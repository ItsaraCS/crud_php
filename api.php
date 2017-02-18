<?php
    class API{
        public $db;

        public function __construct(){
            $this->connectDB();

            if(isset($_GET['funcName'])){
                $this->$_GET['funcName']();
            }
        }

        public function connectDB(){
            $configDB = [
                "host"=>"127.0.0.1",
                "username"=>"root",
                "password"=>"",
                "db"=>"test",
                "charset"=>"utf8"
            ];
            $this->db = mysqli_connect($configDB['host'], $configDB['username'], $configDB['password'], $configDB['db']);
            $this->db->set_charset($configDB['charset']);

            if(mysqli_connect_error()){
                die("<b>Error connection</b><br><b>Parse error : </b>".mysqli_connect_error());
                exit();
            }else
                return true;
        }
        
        public function insertData(){
            $email = $_POST['email'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];

            $sqlCmd = "INSERT INTO users(email, firstname, lastname) VALUES('$email', '$firstname', '$lastname')";
            $status = $this->db->query($sqlCmd);

            if($status)
                header('Location: show.php');
            else{
                die('ไม่สามารถบันทึกข้อมูลได้');
                header('Refresh: 3; url: index.php');
            }
        }

        public function updateData(){
            $id = $_GET['id'];
            $email = $_POST['email'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];

            $sqlCmd = "UPDATE users SET email = '$email', firstname = '$firstname', lastname = '$lastname' WHERE id = '$id'";
            $status = $this->db->query($sqlCmd);

            if($status)
                header('Location: show.php');
            else{
                die('ไม่สามารถแก้ไขข้อมูลได้');
                header('Refresh: 3; Url: show.php');
            }
        }

        public function deleteData(){
            $id = $_GET['id'];

            $sqlCmd = "DELETE FROM users WHERE id = '$id'";
            $status = $this->db->query($sqlCmd);

            if($status){
                echo "<script type='text/javascript'>
                            alert('ลบข้อมูลเรียบร้อย');
                            window.location = 'show.php';
                        </script>";
            }else{
                die('ไม่สามารถลบข้อมูลได้');
                header('Refresh: 3; Url: show.php');
            }
        }

        public function checkLogin(){
            $email = $_POST['email'];
            $firstname = $_POST['firstname'];

            $sqlCmd = "SELECT * FROM users WHERE email = ? AND firstname = ?";
            $query = $this->db->prepare($sqlCmd);
            $query->bind_param("ss", $email, $firstname);
            $query->execute();
            $item = $query->get_result();
            
            if($item->num_rows > 0){
                $data = $item->fetch_array();
                if(!isset($_SESSION))
                    session_start();

                $_SESSION = [
                    "id"=>$data['id'],
                    "email"=>$data['email'],
                    "firstname"=>$data['firstname'],
                    "lastname"=>$data['lastname']
                ];

                header('Location: showUser.php');
            }else{
                echo "<script type='text/javascript'>
                            alert('บัญชีผู้ใช้ไม่ถูกต้อง กรุณากรอกข้อมูลอีกครั้ง');
                            window.location = 'login.php';
                        </script>";
            }
        }
    }

    $call = new API();
?>