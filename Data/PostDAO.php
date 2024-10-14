<?php
//Data/PostDAO
declare(strict_types=1);

namespace Data;

use \PDO;
use Data\DBConfig;
use Entities\Post;

class PostDAO {
    public function getPostLijst() : array {
        $sql = "select * from posts order by post_id desc";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);

        $resultset = $dbh->query($sql);
        $lijst = array();
        foreach($resultset as $rij) {
            $post = new Post((int)$rij["post_id"], (int)$rij["user_id"], (int)$rij["auto_id"], (int)$rij["bouwjaar"], (string)$rij["img"], (string)$rij["omschrijving"]);
            array_push($lijst, $post);
        }
        $dbh = null;
        return $lijst;
    }
    public function getPostByPostId(int $post_id) {
        $sql = "select * from posts where post_id = :post_id order by post_id desc";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':post_id' => $post_id));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
        $dbh = null;
        return $rij;
    }
    public function getPostByAutoId(int $auto_id) : array {
        $sql = "select * from posts where auto_id = :auto_id order by post_id desc";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':auto_id' => $auto_id));
        $resultset = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $lijst = array();
        foreach($resultset as $rij) {
            $post = new Post((int)$rij["post_id"], (int)$rij["user_id"], (int)$rij["auto_id"], (int)$rij["bouwjaar"], (string)$rij["img"], (string)$rij["omschrijving"]);
            array_push($lijst, $post);
        }
        $dbh = null;
        return $lijst;
    }
    public function getPostByUserId(int $user_id) : array {
        $sql = "select * from posts where user_id = :user_id order by post_id desc";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':user_id' => $user_id));
        $resultset = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $lijst = array();
        foreach($resultset as $rij) {
            $post = new Post((int)$rij["post_id"], (int)$rij["user_id"], (int)$rij["auto_id"], (int)$rij["bouwjaar"], (string)$rij["img"], (string)$rij["omschrijving"]);
            array_push($lijst, $post);
        }
        $dbh = null;
        return $lijst;
    }
    public function getPostByBouwjaarId(int $bouwjaar) : array {
        $sql = "select * from posts where bouwjaar = :bouwjaar";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':bouwjaar' => $bouwjaar));
        $resultset = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $lijst = array();
        foreach($resultset as $rij) {
            $post = new Post((int)$rij["post_id"], (int)$rij["user_id"], (int)$rij["auto_id"], (int)$rij["bouwjaar"], (string)$rij["img"], (string)$rij["omschrijving"]);
            array_push($lijst, $post);
        }
        $dbh = null;
        return $lijst;
    }
    public function createPost($post) {
            $sql = "insert into posts (user_id, auto_id, bouwjaar, img, omschrijving) values (:user_id, :auto_id, :bouwjaar, :img, :omschrijving)";
            $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $stmt = $dbh->prepare($sql);
            $stmt->execute(array(
                ':user_id' => $post->getUserId(),
                ':auto_id' => $post->getAutoId(),
                ':bouwjaar' => $post->getBouwjaar(),
                ':img' => $post->getImg(),
                ':omschrijving' => $post->getOmschrijving()
            ));
            $dbh = null;
    }
    public function updatePost($post) {
        $sql = "update posts set user_id = :user_id, auto_id = :auto_id, bouwjaar = :bouwjaar, img = :img, omschrijving = :omschrijving where post_id = :post_id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(
            ':post_id' => $post->getPostId(),
            ':user_id' => $post->getUserId(),
            ':auto_id' => $post->getAutoId(),
            ':bouwjaar' => $post->getBouwjaar(),
            ':img' => $post->getImg(),
            ':omschrijving' => $post->getOmschrijving()
        ));
        $dbh = null;
    }
    public function deletePost(int $post_id) {
        $sql = "delete from posts where post_id = :post_id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':post_id' => $post_id));
        $dbh = null;
    }
}