<?php
foreach ($postLijst as $post) {
    $post_id = $post->getPostId();
    $user_id = $post->getUserId();
    $auto_id = $post->getAutoId();
    $bouwjaar = $post->getBouwjaar();
    $img = $post->getImg();
    $omschrijving = $post->getOmschrijving();

    $autoData = $autoSvc->getAutoById($auto_id);
    $merk = $autoData->getMerk();

    $userData = $userSvc->getUserByUserId($user_id);
    $username = $userData->getUserName();
    $userFoto = $userData->getProfielfoto();
    ?>
    <article class="post">
        <header>
            <img class="profiel-foto" src="./img/<?php echo $userFoto; ?>">
            <p class="post-header"><?php echo $username; ?></p>
            <p class="post-details"><?php echo "merk: " . $merk . " , bouwjaar: " . $bouwjaar; ?></p>
        </header>
        <img class="post-img" src="./img/<?php echo $img; ?>">
        <div class="react">
            <img src="./icons/like.svg" alt="like icoon" class="icoon">
            <img src="./icons/comment.svg" alt="comment icoon" class="icoon">
        </div>
        <div class="comments">
            <p class="username"><?php echo $username; ?> <a class="omschrijving" href="#"><?php echo $omschrijving; ?></a></p>
        </div>
    </article>
    <?php
}