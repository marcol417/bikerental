<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BIKE RENTAL</title>

    <link rel="shortcut icon" type="image/png" href="favicon.png"/>
 
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
   <!--  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">



</head>

<body>

<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading"><a href="index.php">BIKE RENTAL</a> </div>
        <div class="list-group list-group-flush">
            <a href="locations.php" class="list-group-item list-group-item-action bg-light">Gestion des locations</a>
            <a href="analyses.php" class="list-group-item list-group-item-action bg-light">Analyses statistiques</a>
        </div>

        

    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <button class="btn btn-primary" id="menu-toggle">Menu</button>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Administration
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="localisations.php">Localisations</a>
                            <a class="dropdown-item" href="villes.php">Villes</a>
                            <a class="dropdown-item" href="responsables.php">Responsables</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="types.php">Types de Velo</a>
                            <a class="dropdown-item" href="velos.php">Velos</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="clients.php">Clients</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Gestion
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="locations.php">Locations de Velo</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="analyses.php">Analyses</a>
                    </li>
                </ul>
            </div>
        </nav>


