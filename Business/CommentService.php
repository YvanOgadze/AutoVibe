<?php
//Service/CommentService
declare(strict_types=1);

namespace Business;

use Data\CommentDAO;

class CommentService {
    public function getCommentByPostId(int $post_id) : array {
        $commentDAO = new CommentDAO();
        $lijst = $commentDAO->getCommentByPostId($post_id);
        return $lijst;
    }
    public function createComment(int $post_id, int $user_id) {
        $commentDAO = new CommentDAO();
        $commentDAO->createComment($post_id, $user_id);
    }
    public function deleteComment(int $post_id, int $user_id) {
        $commentDAO = new CommentDAO();
        $commentDAO->deleteComment($post_id, $user_id);
    }
}