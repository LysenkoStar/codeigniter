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
            <a class="navbar-brand" href="#">advertisement</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample07">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item <?= ($route == '' ? 'active' : null); ?>">
                        <a class="nav-link <?= ($route == '' ? 'disabled' : null); ?>" href="/">Главная <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <ul class="navbar-nav my-2 my-lg-0">
                    <?php if (session()->get('isLoggedIn')) : ?>
                        <li class="nav-item <?= ($route == 'dashboard' ? 'active' : null); ?>">
                            <a class="nav-link <?= ($route == 'dashboard' ? 'disabled' : null); ?>" href="/dashboard">Личный кабинет</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/logout">Выйти</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item <?= ($route == 'login' ? 'active' : null); ?>">
                            <a class="nav-link <?= ($route == 'login' ? 'disabled' : null); ?>" href="/login">Войти</a>
                        </li>
                        <li class="nav-item <?= ($route == 'register' ? 'active' : null); ?>">
                            <a class="nav-link <?= ($route == 'register' ? 'disabled' : null); ?>" href="/register">Регистрация</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
