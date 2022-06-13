<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="Bintang_Style.css">
    <title>Created by Bintang-1202190069</title>

    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark" id="nav1">
        <div class="container-fluid">
            <a class="navbar-brand" href="Bintang_Index.php"><img src="logo-ead.png" alt="" width="105px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link btn-primary" href="bintang_tambah.php">Tambah Buku</a>
                </div>
            </div>
        </div>
    </nav>
</head>


<body>
    <div class="container mt-5">
        <div class="card containerm row">
            <form action="./auth/config.php" method="POST" enctype="multipart/form-data">
                <h1 style="text-align: center; margin-bottom: 2rem;">Tambah Data Perhiasan</h1>
                <div class="form-group">
                    <label for="formGroupExampleInput" class="mb-2"><b>Nama Perhiasan</b></label>
                    <input type="text" class="form-control" name="nama" id="formGroupExampleInput" placeholder="Contoh: Berlian">
                </div>

                <div class="form-group mt-2">
                    <label for="formGroupExampleInput2" class="mb-2"><b>harga</b></label>
                    <input type="text" class="form-control" name="harga" required="" placeholder="Contoh: 100.000">
                </div>

                <div class="form-group mt-2 mb-2">
                    <label for="formGroupExampleInput2" class="mb-2"><b>Deskripsi</b></label>
                    <textarea class="form-control" name="deskripsi"></textarea>
                </div>

                <!-- RADIO -->
                <div style="margin-top: 1.5 rem;">
                    <label for="inlineRadio1" class="mb-2"><b>Jenis</b></label>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis[]" id="inlineRadio1" value="Cincin">
                        <label class="form-check-label" for="inlineRadio1">Cincin</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis[]" id="inlineRadio2" value="Kalung">
                        <label class="form-check-label" for="inlineRadio2">Kalung</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis[]" id="inlineRadio2" value="Gelang">
                        <label class="form-check-label" for="inlineRadio2">Gelang</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis[]" id="inlineRadio2" value="Anting">
                        <label class="form-check-label" for="inlineRadio2">Anting</label>
                    </div>
                </div>


                <!-- ADD FILE -->
                <div style="margin-bottom: 3 rem;">
                    <label for="inputGroupFile01" class="mb-2 mt-3"><b>gambar</b></label>
                    <div class="mb-3">
                        <input class="form-control" id="gambar" name="gambar" type="file">
                    </div>
                </div>

                <!-- BUTTON -->
                <div class="d-grid gap-2 col-6 mx-auto">
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