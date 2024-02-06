<?php include('./config/db.php');

$sql = "SELECT name,favorite_foods,img_src,bio FROM ducks";

$result = mysqli_query($conn, $sql);

$ducks = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<?php include('./components/head.php'); ?>
<body>
<?php include('./components/nav.php'); ?>

<?php include('./components/grid.php'); ?>

<?php include('./components/footer.php'); ?>
</body>
</html>