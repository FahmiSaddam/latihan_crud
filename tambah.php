<?php
include_once 'koneksi.php';
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Add</title>

        <!-- Style -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    </head>

<body>
        <div class="container col-md-6 mt-5">
            <div class="card">  
                <div class="card-header bg-info text-white">TAMBAH DATA</div>      
                <div class="card-body">
                    <div class="form-container">
                        <form action="tambah.php" class = "needs-validation" novalidate method="POST">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama </label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                                <div class="invalid-feedback">Nama mahasiswa harus diisi.</div>
                            </div>                      
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                <div class="invalid-feedback">Password harus diisi.</div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                                <div class="invalid-feedback">Email harus diisi atau format tidak sesuai.</div>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" required>
                                <div class="invalid-feedback">Alamat harus diisi.</div>
                            </div>
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">Nomor HP</label>
                                <input type="number" class="form-control" id="no_hp" name="no_hp" required>
                                <div class="invalid-feedback">Nomor HP harus diisi.</div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="tambah" value="tambah">Simpan</button>
                        </form>
                    </div>
                </div>        
            </div>
        </div>
                    
                <?php
                if (isset($_POST['tambah'])) {
                    $nama = $_POST['nama'];
                    $password = $_POST['password'];
                    $email = $_POST['email'];
                    $alamat = $_POST['alamat'];
                    $no_hp = $_POST['no_hp'];
                    $data = "INSERT INTO users (nama, password , email, alamat, no_hp ) VALUES ('$nama', '$password', '$email', '$alamat', '$no_hp')";
                    $result = mysqli_query($koneksi, $data);
                    if ($result) {
                        header('location: index.php');
                    }
                }
                ?>
        </div>
</body>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
