<?php
include_once 'koneksi.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container col-md-6 mt-5">
        <div class="card">  
            <div class="card-header bg-info text-white">EDIT DATA</div>
            <div class="card-body">
                
                <?php
                $id = $_GET['id'];
                $data = "SELECT * FROM users WHERE id = $id";
                $result = mysqli_query($koneksi, $data);
                $row = mysqli_fetch_assoc($result);
               ?>
                <form action="edit.php?id=<?= $row['id']?>" class="needs-validation" novalidate method="POST">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $row['nama']?>" required>
                        <div class="invalid-feedback">Nama harus diisi.</div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="password" value="<?= $row['email']?>" required>
                        <div class="invalid-feedback">email harus diisi atau format tidak sesuai.</div>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $row['alamat']?>" required>
                        <div class="invalid-feedback">Alamat harus diisi.</div>
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">Nomor HP</label>
                        <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?= $row['no_hp']?>" required>
                        <div class="invalid-feedback">Nomor HP harus diisi.</div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="update" value="update">Simpan</button>
                </form>
                <?php
                if (isset($_POST['update'])) {
                    $nama = $_POST['nama'];
                    $email = $_POST['password'];
                    $alamat = $_POST ['alamat'];
                    $no_hp = $_POST['no_hp'];
                    $q = "UPDATE users SET nama = '$nama', email = '$email', alamat = '$alamat', no_hp = '$no_hp' WHERE id = '$id'";
                    $result = mysqli_query($koneksi, $q);
                    if ($result) {
                        header('location: index.php');
                    }
                }
               ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
            }, false)
        })
        })()
        </script>
</html>