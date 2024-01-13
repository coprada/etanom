<?php
session_start();
require_once('DBConnection.php');
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ucwords(str_replace('_',' ',$page)) ?> | Etanom</title>
    <link rel="stylesheet" href="./Font-Awesome-master/css/all.min.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/jquery-ui.min.css">
    <link rel="stylesheet" href="./css/animate.css">
    <link rel="stylesheet" href="./css/custom.css">
    <link rel="stylesheet" href="./summernote/summernote-lite.min.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/jquery-ui.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./summernote/summernote-lite.min.js"></script>
    <link rel="stylesheet" href="./DataTables/datatables.min.css">
    <script src="./DataTables/datatables.min.js"></script>
    <script src="./Font-Awesome-master/js/all.min.js"></script>
    <script src="./js/wow.min.js"></script>
    <script src="./js/script.js"></script>
    <style>
           
        <style>
        body {
            background-color: black;
        }

        #topNavBar {
            background-color: black;
            height: 70px; /* Set your desired height */
        }
    </style>
</head>

<body class="bg-light">
    <main class="d-flex flex-column h-100">
        <nav class="fw-bold navbar navbar-expand-lg navbar-dark bg-dark position-fixed bg-gradient text-dark bg-opacity-0 w-100" id="topNavBar" style="z-index:4">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav" style="color: green; font-weight: bold;">
                <li class="nav-item">
                    <a class="nav-link <?php echo ($page == 'home') ? 'active' : '' ?>" aria-current="page" href="./">Etanom </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($page == 'about')? 'active' : '' ?>" aria-current="page" href="recomendation.php">Recomendation</a>
                    </li>
                    <a class="nav-link <?php echo ($page == 'about')? 'active' : '' ?>" aria-current="page" href="http://localhost/final/etanom/php-sqlite-forum/">Furom</a>
                    </li>
                </ul>
            </div>
            <div>
            <div class="">
                <?php if(isset($_SESSION['user_id'])): ?>
                    <div class="dropdown">
                <?php else: ?>
                    <a class="btn btn-secondary bg-transparent  text-light border-0 me-1" href="./?page=login_registration" >
                    </a>
                   <a class="btn btn-secondary bg-transparent  text-light border-0" href="./admin" >
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <div class="py-3 w-100 flex-grow-1" id="page-container">
        <?php 
            if(isset($_SESSION['flashdata'])):
        ?>
        <div class="dynamic_alert pt-5 container">
            <div class="alert alert-<?php echo $_SESSION['flashdata']['type'] ?>">
            <div class="float-end"><a href="javascript:void(0)" class="text-dark text-decoration-none" onclick="$(this).closest('.dynamic_alert').hide('slow').remove()">x</a></div>
                <?php echo $_SESSION['flashdata']['msg'] ?>
            </div>
        </div>
        <?php unset($_SESSION['flashdata']) ?>
        <?php endif; ?>
        <?php
            include $page.'.php';
        ?>
    </div>
    </div> 

    </main>
    <div class="modal fade" id="uni_modal" role='dialog' data-bs-backdrop="static" data-bs-keyboard="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header py-2">
            <h5 class="modal-title"></h5>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer py-1">
            <button type="button" class="btn btn-sm rounded-0 btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
            <button type="button" class="btn btn-sm rounded-0 btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
        </div>
    </div>
    <div class="modal fade" id="uni_modal_secondary" role='dialog' data-bs-backdrop="static" data-bs-keyboard="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header py-2">
            <h5 class="modal-title"></h5>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer py-1">
            <button type="button" class="btn btn-sm rounded-0 btn-primary" id='submit' onclick="$('#uni_modal_secondary form').submit()">Save</button>
            <button type="button" class="btn btn-sm rounded-0 btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
        </div>
    </div>
    <div class="modal fade" id="confirm_modal" role='dialog'>
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content rounded-0">
            <div class="modal-header py-2">
            <h5 class="modal-title">Confirmation</h5>
        </div>
        <div class="modal-body">
            <div id="delete_content"></div>
        </div>
        <div class="modal-footer py-1">
            <button type="button" class="btn btn-primary btn-sm rounded-0" id='confirm' onclick="">Continue</button>
            <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
        </div>
    </div>
    <script>
        $(function(){
            var wow = new WOW()
            wow.init();
        })
    </script>
</body>
</html>