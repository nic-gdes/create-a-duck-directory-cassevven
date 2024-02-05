<!DOCTYPE html>
<html lang="en">
<?php include('./components/head.php'); ?>

<?php 
if (isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['datalist']);
    $message = htmlspecialchars($_POST['message']);

    echo $name . ", " . $email . ", " . $message;

}
?>

<?php $page_title = "Contact";?>

<body>
<?php include('./components/nav.php'); ?>
<div class="contactbody">
<form action="" method="POST">
    <fieldset>
        <legend><h1>Create a Duck!</h1></legend>
        <ol>
            <li><label for="name">Name</label>
            <input type="text" id="name" name="name">
            <br></li>
            
            <li><label for="datalist">Favorite Foods</label>
            <input type="text" id="datalist" name="datalist">
             <br></li>

             <li><label for="myfile">Profile Photo</label>
            <input type="file" id="myfile" name="myfile"><br><br>
            <br></li>
           
            <li><label for="message">Duck Biography</label>
            <textarea id="message" name="message" rows="4"></textarea>
            <br></li>
        </ol>
        <input type="submit" value="submit" name="submit">
</fieldset>
</form>
</div>
<?php include('./components/footer.php'); ?>
</body>
<html>