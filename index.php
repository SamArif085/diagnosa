<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Website</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
    </style>


    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-danger">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php?page=home">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=data">SDKI</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=about">About</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container-fluid">

            <?php
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                switch ($page) {
                    case 'home':
                        include "support/home.php";
                        break;
                    case 'data':
                        include "tables/datatables.php";
                        break;
                    case 'about':
                        include "support/about.php";
                        break;
                    default:
                        echo 'Halaman Web Tidak Ada';
                        break;
                }
            } else {
                include "support/home.php";
            }
            ?>
        </div>
    </main>
    <footer class="bg-success mt-auto py-3 m-2 text-center fixed-bottom">
        <!-- <p class="float-end"><a href="#">Back to top</a></p> -->
        <div class="container text-light">
            <span> Copyright &copy;2022 - <span> <a href="https://github.com/SamArif085">Samarif085</a>
                    & <a href="https://github.com/YASA1102">YASA1102</a>
                </span>
        </div>
    </footer>


    <!-- <script src="../assets/dist/js/bootstrap.bundle.min.js"></script> -->
    <!-- JavaScript Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#datatable').DataTable({
            responsive: true
        });
    });
    </script>


</body>

</html>