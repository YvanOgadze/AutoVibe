<?php
//Entities/User.php
declare(strict_types= 1);

namespace Entities;
use Exceptions\WachtwoordenKomenNietOvereenException;

class User {
    private static $idMap = array();
    private $user_id;
    private $username;
    private $bio;
    private $wachtwoord;
    private $profielfoto;
    //Constructor
    public function __construct($cuser_id = null, $cusername = null, $cbio = null, $cwachtwoord = null, $profielfoto = null) {
        $this->user_id = $cuser_id;
        $this->username = $cusername;
        $this->bio = $cbio;
        $this->wachtwoord = $cwachtwoord;        
        $this->profielfoto = $profielfoto;
    }
    //Getters
    public function getUserId() {
        return $this->user_id;
    }
    public function getUserName() {
        return $this->username;
    }
    public function getBio() {
        return $this->bio;
    }
    public function getWachtwoord() {        
        return $this->wachtwoord;
    }
    public function getProfielfoto() {
        return $this->profielfoto;
    }
    //Setters
    public function setUserName($username) {
        $this->username = $username;
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
    public function setProfielfoto($profielfoto) {
        $this->profielfoto = $profielfoto;
    }
    public static function create(int $user_id, string $username, string $bio, string $wachtwoord, string $profielfoto) {
        if (!isset(self::$idMap[$user_id])) {
            self::$idMap[$user_id] = new User($user_id, $username, $bio, $wachtwoord, $profielfoto);
        }
        return self::$idMap[$user_id];
    }
}