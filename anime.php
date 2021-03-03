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
                    <h2 class="section-title">Origami</h2>
                    <div class="section-desc">
                        <p>Słowo „anime” powstało od skróconego angielskiego „animation” i oznacza film animowany. W Kraju Kwitnącej Wiśni tym terminem określa się wszystkie seriale i filmy animowane, bez względu na to gdzie powstały. Poza Japonią słowem „anime” nazywa się japońską animację. Składa się ona z filmów, seriali telewizyjnych oraz OAV (miniseriali).</p>
                        <p>Po raz pierwszy tego terminu użył pochodzący z Japonii teoretyk filmowy- Taihei Imamura. W latach 40. ubiegłego wieku zastąpił on dotychczas stosowane określenie manga-eiga.</p>
                        <figure class="art"><img alt="Znane anime - naruto" src="img/naruto.jpg"><figcaption class="art-desc">Znane anime - <em>Nauruto</em></figcaption></figure>
                        <p>Historia japońskiej animacji rozpoczęła się na początku XX w. W owym czasie Japończycy zaczęli eksperymentować z technikami animacji stosowanymi w Niemczech, USA, Rosji czy we Francji. Pierwszy film animowany stworzony w Kraju Kwitnącej Wiśni był pięciominutowym dziełem Otena Shimokawy pt. „Imokawa Mukuzō Genkanban no Maki” (1917 r.). Natomiast za pierwszy światowy sukces japońskiej animacji uznano „Momotarō” autorstwa Seitarō Kitayamy z 1918 r.</p>
                    </div>
                </article>
            </div>
        </main>
        <footer class="footer">Agnieszka Bodziak | 2020 | Projektowanie stron WWW</footer>

    </body>
</html>
