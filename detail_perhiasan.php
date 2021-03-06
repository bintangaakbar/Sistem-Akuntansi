<?php
include('./auth/config.php');
session_start();

if (isset($_SESSION)) {
    $id = $_SESSION['id'];
    $query = "SELECT * FROM user WHERE id='$id' LIMIT 1";
    $rows = mysqli_query($conn, $query);
    $select = mysqli_fetch_array($rows);
}

$id = $_GET['id'];
$querydata = "SELECT * FROM perhiasan WHERE id='$id' LIMIT 1";
$rows = mysqli_query($conn, $querydata);
$selectdata = mysqli_fetch_array($rows);
$jenis = explode(" ", $selectdata['jenis']);

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style4.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sidebars/">


    <title>Duo Putri</title>
    <link rel="icon" href="img/Duo Putri-logos.jpeg">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark" id="nav1">
        <div class="container-fluid ">
            <a class="navbar-brand" href="index.php"><img src="img/Duo Putri-logos.jpeg" class="rounded-circle" alt="" width="70px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-nav" style="margin-left: 60rem;">
                <div class="navbar-nav">
                    <a class="nav-link rounded me-5" href="index.php" style="color: white">Home</a>
                </div>
                <div class="navbar-nav">
                    <a class="nav-link rounded me-5" href="tambah.php" style="color: white">Tambah Barang</a>
                </div>
                <?php if (isset($_SESSION['nama'])) : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" style="color: orange" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $select['nama'] ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="profil.php">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="./auth/config.php?logout=logout">Logout</a></li>
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
    <div class="container mt-5 min-vh-100">
        <div class="card container row">
            <form action="./auth/config.php" method="POST" enctype="multipart/form-data">
                <h1 style="text-align: center; margin-bottom: 2rem;">Detail Data Perhiasan</h1>

                <div class="form-group mt-2 d-flex justify-content-center">
                    <img src="store/<?php echo $selectdata['gambar'] ?>" class="justify-content-center" style="width:400px" alt="...">
                </div>

                <input type="hidden" class="form-control" name="id" id="formGroupExampleInput" value="<?php echo $selectdata['id'] ?>">

                <div class="form-group mt-2">
                    <label for="formGroupExampleInput" class="mb-2"><b>Nama Perhiasan</b></label>
                    <input type="text" class="form-control" name="nama" id="formGroupExampleInput" value="<?php echo $selectdata['nama'] ?>">
                </div>

                <div class="form-group mt-2">
                    <label for="formGroupExampleInput2" class="mb-2"><b>Harga</b></label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control" name="harga" required="" value="<?php echo $selectdata['harga'] ?>">
                    </div>
                </div>

                <div class="form-group mt-2 mb-2">
                    <label for="formGroupExampleInput2" class="mb-2"><b>Deskripsi</b></label>
                    <textarea class="form-control" name="deskripsi"><?php echo $selectdata['deskripsi'] ?></textarea>
                </div>

                <!-- RADIO -->
                <div style="margin-top: 1.5 rem;">
                    <label for="inlineRadio1" class="mb-2"><b>Jenis</b></label>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis[]" id="inlineRadio1" value="Cincin" <?php if (in_array('Cincin', $jenis)) echo 'checked' ?>>
                        <label class="form-check-label" for="inlineRadio1">Cincin</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis[]" id="inlineRadio2" value="Kalung" <?php if (in_array('Kalung', $jenis)) echo 'checked' ?>>
                        <label class="form-check-label" for="inlineRadio2">Kalung</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis[]" id="inlineRadio2" value="Gelang" <?php if (in_array('Gelang', $jenis)) echo 'checked' ?>>
                        <label class="form-check-label" for="inlineRadio2">Gelang</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis[]" id="inlineRadio2" value="Anting" <?php if (in_array('Anting', $jenis)) echo 'checked' ?>>
                        <label class="form-check-label" for="inlineRadio2">Anting</label>
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
                <div class="col mt-3 mb-5 d-flex justify-content-center">
                    <button class="btn btn-primary me-4" type="submit" name="update_barang" style="width: 25%;">Update</button>
                    <button class="btn btn-danger" type="submit" name="delete_barang" style="width: 25%;">Hapus</button>
                </div>
            </form>
        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

</body>

<?php include 'footer.php'; ?>

</html>