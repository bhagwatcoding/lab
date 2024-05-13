<?php
require_once 'vendor.use.php';

session_start();
if (isset($_SESSION['hash'])):
else:
  header::redirect('login.php');
endif;

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    <title>DASHBOARD</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-light">
    <div class="container-fluid text-center p-2 main-header">
        <h2>Lab Management Stystem</h2>
    </div>
    <div class="main-container">
        <div class="side-navbar row">
            <ul class="nav nav-pills flex-column nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="pill" href="#home">
                        <span class="glyphicon glyphicon-dashboard"></span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <?php
                foreach (glob(__DIR__.'/page/*') as $k => $v):
                
                    $fileName = base::pathinfo($v, 'f');
                    echo "<li class='nav-item'>
                                <a class='nav-link' data-bs-toggle='pill' href='#$fileName'>
                                    <span class='glyphicon glyphicon-dashboard'></span>
                                    <span>$fileName</span>
                                </a>
                            </li>";
                
                endforeach;
                ?>
            </ul>
        </div>

        <div class="tab-content content">
            <?php
                foreach (glob(__DIR__.'/page/*') as $k => $v):
                    $viewSection = base::pathinfo($v, 'f');
                    echo "<div id='$viewSection' class='tab-pane fade'>";
                            require_once $v; 
                    echo "</div>";
                endforeach;
                ?>
        </div>
    </div>

    <style>
    .main-header {
        background-color: #f3f3f3;
    }

    .main-container {
        display: grid;
        width: 100%;
        grid-template: 1fr/ 180px 1fr;
        overflow: hidden;
    }

    .main-container .side-navbar {
        display: flex;
        overflow: auto;
        height: 90vh;

    }

    .main-container .content {
        height: 90vh;
        overflow: auto;
        padding: 1rem;

    }

    .main-container .side-navbar .btn {
        display: flex;
        gap: 10px;
        margin-top: 5px;
        align-items: center;
        font-size: medium;
        background-color: #f3f3f3;
    }
    </style>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>