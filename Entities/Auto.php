<?php
//Entities/Auto.php
declare(strict_types=1);

namespace Entities;

class Auto {
    private static $idMap = array();
    private $auto_id;
    private $merk;
    //Constructor
    public function __construct($cauto_id = null, $cmerk = null) {
        $this->auto_id = $cauto_id;
        $this->merk = $cmerk;
    }
    //Getters
    public function getAutoId() : int {
        return $this->auto_id;
    }
    public function getMerk() : string {
        return $this->merk;
    }
    //Setters
    public function setAutoId(int $auto_id) {
        $this->auto_id = $auto_id;
    }
    public function setMerk(string $merk) {
        $this->merk = $merk;
    }
    public static function create(int $auto_id, string $merk) {
        if (!isset(self::$idMap[$auto_id])) {
            self::$idMap[$auto_id] = new Auto($auto_id, $merk);
        }
        return self::$idMap[$auto_id];
    }
}