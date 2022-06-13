<?php
$dbhost = "localhost";
$dbuser = "root";
$dbname = "duoputri";
$dbpass = "";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) {
    echo "<script>
            alert('Failed Connect into Database')'
            </script>";
}


if (isset($_GET['logout'])) {
    session_destroy();
    session_start();
    $_SESSION['message'] = 'Berhasil Logout';
    header("Location: login.php");
}

if (isset($_POST['update'])) {
    $id = $_SESSION['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $passwordconfirm = mysqli_real_escape_string($conn, $_POST['passwordconfirm']);
    $no_hp = $_POST['no_hp'];
    $warna = $_POST['warna'];

    if ($password == $passwordconfirm) {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "UPDATE users set  nama='$nama',  no_hp='$no_hp',  password='$password' WHERE id = '$id' ";
        mysqli_query($conn, $query);

        $_SESSION['message'] = 'Berhasil update profile';
        setcookie('warna', $warna, strtotime('+6 days'), '/');

        header("Location: Bintang_profil.php");
    } else {
        $_SESSION['message'] = 'Password Tidak sama';

        header("Location: Bintang_profil.php");
    }
}



function register($request)
{
    global $conn;

    $nama = $request['nama'];
    $email = $request['email'];
    $no_hp = $request['no_hp'];
    $password = mysqli_real_escape_string($conn, $request['password']);
    $passwordconfirm = mysqli_real_escape_string($conn, $request['passwordconfirm']);

    $emailcek = "SELECT email FROM user WHERE email = '$email'";
    $select = mysqli_query($conn, $emailcek);

    if (mysqli_num_rows($select) == 0) {
        if ($password == $passwordconfirm) {
            $password = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO user VALUES ('', '$nama', '$email', '$password', '$no_hp')";
            mysqli_query($conn, $query);

            $_SESSION['register'] = 'Berhasil registrasi, silahkann login';

            header("Location: login.php");
            exit();
        } else {
            $_SESSION['message'] = 'Password Tidak sama';

            header("Location: register.php");
            exit();
        }
    }

    $_SESSION['message'] = 'Email anda sudah pernah terdaftar!';
    header("Location: register.php");
    exit();
}


function login($request)
{
    global $conn;
    $email = $request['email'];
    $password = $request['password'];


    $emailcek = "SELECT * FROM user WHERE email = '$email' ";
    $select = mysqli_query($conn, $emailcek);

    if (mysqli_num_rows($select) == 1) {
        $result = mysqli_fetch_assoc($select);

        if (password_verify($password, $result['password'])) {
            $_SESSION['id'] = $result['id'];
            $_SESSION['nama'] = $result['nama'];
            $_SESSION['email'] = $result['email'];
            $_SESSION['no_hp'] = $result['no_hp'];

            $_SESSION['message'] = 'Berhasil Login';

            header("Location: ../index.php");

            exit();
        } else {
            $_SESSION['message'] = 'Password Salah';

            header("Location: login.php");
            exit();
        }
    }

    $_SESSION['message'] = 'Gagal Login';
    header("Location: login.php");
}
