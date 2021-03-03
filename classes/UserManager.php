<?php

class UserManager {
    function loginForm(){
    ?>
        <div id="loginform">
        <div id="logtitle">Zaloguj</div>
      <form class="form" action="logowanie.php" method="POST">
                               
         <div>
            <label class="label-title" for="login">Mail:</label> <input name="login" type="text" id="login" class="form-input" placeholder="Wpisz swój email..." required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
	</div>
   
          <div>
             <label class="label-title" for="passwd">Hasło:</label> <input name="passwd" type="password" id="passwd" class="form-input" placeholder="Wpisz swoje hasło..." required autofocus>
	  </div>
                           
         <div>
            <button class="form-button" type="submit" name="zaloguj" value="zaloguj">Zaloguj</button>
          </div>
     </form>
        </div>
    <?php
    }
    function registerForm(){
    ?>
        <div id="registerform">
        <div id="regtitle">Rejestracja</div>
        <form class="form"  action="rejestracja.php" method="POST">
                              
                            <div>
                                <label class="label-title" for="regname">Imię:</label> <input name="regname" type="text" id="regname" class="form-input" placeholder="Wpisz swoje imię..." required autofocus>
				</div>
                             
                            <div>
                                <label class="label-title" for="regsurname">Nazwisko:</label> <input name="regsurname" type="text" id="regsurname" class="form-input" placeholder="Wpisz swoje nazwisko..." required autofocus>
			      </div>
                            
                            <div>
                                    <label class="label-title" for="email">Mail:</label> <input name="regmail" type="text" id="regmail" class="form-input" placeholder="Wpisz swój email..." required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
				</div>
                             
                            <div>
                                <label class="label-title" for="regpasswd">Hasło:</label> <input name="regpasswd" type="password" id="regpasswd" class="form-input" placeholder="Wpisz haslo" required autofocus>
				</div>
                           
                            <div>
                                <button class="form-button" id="subbutton" type="submit" value="Rejestracja" name="rejestracja">Załóż konto</button>
                            </div>
                   </form>
        </div>
    <?php
    }

    function login($db){
        $args = array(
            'login' => FILTER_SANITIZE_EMAIL,
            'passwd' => FILTER_SANITIZE_MAGIC_QUOTES,
        );

        $dane = filter_input_array(INPUT_POST, $args);

        $login = $dane['login'];
        $passwd = $dane['passwd'];
        $userid = $db->selectUser($login, $passwd, "users");
        var_dump($dane);

        if ($userid >=0){
            session_start();
            $result = $db->execute("DELETE FROM `zalogowani` WHERE `id_uzytkownika` = '$userid'");
            $date = new Datetime();
            $datet = $date->format("Y-m-d H:i:s");
            $sessionid = session_id();
            $db->execute("INSERT INTO `zalogowani` (`id_sesji`, `id_uzytkownika`, `czas_logowania`) VALUES ('$sessionid', '$userid', '$datet');");
        }

        return $userid;
    }

    function register($db){
        include_once "classes/User.php";
        $args = array(
            'regmail' => FILTER_SANITIZE_EMAIL,
            'regname' => FILTER_SANITIZE_MAGIC_QUOTES,
            'regsurname' => FILTER_SANITIZE_MAGIC_QUOTES,
            'regpasswd' => FILTER_SANITIZE_MAGIC_QUOTES
        );

        $dane = filter_input_array(INPUT_POST, $args);

        $name = $dane['regname'];
        $surname = $dane['regsurname'];
        $passwd = $dane['regpasswd'];
        $email = $dane['regmail'];

        $errors = "";
        foreach($dane as $key => $value){
            if ($value === false or $value === NULL or $value === ""){
                $errors .= $key . " ";
            }
        }

        $id = $db->getID($email, "users");
        if ($id >= 0){
            $errors .= "Taki użytkownik już istnieje";
        }

        if ($errors === ""){
            $user = new User($name, $surname, $email, $passwd);
            $user->saveDB($db);
            
      }
        else{
            echo "<script type='text/javascript'>
            alert('Niepoprawne dane: $errors');
            window.location = 'rejestracja.php';
            </script>";
        }
    return $errors;
  }

    function logout($db){
        session_start();
        $sessionid = session_id();
        if (isset($_COOKIE[session_name()])){
            setcookie(session_name(),"",time() - 3600,"");
            unset($_COOKIE[session_name()]);
        }
        $_SESSION = array();
        session_destroy();

        $db->execute("DELETE FROM `zalogowani` WHERE `id_sesji` = '$sessionid';");
    }

    function logoutAndRemove($db, $userId){
        $this->logout($db);
        $db->execute("DELETE FROM `users` WHERE `id` = '$userId';");
    }

    function getLoggedInUser($db, $sessionId){
        $id = -1;
        if($result = $db->safe_execute("SELECT * FROM `zalogowani` WHERE `id_sesji` = '$sessionId';")){
            $ile = $result->num_rows;
            if($ile == 1){
                $user = $result->fetch_object();
                $id = $user->id_uzytkownika; 
            }
        }
        return $id;
    }
        
}

?>