<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <script src="/public/js/script.js"></script>
    <title><?= $title ?></title>
    
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="public/img/logo.png" alt="logo" class="logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                    <a class="nav-link" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="index.php?action=listFilms">Films</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="index.php?action=listGenres">Genres</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="index.php?action=listRealis">Réalisateurs</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="index.php?action=listActeurs">Acteurs</a>
                    </li>
                </ul>
                <form class="d-flex" action="index.php?action=searchAll" method="POST">
                    <input class="form-control me-sm-2" type="text" name="data" placeholder="Search">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit" name="submit">Search</button>
                </form>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="content">
            
            <?= $contenu?>
        </div>
    </main>
    <footer>

    </footer>
</body>
</html>