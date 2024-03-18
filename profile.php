<?php
$duck_is_live = false;

if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
    require('./config/db.php');
    $sql = "SELECT id, name, favorite_foods, bio, img_src FROM ducks WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    
    $duck = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);
    print_r($duck);

    if (isset($duck["id"])) {
        $duck_is_live = true;
    }

    if(isset($_POST('submit'))) {
        $id = $_POST('id_to_delete');
    }
    
}
?>

// include db connection
// build profile
// 

<!DOCTYPE html>
<html lang="en">
<?php include('./components/head.php'); ?>
<body>
<?php include('./components/nav.php'); ?>
<main>
    <?php if ($duck_is_live) : ?>
    <div class="profile">
        <div class="profile-pic">
            <img src="<?php echo $duck['img_src'];?>" alt="green duck">
        </div>
        <?php else : ?>
            <section class="no-duck">
                <h1>sorry, no duck</h1>
        </section>
        <?php endif ?>
        <div class="profile-info">
        <h2><?php echo $duck['name'];?></h2>
        <p><strong>Favorite Foods:</strong><?php echo $duck['favorite_foods'];?></p>
        <p><?php echo $duck['bio'];?></p>
        </div>
    </div>

    <form action="./index.php" method="POST">

  <input type="hidden" name="id_to_delete" value="<?php echo $duck['id']; ?>">

  <input type="submit" name="delete" value="Delete Duck">

    </form>

    <?php include('./components/footer.php'); ?>
        </main>
</body>
</html>