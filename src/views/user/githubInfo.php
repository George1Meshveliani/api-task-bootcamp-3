<style>
    .profile {
        padding-left: 10px;
        background: springgreen;
        border: 5px solid lightgreen;
        text-align: justify;
    }
    img {
        border-radius: 5px;
    }
</style>
<div class='profile'>
    <h1> Repos of <?= $userName ?>: </h1>
    <?php if (is_countable($repos_response) && count($repos_response) > 0) { ?>
        <h2> Number of total repositories <?= count($repos_response) ?></h2>
        <?php for ($index = 0; $index <= count($repos_response); $index++) { ?>
            <?php if (!empty($repos_response[$index])) { ?>
                <li><?php echo 'repo number ' . $index + 1 . ":" . " " . '<br>' .'id: ' . $repos_response[$index]->id ?></li>
                <a target="_blank"  href="<?php echo   $repos_response[$index]->html_url ?>">
                    <?= 'name: ' . $repos_response[$index]->name ?>
                </a>
                <br> <a target="_blank"  href="<?php echo   $repos_response[$index]->html_url ?>">
                    <?= 'url: ' . $repos_response[$index]->html_url ?>
                </a>
            <?php } ?>
        <?php } ?>
    <?php } ?>

    <h1> Followers of <?= $userName ?>: </h1>
    <?php if (is_countable($followers_response) && count($followers_response) > 0) { ?>
        <h2> Number of total followers <?= count($followers_response) ?></h2>
        <?php for ($index = 0; $index <= count($followers_response); $index++) { ?>
            <?php if (!empty($followers_response[$index])) { ?>
                <li><?php echo 'user number ' . $index + 1 ?></li>
                <a target="_blank"  href="<?php echo   $followers_response[$index]->html_url ?>">
                    <?= 'name: ' . $followers_response[$index]->login ?>
                </a>
                <a target="_blank"  href="<?php echo   $followers_response[$index]->html_url ?>">
                    <img src='<?=  $followers_response[$index]->avatar_url  ?>'width='300' height='250' />
                </a>
            <?php } ?>
        <?php } ?>
    <?php } else { ?>
        <h1> Number of requests are limited! </h1>
        <h3> Check out the documentation for more details,
            "documentation_url": "https://docs.github.com/rest/overview/resources-in-the-rest-api#rate-limiting"
        </h3>
    <?php } ?>

</div>";