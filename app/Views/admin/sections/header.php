<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title); ?></title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>

    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/main.css">
</head>
<body>
    <?php $route = (service('uri'))->getSegment(1); ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/dashboard">advertisement</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample07">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item <?= ($route == 'dashboard' ? 'active' : null); ?>">
                        <a class="nav-link <?= ($route == 'dashboard' ? 'disabled' : null); ?>" href="/dashboard">Главная <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item <?= ($route == 'profile' ? 'active' : null); ?>">
                        <a class="nav-link <?= ($route == 'profile' ? 'disabled' : null); ?>" href="/profile">Профиль</a>
                    </li>
                    <li class="nav-item <?= ($route == 'adverts' ? 'active' : null); ?>">
                        <a class="nav-link <?= ($route == 'adverts' ? 'disabled' : null); ?>" href="/adverts">Объявления</a>
                    </li>
                </ul>
                <ul class="navbar-nav my-2 my-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " href="/logout">Выйти</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
