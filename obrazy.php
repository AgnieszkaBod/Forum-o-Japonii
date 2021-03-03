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
                <article>
                    <h2 class="section-title">Obrazy</h2>
                    <div class="section-desc">
                        <p>Tradycyjnie malarstwo japońskie przedstawiało mistyczne obrazy przyrody. Wystarczy spojrzeć na obrazy szkoły Kano czy Tosa – tematem są krajobrazy, roślinność i zwierzęta. Szkoły te były reprezentowane przez środowiska arystokratyczno-samurajskie, dlatego również obrazy musiały być uosobieniem piękna i harmonii.</p>
                        <p>Przełom w tym, co postrzegano jako temat sztuki, nastąpił w Japonii w XVII wieku. To właśnie wtedy wykształcił się styl ukiyoe (jap. 浮世絵, czyli dosłownie “obrazy ulotnego świata”).</p>
                        <figure class="art"><img alt="Poranek w Nihonbashi" src="img/poranek_nihonbashi.jpg"><figcaption class="art-desc"><a href="https://pl.wikipedia.org/wiki/Hiroshige_And%C5%8D">Hiroshige</a> - Poranek w Nihonbashi</figcaption></figure>
                        <p>Ukiyoe było kierunkiem stworzonym przez mieszczan, którzy, w przeciwieństwie do arystokracji, codziennie mierzyli się z trudami rzeczywistości, i to właśnie ona była tematem w tej szkole malarstwa. Codzienne życie, ulice miast, jarmarki, sklepy, warsztaty, chłopów przy pracy w polu, widoki Japonii, a także portrety aktorów i kurtyzan. W twórczości ukiyoe bezpruderyjnie przedstawiano również sceny erotyczne. Nie zrezygnowano z krajobrazów, jednak przedstawiały one konkretne miejsca.</p>
                    </div>
                </article>
            </div>
        </main>
        <footer class="footer">Agnieszka Bodziak | 2020 | Projektowanie stron WWW</footer>
    </body>
</html>
