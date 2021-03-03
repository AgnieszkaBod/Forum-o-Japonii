<?php

class Post {

    function postForm() {
        ?>
        <div id="loginform">
            <div id="logtitle">Dodaj posty</div>
            <form class="form" action="dodajpost.php" method="POST">

                <div>
                    <label class="label-title" for="tresc">Twój post:</label> <textarea class="form-message" id="tresc" name="tresc" placeholder="Wpisz swój post..." required></textarea>
                </div>
                <div>
                    <input class='form-button' type='submit' value='Dodaj' name='dodaj'>
                </div>
            </form>
        </div>
        <?php
    }

    function dodajPost($db, $userId) {
        $args = array('tresc' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,);
        $dane = filter_input_array(INPUT_POST, $args);
        $sql = "INSERT INTO posty VALUES(NULL,'" . $userId . "','" . $dane['tresc'] . "')";
        $db->execute($sql);
    }

    function pokazPost($db) {
        $sql = "SELECT tresc from posty";
        $result = $db->select($sql, array("tresc"));
        return $result;
    }

    function edytujForm() {
        ?>
<div id="loginform">
    <div id="logtitle">Dodaj posty</div>
    <form class="form" action="edytujdane.php" method="POST">

        <div>
            <label class="label-title" for="edname">Nowe imię:</label> <input name="edname" type="text" id="edname" class="form-input" placeholder="Wpisz swoje imię..." required autofocus>
        </div>

        <div>
            <label class="label-title" for="edsurname">Nowe nazwisko:</label> <input name="edsurname" type="text" id="edsurname" class="form-input" placeholder="Wpisz swoje nazwisko..." required autofocus>
        </div>                
            <div>
            <input class='form-button' type='submit' value='Edytuj' name='edytuj'>
        </div>
    </form>
</div>
<?php
    }
    function update($db, $userId){
        $args = array(
          'edname' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
          'edsurname' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        );
        $dane = filter_input_array(INPUT_POST, $args);
        $sql ="UPDATE users SET imie='". $dane['edname']. "' , nazwisko='".$dane['edsurname']. "'WHERE id='".$userId."'";
        $db->execute($sql);
    }
    
  }
?>
