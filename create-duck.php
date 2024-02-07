<?php
if(isset($_POST['submit']))  {


$errors = array(
    "name" => "",
    "favorite_foods" => "",
    "bio" => "",
);


$name = htmlspecialchars($_POST["name"]);
$favorite_foods = htmlspecialchars($_POST["datalist"]);
$message = htmlspecialchars($_POST["message"]);

if(empty($name)) {
        $errors['name'] = "A name is required";
    } else {
        if(!preg_match('/^[a-z\s]+$/i',$name)) {
            //echo "there is a name";//
        }
                $errors["name"]="The name has illegal characters";}
    

//if(preg_match('/^[a-z\s]+$/i',$name)) {
    //echo "there is a name";}
   // else {
       // $errors["name"]="The name has illegal characters";}//
if(empty($favorite_foods)) {
    $errors['datalist'] = "No fave foods? weirdo";
} else{
if(!preg_match('/[a-z,\s]+$/i',$favorite_foods)) {
}
        $errors["datalist"]="The name must have a comma between items";}
        print_r($errors);
}
if(empty($message)) {
    $errors["message"]="A bio is required";
}
if(!array_filter($errors)) {
    header("Location: ./index.php");
} else {
   
}


?>

<!DOCTYPE html>
<html lang="en">
<?php include('./components/head.php'); ?>

<?php $page_title = "Contact";?>

<body>
<?php include('./components/nav.php'); ?>
<div class="contactbody">
<form action="./create-duck.php" method="POST">
    <fieldset>
        <legend><h1>Create a Duck!</h1></legend>
        <ol>
            <li><label for="name">Name</label>
            <div class="error">A name is required</div>

            <?php if (isset($errors['name'])) {
                echo "<div class='error'>" . $errors["name"] . "</div>";
            }
            ?>
            <input type="text" id="name" name="name" value="<?php if(
                isset($name)) { echo $name; } ?>"
            />
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