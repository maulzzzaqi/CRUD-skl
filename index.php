<?php

require 'functions.php';

$barangs = query("SELECT * FROM barang");

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center mt-5">Inventory Database</h1>
    <div class="container">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-3 mt-5" data-bs-toggle="modal" data-bs-target="#btnAdd">
            Add Item
        </button>

        <!-- Modal -->
        <div class="modal fade" id="btnAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add item</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="namaItem" class="form-label">Item Name</label>
                                <input type="text" name="namaItem" class="form-control" id="namaItem"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="kategori" class="col-form-label">Category:</label>
                                <select name="kategori" id="kategori">
                                            <option value="Electronic">Electronic</option>
                                            <option value="Kitchen">Kitchen</option>
                                            <option value="Stationery">Stationery</option>
                                            <option value="Furniture">Furniture</option>
                                            <option value="Food">Food</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="stok" class="form-label">Stock</label>
                                <input type="text" name="stok" class="form-control" id="stok"
                                    aria-describedby="emailHelp">
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="btnAdd" class="btn btn-primary">Add</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Stock</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($barangs as $barang) { ?>
                <tr>
                    <th scope="row"><?= $barang["id"]; ?></th>
                    <td><?= $barang["barang"]; ?></td>
                    <td><?= $barang["kategori"]; ?></td>
                    <td><?= $barang["stok"]; ?></td>
                    <td>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                            data-bs-target="#btnEdit<?= $barang["id"] ?>">Edit</button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#btnDelete<?= $barang["id"] ?>">Delete</button>
                    </td>
                </tr>
                <div class="modal fade" id="btnDelete<?= $barang["id"] ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="" method="post">
                                    <input name="id" type="hidden" value="<?= $barang["id"]; ?>">
                                    <button class="btn btn-danger" type="submit" name="btnDelete">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="btnEdit<?= $barang["id"] ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit data</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post">
                                    <div class="mb-3">
                                        <label for="namaItem" class="form-label">Item Name</label>
                                        <input type="text" name="namaItemEdit" value="<?= $barang["barang"]; ?>" class="form-control" id="namaItemEdit"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="kategori" class="col-form-label">Category:</label>
                                        <select name="kategoriEdit" id="kategoriEdit">
                                            <option value="Electronic">Electronic</option>
                                            <option value="Kitchen">Kitchen</option>
                                            <option value="Stationery">Stationery</option>
                                            <option value="Furniture">Furniture</option>
                                            <option value="Food">Food</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="stok" class="form-label">Stock</label>
                                        <input type="text" name="stokEdit" value="<?= $barang["stok"]; ?>" class="form-control" id="stokEdit"
                                            aria-describedby="emailHelp">
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="" method="post">
                                    <input type="hidden" name="id" value="<?= $barang["id"] ?>">
                                    <button type="submit" name="btnEdit" class="btn btn-primary">Add</button>
                                </form>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
    </div>
    <?php }
            ; ?>
    </tbody>
    </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>

<?php 

if (isset($_POST["btnAdd"])) {
    $namaitem = $_POST["namaItem"];
    $kategori = $_POST["kategori"];
    $stok = $_POST["stok"];

    mysqli_query($connection, "INSERT INTO `barang` (`id`, `barang`, `kategori`, `stok`) VALUES (NULL, '$namaitem', '$kategori', '$stok');");
    echo "<script>
    document.location.href='index.php';
    </script>";
}

if (isset($_POST["btnDelete"])) {
    $id = $_POST["id"];
    mysqli_query($connection, "DELETE FROM barang WHERE id = $id");
    echo "<script>
    document.location.href='index.php';
    </script>";
}

if (isset($_POST["btnEdit"])) {
    $id = $_POST["id"];
    $namaitem = $_POST["namaItemEdit"];
    $kategori = $_POST["kategoriEdit"];
    $stok = $_POST["stokEdit"];

    mysqli_query($connection, "UPDATE barang SET barang = '$namaitem', kategori = '$kategori', stok = '$stok' WHERE id = $id");
    echo "<script>
    document.location.href='index.php';
    </script>";
}

?>