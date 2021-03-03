<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>Start | Sztuka Japonii</title>
        <meta content="width=device-width,initial-scale=1" name="viewport">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900&display=swap&subset=latin-ext" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/normalize.css" rel="stylesheet">
    </head>
    <body>
         <header class="page-header">
            <h1 class="page-title"><span class="deco-title">Sztuka Japonii</span></h1>
            <nav class="page-menu">
                <ul class="menu">
                    <?php
                        include_once "classes/Database.php";
                        include_once "classes/UserManager.php";

                        $db = new Database("localhost", "root", "", "users");
                        $um = new UserManager();

                        session_start();
                        $session_id = session_id();

                        if ($userId = $um->getLoggedInUser($db, $session_id)){
                            if ($userId > 0){
                                //$dane = $db->select("SELECT `imie` FROM `users` WHERE `id`='$userId';", array('imie'));
                                echo "
                                <li class='menu-item'><a class='menu-link' href='index.php'>Start</a></li>
                                <li class='menu-item'><a class='menu-link' href='userspace.php'>Panel użytkownika</a></li>
                                <li class='menu-item'><a class='menu-link' href='logowanie.php?action=logout'>Wyloguj</a></li>
                                <li class='menu-item'><a class='menu-link' href='kolekcja.php'>Kolekcja</a></li>
                                ";
                            }
                            else {
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
                    <h2 class="section-title">Witaj na stronie!</h2>
                    <div class="section-desc">
                        <p>Japonia to bardzo ciekawy kraj. Przez bardzo długi czas stawiał opór europejskim podbojom, co czyni go nad wyraz tajemnicznym. Jak zapoznać się z Japonią, jeżeli nie przez sztukę: obrazy, origami, anime czy tradycyjną architekturę?</p>
                        <p><strong>Sztuka Japonii</strong> przybliża kraj kwitnącej Wiśni za pomocą tych czterech dziedzin życia codziennego. Każda z nich pokaże ten kraj z nieco innej strony. Już dzisiaj dowiedz się czym jest <em>36 widoków na górę Fudżi</em> czy też skąd wziął się wyraz <em>anime</em>.</p>
                        <p>Sprawdź menu i przejdź do interesującej Cię zakładki. Załóż konto i dziel się swoją wiedzą.</p>
                    </div>
                </section>
            </div>
        </main>
        <footer class="footer">Agnieszka Bodziak | 2020 | Projektowanie stron WWW</footer>
        <?php
        
        ?>
    </body>
</html>
