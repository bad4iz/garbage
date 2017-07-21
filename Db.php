<?php

class Db {
    public $link;

    function __construct($bd_name) {
        $db_base = $bd_name;
        $db_host = "localhost";
        $db_user = "root";
        $db_pass = "";
        $this->link = mysqli_connect($db_host, $db_user, $db_pass, $db_base);
    }

    function select_one($par) {
        return mysqli_fetch_array(mysqli_query($this->link, $par));
    }

    function select($par) {
        $result = mysqli_query($this->link, $par);
        $array = array();
        if ($result) {
            while ($row = mysqli_fetch_array($result)) {
                $array[] = $row;
            }
        }
        return $array;
    }

    function exist($par) {
        $result = mysqli_num_rows(mysqli_query($this->link, $par));
        if ($result == 0) {
            return false;
        } else {
            return true;
        }
    }

    /**
     *  добавить запись и получить id
     * @param $par
     * @return bool|int|string
     */
    function addAndGetId($par) { //
        $result = mysqli_query($this->link, $par);
        echo $par;
        if (!$result) {
        return false;
        }
        return mysqli_insert_id($this->link);
    }

    /**
     * @param $par
     * @return array|null
     */
    function selectAssoc($par) {
        $result = mysqli_query($this->link, $par);
        $arrayAssoc = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $arrayAssoc;
    }

    function sql($par) {
        return mysqli_query($this->link, $par);
    }

    /**
     * @param $par
     * @return int|string
     */
    function delete($par) {
        mysqli_query($this->link, $par);
        return mysqli_insert_id($this->link);
    }

}
