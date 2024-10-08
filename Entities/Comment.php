<?php
//Entities/Comment.php
declare(strict_types= 1);

namespace Entities;

class Comment {
    private $comment_id;
    private $user_id;
    private $post_id;
    private $comment;
    //Constructor
    public function __construct(int $coment_id, int $user_id, int $post_id, string $comment) {
        $this->comment_id = $coment_id;
        $this->user_id = $user_id;
        $this->post_id = $post_id;
        $this->comment = $comment;
    }
    //Getters
    public function getCommentId() : int   {
        return $this->comment_id;
    }
    public function getUserId() : int {
        return $this->user_id;
    }
    public function getPostId() : int {
        return $this->post_id;
    }
    public function getComment() : string {
        return $this->comment;
    }
    //Setters
    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }
    public function setPostId($post_id) {
        $this->post_id = $post_id;
    }
    public function setComment($comment) {
        $this->comment = $comment;
    }
}