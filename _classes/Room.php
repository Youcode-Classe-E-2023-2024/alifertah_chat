<?php

class Room{
    public $name;
    static function getAllRooms(){
        $usr = $_SESSION['id'];
        global $db;
        return $db->query("SELECT ru.room_id, r.room_name, u.users_id, u.users_username
        FROM room_user ru
        JOIN rooms r ON ru.room_id = r.room_id
        JOIN users u ON ru.user_id = u.users_id
        WHERE u.users_id = $usr;
        ");
    }
}