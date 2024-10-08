<?php
//Entities/User.php
declare(strict_types= 1);

namespace Entities;
use Exceptions\WachtwoordenKomenNietOvereenException;

class User {
    private static $idMap = array();
    private $user_id;
    private $username;
    private $geslacht;
    private $bio;
    private $wachtwoord;
    //Constructor
    public function __construct($cuser_id = null, $cusername = null, $cgeslacht = null, $cbio = null, $cwachtwoord = null) {
        $this->user_id = $cuser_id;
        $this->username = $cusername;
        $this->geslacht = $cgeslacht;
        $this->bio = $cbio;
        $this->wachtwoord = $cwachtwoord;        
    }
    //Getters
    public function getUserId() {
        return $this->user_id;
    }
    public function getUserName() {
        return $this->username;
    }
    public function getGeslacht() {
        return $this->geslacht;
    }
    public function getBio() {
        return $this->bio;
    }
    public function getWachtwoord() {        
        return $this->wachtwoord;
    }
    //Setters
    public function setUserName($username) {
        $this->username = $username;
    }
    public function setGeslacht($geslacht) {
        $this->geslacht = $geslacht;
    }
    public function setBio($bio) {
        $this->bio = $bio;
    }
    public function setWachtwoord($wachtwoord, $herhaalWachtwoord) {
        if ($wachtwoord !== $herhaalWachtwoord) {
            throw new WachtwoordenKomenNietOvereenException();
        }
        $this->wachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);
    }
    public static function create(int $user_id, string $username, int $geslacht, string $bio, string $wachtwoord) {
        if (!isset(self::$idMap[$user_id])) {
            self::$idMap[$user_id] = new User($user_id, $username, $geslacht, $bio, $wachtwoord);
        }
        return self::$idMap[$user_id];
    }
}