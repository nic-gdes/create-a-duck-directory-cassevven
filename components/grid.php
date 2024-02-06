<div class="main">
    <div class="welcome">
        <h2>Welcome to Duck Domain</h2>
        <div class="welcome1">
            <p>Dive into the world of whimsy and quirkiness, where rubber ducks reign supreme! <br>Whether you're a seasoned rubber duck enthusiast or just starting your duck-filled journey, this is your ultimate sanctuary.</p>
        </div>
    </div>

    <div class="card">
        <?php foreach($ducks as $duck) : ?>
        <div class="cards">
            <img src="<?php echo $duck["img_src"]; ?>">
            <ol>
                <li><h3><?php echo $duck["name"]; ?></h3></li>

                <?php               
                $foods_list = explode(",", $duck["favorite_foods"]);
                ?>

                <ul class="favorite-foods">
                    <?php foreach($foods_list as $food) : ?>
                        <li><?php echo $food; ?></li>
                    <?php endforeach; ?>
                </ul>
            </ol>
        </div>
        <?php endforeach; ?>
    </div>
</div>
