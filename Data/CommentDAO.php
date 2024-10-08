<?php
//Data/CommentDAO
declare(strict_types=1);

namespace Data;

use \PDO;
use Data\DBConfig;;
use Entities\Comment;

class CommentDAO {
    public function getCommentByPostId(int $post_id) : array {
        $sql = "select * from comments where post_id = :post_id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':post_id' => $post_id));
        $resultset = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $lijst = array();
        foreach($resultset as $rij) {
            $comment = new Comment((int)$rij["comment_id"], (int)$rij["post_id"], (int)$rij["user_id"], (string)$rij["comment"]);
            array_push($lijst, $comment);
        }
        $dbh = null;
        return $lijst;
    }
    public function createComment(int $post_id, int $user_id) {
        $sql = "insert into comments (post_id, user_id) values (:post_id, :user_id)";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':post_id' => $post_id, ':user_id' => $user_id));
        $dbh = null;           
    }
    public function deleteComment(int $post_id, int $user_id) {
        $sql = "delete from comments where where post_id = :post_id and user_id = :user_id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':post_id' => $post_id, ':user_id' => $user_id));
        $dbh = null;
    }
}