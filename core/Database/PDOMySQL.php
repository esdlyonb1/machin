<?php

namespace Database;



class PDOMySQL
{


    public static $currentPdo = null;


    public static function getPdo():\PDO
    {

        $adresseServeurMySQL = "localhost";
        $nomDeDatabase = "films";
        $username = "adminfilms";
        $password = "@8./FPKO5ZJcFyEH";


       if(self::$currentPdo === null){

           self::$currentPdo = new \PDO("mysql:host=$adresseServeurMySQL;dbname=$nomDeDatabase",
               $username,
               $password,
               [
                   \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                   \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ
               ]
           );
       }




        return self::$currentPdo;
    }









}