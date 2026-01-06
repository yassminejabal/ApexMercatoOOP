<?php

class DataBases {
    public static string $servername = "localhost";
    public static string $username   = "root";
    public static string $dbName     = "apexmercato_oop_php";
    public static string $password   = "";
    public static ?PDO $connection = null;

    public static function ConnexionDataBase() {
        if (!self::$connection) {
            try {
                self::$connection = new PDO(
                    "mysql:host=" . self::$servername . ";dbname=" . self::$dbName . ";charset=utf8mb4",
                    self::$username,
                    self::$password
                );
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }
        return self::$connection;
    }
}

$connection= DataBases::ConnexionDataBase();

?>