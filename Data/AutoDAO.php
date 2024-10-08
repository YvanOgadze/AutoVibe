<?php
//Data/AutoDAO
declare(strict_types=1);

namespace Data;

use \PDO;
use Data\DBConfig;
use Entities\Auto;

class AutoDAO {
    public function getAutoLijst()  {
        $sql = "select auto_id, merk from autos";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        
        $resultset = $dbh->query($sql);
        $lijst = array();
        foreach ($resultset as $rij) {
            $auto = new Auto((int)$rij["auto_id"], (string)$rij["merk"]);
            array_push($lijst, $auto);
        }
        $dbh = null;
        return $lijst;
    }
    public function getAutoById(int $auto_id) : array {
        $sql = "select auto_id, merk from autos where auto_id = :auto_id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':auto_id' => $auto_id));
        $resultset = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $lijst = array();
        foreach($resultset as $rij) {
            $auto = new Auto((int)$rij["auto_id"], (string)$rij["merk"]);
            array_push($lijst, $auto);
        }
        $dbh = null;
        
        return $lijst;
    }
    public function bestaatAutoAl(string $merk) : bool {
        $sql = "select count(*) as aantal from autos where merk = :merk";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':merk' => $merk));
        $resultSet = $stmt->fetch(PDO::FETCH_ASSOC);
        $aantal = $resultSet['aantal'];
        if ($aantal > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function createAuto($auto) {
        if (!$this->bestaatAutoAl($auto->getMerk())) {
            $sql = "insert into autos (merk) values (:merk)";
            $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $stmt = $dbh->prepare($sql);
            $stmt->execute(array(
                ':merk' => $auto->getMerk()
            ));
            $dbh = null;
        }
    }
}