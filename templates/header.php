<!doctype html>
    <html lang="fr">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <title><?= $data['title']; ?></title>

            <meta content="" name="description">
            <meta content="" name="keywords">

            <!-- Favicons -->
            <link href="<?= home_url(); ?>/assets/img/favicon.png" rel="icon">
            <link href="<?= home_url(); ?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

            <link rel="stylesheet" href="<?= home_url(); ?>/assets/css/theme.css">
            <link rel="stylesheet" href="<?= home_url(); ?>/assets/css/style.css">
            <link rel="stylesheet" href="<?= home_url(); ?>/assets/css/bootstrap.css">

            <!-- Icon -->
            <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        </head>
        <body>
            <!-- ======= Mobile nav toggle button ======= -->
            <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

            <!-- Header -->
            <header id="header">
                <div class="d-flex flex-column">
                    <div class="menu-header m-4">
                        <h1 class="text-light"><a href="<?= home_url(); ?>">MY TOOLBOX</a></h1>
                    </div>

                    <!-- Navbar -->
                    <nav id="navbar" class="nav-menu navbar">
                        <ul class="mx-auto">
                            <li><a href="<?= home_url(); ?>" class="nav-link scrollto <?= is_current_url('') ? 'active' : '' ?>"><i class="bx bx-home"></i> <span>Accueil</span></a></li>
                            <li><a href="<?= home_url(); ?>/cesar" class="nav-link scrollto <?= is_current_url('/cesar') ? 'active' : '' ?>"><i class='bx bx-book-reader'></i> <span>Code césar</span></a></li>
                            <li><a href="<?= home_url(); ?>/euros-dollars" class="nav-link scrollto <?= is_current_url('/euros-dollars') ? 'active' : '' ?>"><i class='bx bx-coin'></i> <span>Euros en dollars</span></a></li>
                            <li><a href="<?= home_url(); ?>/convert-maths" class="nav-link scrollto <?= is_current_url('/convert-maths') ? 'active' : '' ?>"><i class='bx bx-shape-triangle'></i> <span>Convertion Mathématiques</span></a></li>
                            <li><a href="<?= home_url(); ?>/pourcentage" class="nav-link scrollto <?= is_current_url('/pourcentage') ? 'active' : '' ?>"> <i class='bx bxs-offer'></i> <span>Pourcentage</span></a></li>
                            <li><a href="<?= home_url(); ?>/decimal-hexadecimal" class="nav-link scrollto <?= is_current_url('/decimal-hexadecimal') ? 'active' : '' ?>"> <i class='bx bx-chip'></i> <span>Décimal en hexadécimal</span></a></li>
                            <li><a href="<?= home_url(); ?>/regle-de-trois" class="nav-link scrollto <?= is_current_url('/regle-de-trois') ? 'active' : '' ?>"><i class='bx bx-collapse-horizontal'></i> <span>Règle de trois</span></a></li>
                            <li><a href="<?= home_url(); ?>/admin" class="nav-link scrollto <?= is_current_url('/admin') ? 'active' : '' ?>"><i class='bx bx-stats'></i> <span>Espace gestion</span></a></li>
                        </ul>
                    </nav>
                    <!-- ------ -->
                </div>
            </header>
            <!-- ------ -->
            <main id="main">
