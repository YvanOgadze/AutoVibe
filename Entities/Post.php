<?php
//Entities/Post.php
declare(strict_types=1);

namespace Entities;

class Post {
    private static $idMap = array();
    private $post_id;
    private $user_id;
    private $auto_id;
    private $bouwjaar;
    private $img;
    private $omschrijving;
    //Constructor
    public function __construct($cpost_id = null, $cuser_id = null, $cauto_id = null, $cbouwjaar = null, $cimg = null, $comschrijving = null) {
        $this->post_id = $cpost_id;
        $this->user_id = $cuser_id;
        $this->auto_id = $cauto_id;
        $this->bouwjaar = $cbouwjaar;
        $this->img = $cimg;
        $this->omschrijving = $comschrijving;
    }
    //Getters
    public function getPostId() : int {
        return $this->post_id;
    }
    public function getUserId() : int {
        return $this->user_id;
    }
    public function getAutoId() : int {
        return $this->auto_id;
    }
    public function getBouwjaar() : int {
        return $this->bouwjaar;
    }
    public function getImg() : string {
        return $this->img;
    }
    public function getOmschrijving() : string {
        return $this->omschrijving;
    }
    //Setters
    public function setPostId(int $post_id) {
        $this->post_id = $post_id;
    }
    public function setUserId(int $user_id) {
        $this->user_id = $user_id;
    }
    public function setAutoId(int $auto_id) {
        $this->auto_id = $auto_id;
    }
    public function setBouwjaar(int $bouwjaar) {
        $this->bouwjaar = $bouwjaar;
    }
    public function setImg(string $img) {
        $this->img = $img;
    }
    public function setOmschrijving(string $omschrijving) {
        $this->omschrijving = $omschrijving;
    }
    public static function create(int $post_id, int $user_id, int $auto_id, int $bouwjaar, string $img, string $omschrijving) {
        if (!isset(self::$idMap[$post_id])) {
            self::$idMap[$post_id] = new Post($post_id, $user_id, $auto_id, $bouwjaar, $img, $omschrijving);
        }
        return self::$idMap[$post_id];
    }
}