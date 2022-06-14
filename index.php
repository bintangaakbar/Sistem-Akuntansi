<?php
include('./auth/config.php');
session_start();
if (!$_SESSION['id']) {
    header("location:auth/login.php");
    exit();
}

$querydata = "SELECT * FROM perhiasan ORDER BY harga DESC";
$selectdata = mysqli_query($conn, $querydata);

$querydata1 = "SELECT * FROM perhiasan";
$selectdata1 = mysqli_query($conn, $querydata1);

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
                            <li><a class="dropdown-item" href="./auth/logout.php">Logout</a></li>
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
    <!-- END NAVBAR -->
</head>

<body>
    <!-- CARD -->
    <section class="container mt-5 min-vh-100">
        <h1 class="d-flex justify-content-center" style="font-family: 'Courier New', monospace;"><b>Flagship DuoPutri</b></h1>
        <div class="d-flex justify-content-center flex-wrap">
            <?php if ($selectdata->num_rows > 0) { ?>
                <?php while ($selects = mysqli_fetch_assoc($selectdata)) { ?>
                    <div class=" card p-3 me-3 mt-4" style="width: 18rem;">
                        <img src="store/<?php echo $selects['gambar'] ?>" class="card-img-top " alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $selects['nama'] ?></h5>
                            <p class="card-text"><?php echo $selects['deskripsi'] ?></p>
                        </div>
                        <a href="detail_perhiasan.php?id=<?php echo $selects['id'] ?>" class="btn btn-primary">Tampilkan Lebih Lanjut</a>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <div class="container" style="margin-top: 10rem; text-align:center;">
                    <h3 class="mb-4">Inventori kosong</h3>
                    <hr style="height:5px; width:80%; border-width:0; color:aqua; margin:auto">
                    <p class="mt-2">Klik tombol Tambah untuk menambahkan data baru!</p>
                    <a href="tambah.php" type="button" class="btn btn-secondary btn-md">Tambah</a>
                </div>
            <?php } ?>
        </div>
        <!-- ENDING CARD -->

        <!-- TABLE -->
        <div class="mt-5 mb-4">
            <h1 class="d-flex justify-content-center" style="font-family: 'Courier New', monospace;"><b>Data Toko</b></h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nomor</th>
                        <th scope="col">Nama Perhiasan</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $number = 1;
                    $total = 0;
                    while ($select = mysqli_fetch_assoc($selectdata1)) :
                    ?>
                        <tr>
                            <th scope="row"><?php echo $number++  ?></th>
                            <td><?php echo $select['nama'] ?></td>
                            <td><?php echo $select['jenis'] ?></td>
                            <td><?php echo $select['deskripsi'] ?></td>
                            <td><?php echo $select['harga'] ?></td>
                            <td class="d-flex">
                                <a href="detail_perhiasan.php?id=<?php echo $select['id'] ?>" class="btn btn-primary me-2"> Detail </a>
                                <form action="./auth/config.php" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id" hidden value="<?php echo $select['id'] ?>">
                                    <button class="btn btn-danger" type="submit" name="delete_barang">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
        </div>
        <!-- ENDING TABLE -->

    </section>




    <?php include 'footer.php'; ?>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>



</html>