<?php

class Room{
    public $name;

    static function getAllRooms(){
        global $db;
        return $db->query("SELECT * FROM rooms");
    }
}