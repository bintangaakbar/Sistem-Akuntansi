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

        $query = "UPDATE user set  nama='$nama',  no_hp='$no_hp',  password='$password' WHERE id = '$id' ";
        mysqli_query($conn, $query);

        $_SESSION['message'] = 'Berhasil update profile';
        setcookie('warna', $warna, strtotime('+6 days'), '/');

        header("Location: ../profil.php");
    } else {
        $_SESSION['message'] = 'Password Tidak sama';

        header("Location: ../profil.php");
    }
}


if (isset($_POST['tambah'])) {
    $id = $_GET['id'];
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $jenis = implode(" ", $_POST['jenis']);
    $gambar = $_FILES['gambar']['name'];

    $query = "INSERT INTO perhiasan (nama, deskripsi, harga, jenis, gambar) 
    VALUES ('$nama', '$deskripsi', '$harga', '$jenis', '$gambar')";

    if (($gambar) > 0) {
        if (is_uploaded_file($_FILES['gambar']['tmp_name'])) {
            move_uploaded_file($_FILES['gambar']['tmp_name'], "file/" . $gambar);
        }
    }
    $insert = mysqli_query($conn, $query);

    header('Location: ../index.php');
}

function delete($request)
{
    global $conn;
    $id = $_GET['id'];
    $query = "DELETE FROM perhiasan WHERE id ='$id'";
    $update = mysqli_query($conn, $query);

    header('Location: ../index.php');
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
