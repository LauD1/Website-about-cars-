<?php

require_once 'template.php';

class dbQuery {

  static $conn = null;
  private $res;
  
  //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
  //  Private
  //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

  private function connect() {
    // poniżej: xxx - nazwa konta MySQL, yyy - hasło, zzz - baza danych MySQL
    $conn = new mysqli("localhost", "ejak", "Erykjakubus10@", "ejak");
    if (mysqli_connect_errno() != 0) {
        $em = mysqli_connect_error();
        $cnt = "<h1>Błąd połączenia z serwerem MySQL</h1>".
                "<h4>Opis błędu (zwrócony z serwera MySQL):</h4><p>$em";
        echo getPage(getMenu(), $cnt);
        die();
    }
    $conn->query("SET NAMES 'utf8'");    
    return $conn;
  }
  
  private static function checkQueryError($res) {
    if ($res===FALSE) {
        $em = self::$conn->error;
        $cnt = "<h1>Błąd zapytania SQL</h1>".
                "<h4>Treść zapytania SQL:</h4><p>{$sql}".
                "<h4>Opis błędu (zwrócony z serwera MySQL):</h4><p>$em";
        echo getPage(getMenu(), $cnt);
        die();
    }
    
  }

  //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
  //  Static
  //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

  public static function getConnection() {
    if (self::$conn == null) {
      self::$conn = self::connect();
    }
    return self::$conn;
  }

  //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
  //  Instance
  //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
  
  public function __construct($sql) {
    $this->res = self::getConnection()->query($sql);
    self::checkQueryError($this->res);
  }

  public function next() {
    return $this->res->fetch_assoc();
  }

  public function rows() {
    return self::$conn->affected_rows;
  }

  //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
  //  Static
  //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

  public static function insertQuery($sql) {
    $res = self::getConnection()->query($sql);
    self::checkQueryError($res);
    return self::getConnection()->insert_id;
  }

  public static function updateQuery($sql) {
    $res = self::getConnection()->query($sql);
    self::checkQueryError($res);
    return $res;
  }

  public static function deleteQuery($sql) {
    $res = self::getConnection()->query($sql);
    self::checkQueryError($res);
    return $res;
  }

  public static function oneRowQuery($sql) {
    $res = self::getConnection()->query($sql);
    self::checkQueryError($res);    
    return $res->fetch_assoc();
  }
  
  //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

}

?>
