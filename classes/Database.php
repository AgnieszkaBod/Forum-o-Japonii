<?php
class Database {
    private $sqlhandle;

    public function __construct($server, $user, $pass, $database){
        $this->sqlhandle = new mysqli($server, $user, $pass, $database);
        if($this->sqlhandle->connect_errno){
            printf("Błąd połączenia: %s\n", $this->sqlhandle->connect_error);
            exit();
        }
        if($this->sqlhandle->set_charset("utf8")){
        }
    }

    function __destruct(){
        $this->sqlhandle->close();
    }

    public function select($sql, $pola){
        $tresc = "";
        if ($result = $this->sqlhandle->query($sql)){
            $ilepol = count($pola);
            $ile = $result->num_rows;
            $tresc.="<table><tbody>";
            while($row = $result->fetch_object()){
                $tresc.="<tr>";
                for($i=0; $i<$ilepol; $i++){
                    $p = $pola[$i];
                    $tresc.="<td>".$row->$p."</td>";
                }
                $tresc.="</tr>";
            }
            $tresc.="</tbody></table>";
            $result->close();
        }
        return $tresc;
    }

    public function execute($sql){  //insert i delete są identyczne
        if ($this->sqlhandle->query($sql)) return true;
        else return false;
    }

    public function safe_execute($sql){
        if ($result = $this->sqlhandle->query($sql)) return $result;
    }

    public function selectUser($login, $passwd, $tabela){
        $id = -1;
        if($result = $this->sqlhandle->query("SELECT * FROM `$tabela` WHERE `email` = '$login';")){
          $ile = $result->num_rows;
            if ($ile == 1){
                $row = $result->fetch_object();
                $hash = $row->haslo;
                if (password_verify($passwd, $hash))
                    $id = $row->id;
            }
        }
        return $id;
    }

    public function getID($login, $tabela){
        $id = -1;
        if($result = $this->sqlhandle->query("SELECT * FROM `$tabela` WHERE `email` = '$login';")){
            $ile = $result->num_rows;
            if($ile == 1){
                $user = $result->fetch_object();
                $id = $user->id; 
            }
        }
        return $id;
    }

    public function ifAdmin($id, $tabela){
        $status = -1;
        if($result = $this->sqlhandle->query("SELECT * FROM `$tabela` WHERE `id` = '$id';")){
            $ile = $result->num_rows;
            if($ile == 1){
                $user = $result->fetch_object();
                $status = $user->status; 
            }
        }
        return $status;
    }
}
?>