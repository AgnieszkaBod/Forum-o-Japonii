<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <title>Architektura | Sztuka Japonii</title>
        <meta content="width=device-width,initial-scale=1" name="viewport">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900&display=swap&subset=latin-ext" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/normalize.css" rel="stylesheet"> 
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
                    <h2 class="section-title">Architektura</h2>
                    <div class="section-desc">
                        <p>Cechą charakterystyczną kultury japońskiej jest szacunek dla natury. Japończycy, w przeciwieństwie do Europejczyków, nie czują się panami przyrody, a jedynie jej częścią. Związane jest to także z religią shintō. Stąd w Japonii zamiłowanie do przestrzeni, również w architekturze. Inną twórczą siłą, głęboko zakorzenioną w tradycji kultury japońskiej, jest asymetria. Spotykana symetria jest odbiciem aspektów kultury chińskiej, bądź zachodniej.</p>
                        <p>Kult przyrody najłatwiej odnaleźć w architekturze świątyń i ich otoczeniu. Najważniejszym sanktuarium shintō w Japonii jest świątynia bogini słońca Amaterasu w Ise, która powstała w III wieku.</p>
                        <figure class="art"><img alt="Znane anime - naruto" src="img/byodo-in.jpg"><figcaption class="art-desc">Byōdō-in, zbudowane w 1052 roku</figcaption></figure>
                        <p>Pierwsza świątynia buddyjska powstała w Japonii w roku 558 (już nie istnieje). Najcenniejszym zabytkiem z tego okresu jest zespół świątynny Hōryū-ji, wzniesiony w latach 587–607 (obecny układ z lat 670–708; pożar w 670). Kompleks ten jest uważany za najstarszy zabytek architektury drewnianej, nie tylko w Japonii, ale na całym świecie. Jednakże i tam widać japońską inwencję wyrażającą się poprzez asymetryczne rozmieszczenie pagody.</p>
                        <div style="overflow-x: auto">
                            <table>
                                <tr>
                                    <th>Okres</th><th>Lata trwania</th></tr>
                                <tr><td>794 - 1185</td><td>Heian</td></tr>
                                <tr><td>1338 - 1573</td><td>Muromachi</td></tr>
                                <tr><td>1573 - 1603</td><td>Azuchi Momoyama</td></tr>
                                <tr><td>1603 - 1868</td><td>Edo</td></tr>
                                <tr><td>po 1868</td><td>wpływy kultury europejskiej</td></tr>
                            </table>
                        </div>
                    </div>
                </article>
            </div>
        </main>
        <footer class="footer">Agnieszka Bodziak | 2020 | Projektowanie stron WWW</footer>

    </body>
</html>
