<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <title>Panel użytkownika | Sztuka Japonii</title>
        <meta content="width=device-width,initial-scale=1" name="viewport">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900&display=swap&subset=latin-ext" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
          </head>
    <body class="contact-page">
        <header class="page-header">
            <h1 class="page-title"><span class="deco-title">Sztuka Japonii</span></h1>
            <nav class="page-menu"><ul class="menu">
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
            <h2 class="section-title">Witaj</h2>
                    <div class="section-desc">
                        <?php
                        include_once "classes/UserManager.php";
                        include_once "classes/Database.php";
                        include_once "classes/Posty.php";
                        
                        $db = new Database("localhost", "root", "", "users");
                        $um = new UserManager();
                        $po = new Post();
                        $session_id = session_id();
                        
                        $userId = $um->getLoggedInUser($db, $session_id);

                        if($userId > 0){
                            if (filter_input(INPUT_POST, "removeAcc")){
                                $um->logoutAndRemove($db, $userId);
                                header("Location: index.php");
                            }
                            else {
                                echo "
                                <form class='form' action='userspace.php' method='POST'>
                                <a href=dodajpost.php> <input class='form-button' type='button' value='Dodaj post' name='dodajpost'> </a>
                                <input class='form-button' type='submit' value='Pokaż posty' name='pokazpost'>
                                <a href=edytujdane.php> <input class='form-button' type='button' value='Edytuj dane' name='edytuj'> </a>
                                <input class='form-button' type='submit' value='Usuń konto' name='removeAcc'>
                              </form>
                                ";
                            }
                            if(filter_input(INPUT_POST,"pokazpost")){
                               $result= $po->pokazPost($db);
                                echo $result; 
                            }
                       }

                        else{
                            echo "Nie jesteś zalogowany!";
                         }
                         
                    ?>

                    </div>
           </section>
            </div>
        </main>
        <footer class="footer">Agnieszka Bodziak | 2020 | Projektowanie stron WWW</footer>
    </body>
</html>
