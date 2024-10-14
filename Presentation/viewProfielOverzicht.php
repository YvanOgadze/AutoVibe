<section class="gebruiker-info">
    <div class="profiel-foto">
        <img class="profiel-foto" src="./img/<?php echo $gebruiker->getProfielfoto(); ?>">

    </div>
    <div class="profiel-naam">
        <div>
            <p class="username"><?php echo $gebruiker->getUserName(); ?></p>
        </div>
        <div>
            <p class="volgers">Volgers 10</p>
            <p class="volgers">Volgend 5</p>
        </div>
        <div>
            <p class="bio"><?php echo $gebruiker->getBio(); ?></p>
        </div>
    </div>
</section>
<div class="container">
    <ul>
        <?php
        foreach ($posts as $post) {
        ?>
            <li>

                <img class="post-img" src="./img/<?php echo $post->getImg(); ?>">
            </li>

        <?php
        }
        ?>
    </ul>
</div>