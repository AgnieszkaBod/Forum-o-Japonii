<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <title>Kolekcja | Sztuka Japonii</title>
        <meta content="width=device-width,initial-scale=1" name="viewport">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900&display=swap&subset=latin-ext" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">

    </head>
    <body>
        <header class="page-header">
            <h1 class="page-title">
                <span class="deco-title">Sztuka Japonii</span></h1>
            <nav class="page-menu">
                <ul class="menu">
                    <?php
                    include_once "classes/Database.php";
                    include_once "classes/UserManager.php";

                    $db = new Database("localhost", "root", "", "users");
                    $um = new UserManager();

                    session_start();
                    $session_id = session_id();

                    if ($userId = $um->getLoggedInUser($db, $session_id)) {
                        if ($userId > 0) {
                            //$dane = $db->select("SELECT `imie` FROM `users` WHERE `id`='$userId';", array('imie'));
                            echo "
                                <li class='menu-item'><a class='menu-link' href='index.php'>Start</a></li>
                                <li class='menu-item'><a class='menu-link' href='userspace.php'>Panel użytkownika</a></li>
                                <li class='menu-item'><a class='menu-link' href='logowanie.php?action=logout'>Wyloguj</a></li>
                                <li class='menu-item'><a class='menu-link' href='kolekcja.php'>Kolekcja</a></li>
                                ";
                        } else {
                            echo "
                                <li class='menu-item'><a class='menu-link' href='index.php'>Start</a></li>
                                <li class='menu-item'><a class='menu-link' href='logowanie.php'>Logowanie</a></li>
                                <li class='menu-item'><a class='menu-link' href='rejestracja.php'>Rejestracja</a></li>
                                <li class='menu-item'><a class='menu-link' href='kolekcja.php'>Kolekcja</a></li>
                                ";
                        }
                    }
                    ?>
                </ul>
            </nav>
        </header>
        <main>
            <div class="wrapper">
                <section>
                    <h2 class="section-title">Kolekcje</h2>
                    <ul class="collection">
                        <li class="collection-item" style="background-image:url('img/obrazy.jpg')"><a class="collection-link" href="obrazy.php">Obrazy</a></li>
                        <li class="collection-item" style="background-image:url('img/origami.jpg')"><a class="collection-link" href="origami.php">Origami</a></li>
                        <li class="collection-item" style="background-image:url('img/naruto.jpg')"><a class="collection-link" href="anime.php">Anime</a></li>
                        <li class="collection-item" style="background-image:url('img/architektura.jpg')"><a class="collection-link" href="architektura.php">Architektura</a></li>
                    </ul>
                </section>
            </div>
        </main>
        <footer class="footer">Agnieszka Bodziak | 2020 | Projektowanie stron WWW</footer>

    </body>
</html>
