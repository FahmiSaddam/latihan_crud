<?php
include_once 'koneksi.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>

    <!-- Style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
</head>

<body>
    <div class="container col-md-12 mt-5">
        <div class="card">
            <div class="card-header bg-info text-white d-flex justify-content-between">
                <h4>DATA</h4>
                <a href="tambah.php" class="btn btn-outline-dark mb-2"><i class="bi bi-plus me-2"></i>TAMBAH</a>
            </div>

            <table id="myTable" class="table">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="10%">Nama</th>
                        <th width="10%">Password</th>
                        <th width="10%">Email</th>
                        <th width="10%">Alamat</th>
                        <th width="10%">Nomor HP</th>
                        <th width="10%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $data = "SELECT * FROM users";
                    $no = 1;
                    $result = mysqli_query($koneksi, $data);
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $no++; ?></th>
                            <td><?= $row['nama'] ?></td>
                            <td><?= $row['password'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['alamat'] ?></td>
                            <td><?= $row['no_hp'] ?></td>
                            <td>
                                <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-primary"><i
                                        class="bi bi-pencil me-2"></i>EDIT</a>
                                <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Apakah kamu benar ingin menghapus data ini?')"><i
                                        class="bi bi-trash me-2"></i>HAPUS</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>

    <!-- Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>

</html>