<?php
include('./auth/config.php');

if (!isset($_SESSION)) {
    session_start();
}

$query = "SELECT * FROM perhiasan";
$select = mysqli_query($conn, $query);

if (isset($_SESSION)) {
    $id = $_SESSION['id'];
    $query = "SELECT * FROM user WHERE id='$id' LIMIT 1";
    $rows = mysqli_query($conn, $query);
    $select = mysqli_fetch_array($rows);
}
if (isset($_POST['login'])) {
    login($_POST);
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="Bintang_Style.css">

    <title>Duo Putri</title>
    <link rel="icon" href="img/Duo Putri-logos.jpeg">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark" id="nav1">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="img/home.jpeg" class="rounded-circle" alt="" width="70px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>



            <div class="navbar-nav" style="margin-left: 60rem;">
                <div class="navbar-nav">
                    <a class="nav-link rounded me-5" href="tambah.php" style="color: white">Tambah Barang</a>
                </div>
                <?php if (isset($_SESSION['nama'])) : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" style="color: orange" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $select['nama'] ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="profil.php">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/auth/logout.php">Logout</a></li>
                        </ul>
                        </ul>
                    </li>
                <?php else : ?>
                    <a class="nav-link" href="./auth/register.php">Register</a>
                    <a class="nav-link" href="./auth/login.php">Login</a>
                <?php endif
                ?>
            </div>
        </div>
    </nav>
</head>


<body>
    <div class="container min-vh-100" style="margin-top:9% ;">
        <div class="card container row">
            <form action="./auth/config.php" method="POST" enctype="multipart/form-data">
                <h1 style="text-align: center; margin-bottom: 2rem; margin-top:1rem;">Tambah Data Perhiasan</h1>
                <div class="form-group">
                    <label for="formGroupExampleInput" class="mb-2"><b>Nama Perhiasan</b></label>
                    <input type="text" class="form-control" name="nama" id="formGroupExampleInput" placeholder="Contoh: Berlian">
                </div>

                <div class="form-group mt-2">
                    <label for="formGroupExampleInput2" class="mb-2"><b>Harga</b></label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control" name="harga" required="" placeholder="Contoh: 100.000">
                    </div>
                </div>

                <div class="form-group mt-2 mb-2">
                    <label for="formGroupExampleInput2" class="mb-2"><b>Deskripsi</b></label>
                    <textarea class="form-control" name="deskripsi"></textarea>
                </div>

                <!-- RADIO -->
                <div style="margin-top: 1.5 rem;">
                    <label for="inlineRadio1" class="mb-2 me-3"><b>Jenis</b></label>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis[]" id="inlineRadio1" value="Cincin">
                        <label class="form-check-label" for="inlineRadio1">Cincin</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis[]" id="inlineRadio2" value="Kalung">
                        <label class="form-check-label" for="inlineRadio2">Kalung</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis[]" id="inlineRadio3" value="Gelang">
                        <label class="form-check-label" for="inlineRadio3">Gelang</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis[]" id="inlineRadio4" value="Anting">
                        <label class="form-check-label" for="inlineRadio4">Anting</label>
                    </div>
                </div>


                <!-- ADD FILE -->
                <div style="margin-bottom: 3 rem;">
                    <label for="inputGroupFile01" class="mb-2 mt-3"><b>Gambar</b></label>
                    <div class="mb-3">
                        <input class="form-control" id="gambar" name="gambar" type="file">
                    </div>
                </div>

                <!-- BUTTON -->
                <div class="d-grid gap-3 col-6 mx-auto mb-3">
                    <button class="btn btn-primary" type="submit" name="tambah">Submit</button>
                </div>
        </div>
    </div>
    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

<?php include 'footer.php'; ?>

</html>