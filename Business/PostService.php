<?php
//Service/PostService
declare(strict_types=1);

namespace Business;

use Data\PostDAO;
use Entities\Post;

class PostService {
    public function getPostLijst() : array {
        $postDAO = new PostDAO();
        $lijst = $postDAO->getPostLijst();
        return $lijst;
    }
    public function getPostByPostId(int $post_id) : Post {
        $postDAO = new PostDAO();
        $postData = $postDAO->getPostByPostId($post_id);
        $post = new Post((int)$postData["post_id"], (int)$postData["user_id"], (int)$postData["auto_id"], (int)$postData["bouwjaar"], (string)$postData["img"], (float)$postData["omschrijving"]);
        return $post;
    }
    public function getPostByUserId(int $user_id) : array {
        $postDAO = new PostDAO();
        $lijst = $postDAO->getPostByUserId($user_id);
        return $lijst;
    }
    public function getGameByAutoId(int $auto_id) : array {
        $postDAO = new PostDAO();
        $lijst = $postDAO->getPostByAutoId($auto_id);
        return $lijst;
    }
    public function getPostByBouwjaar(int $bouwjaar) : array {
        $postDAO = new PostDAO();
        $lijst = $postDAO->getPostByBouwjaarId($bouwjaar);
        return $lijst;
    }
    public function createPost(Post $post) : Post{
        $postDAO = new PostDAO();
        $postDAO->createPost($post);
        return $post;
    }
    /* INDIEN JE DE POST WILT AANPASSEN
    public function updatePost(Post $post) : Post{
        $postDAO = new PostDAO();
        $postDAO->updatePost($post);
        return $post;
    }
        */
    public function deletePost(int $post_id) {
        $postDAO = new PostDAO();
        $postDAO->deletePost($post_id);
    }
}