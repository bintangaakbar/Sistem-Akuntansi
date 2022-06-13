<?php
include('./auth/config.php');

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION)) {
    $id = $_SESSION['id'];
    $query = "SELECT * FROM user WHERE id='$id' LIMIT 1";
    $rows = mysqli_query($conn, $query);
    $select = mysqli_fetch_array($rows);
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
    <link rel="stylesheet" href="Bintang_Style_register.css">

    <title>Duo Putri</title>
    <link rel="icon" href="img/Duo Putri-logos.jpeg">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark" id="nav1">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="img/home.jpeg" class="rounded-circle" alt="" width="70px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-nav" style="margin-left: 60rem;">
                <?php if (isset($_SESSION['nama'])) : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $select['nama'] ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="profil.php">Profil</a></li>
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
    <!-- FORM -->
    <div class="align-items-center d-flex flex-column" style="margin-top: 4rem; ">
        <div class="card" style="width: 80%;">
            <form method="POST" action="./auth/config.php">
                <h3 style="margin-top: 1rem; text-align:center">Profile</h3>
                <div>
                    <input type="hidden" name="id" value="<?php echo $select['id'] ?>">
                    <div class="modal-body">
                        <div class=" container">

                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" value="<?php echo $select['email'] ?>">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama" value="<?php echo $select['nama'] ?>">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Nomor HP</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="no_hp" value="<?php echo $select['no_hp'] ?>">
                                </div>
                            </div>

                            <div class="d-flex justify-content-center align-items-center">
                                <hr style="width: 80%;">
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Kata Sandi</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Konfirmasi Kata Sandi</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="passwordconfirm">
                                </div>
                            </div>

                            <div class="col d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary me-2" name="update">Simpan</button>
                                <a href="index.php" type="button" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

<?php include 'footer.php'; ?>


</html>