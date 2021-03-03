<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <title>Anime | Sztuka Japonii</title>
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
                            $dane = $db->select("SELECT `imie` FROM `users` WHERE `id`='$userId';", array('imie'));
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
                                <li class='menu-item'><a class='menu-link' href='kolekcja.html'>Kolekcja</a></li>
                                ";
                        }
                    }
                    ?>
                </ul>
            </nav>
        </header>
        <main>
            <div class="wrapper">
                <article>
                    <h2 class="section-title">Anime</h2>
                    <div class="section-desc">
                        <p>Origami - to sztuka kunsztownego składania papieru, której tradycja w Japonii kontynuowana jest do dzisiaj. W języku japońskim „origami“ oznacza czynność składania papieru.</p>
                        <p>Na przełomie XVII i XVIIIw. Japończycy opracowali własną metodę produkcji papieru nazywanego „washi“ zróżnicowanego w grubości, fakturze, kolorystyce i stopniu przejrzystości. W tymże okresie pojawiły się takie wzory origami jak m.in.: „żuraw“, „żaba“, „karp“, „motyl“, „kwiaty“ a także wzory lalek - postaci ze sztuk teatralnych.</p><figure class="art"><img alt="" src="img/origami.jpg"><figcaption class="art-desc">Przykład różnych origami</figcaption></figure>
                        <p>Tradycyjne formy noszą w sobie często symboliczne treści. „Żuraw“ jest symbolem zdrowia i pokoju a „żaba“ - płodności. Do dobrego tonu w Japonii należy wręczenie komuś w prezencie własnoręcznie wykonanego „żurawia“ (jeden „żuraw“ to 100 lat życia w zdrowiu i szczęściu). Większość wzorów origami wykonuje się z kwadratowego kawałka papieru, rzadziej z trójkąta równobocznego, pięciokąta czy ośmiokąta.</p>
                    </div>
                </article>
            </div>
        </main>
        <footer class="footer">Agnieszka Bodziak | 2020 | Projektowanie stron WWW</footer>

    </body>
</html>
