<?php

class db {

    public static function getConnection() {
        $db = new mysqli('localhost' , 'u0811447_default','yEB_sl69', 'u0811447_azartymoney');
        $db->query('SET NAMES UTF8');
        return $db;
    }


    public static function select($query){
        $db = db::getConnection();
        $result = $db->query($query);



        if ($db->errno) {
            die('Select Error (' . $db->errno . ') ' . $db->error);
        }

        $arr = array();
        while($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        $result->close();
        $db->close();
        return $arr;
    }




    public static function insert($query){
        $db = db::getConnection();
        $result = $db->query($query);


        if ($db->errno) {
            die('insert Error (' . $db->errno . ') ' . $db->error);
        }




        $last_insert_id =  $db->insert_id;
        return $last_insert_id;
    }




    public static function update($query){
        $db = db::getConnection();
        $result =   $db->query($query);
        return $db->affected_rows;
        if ($db->errno) {
            die('update Error (' . $db->errno . ') ' . $db->error);
        }

    }





}









?>