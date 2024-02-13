<?php

if(isset($_POST['submit']))  {

$errors = array(
    "name" => "",
    "favorite_foods" => "",
    "bio" => "",
);


$name = htmlspecialchars($_POST["name"]);
$favorite_foods = htmlspecialchars($_POST["favorite_foods"]);
$bio = htmlspecialchars($_POST["bio"]);

if(empty($name)) {
        $errors['name'] = "A name is required";
    } else {
        if(!preg_match('/^[a-z\s]+$/i', $name)) {
            //echo "there is a name";//
                $errors["name"]="The name has illegal characters";
            }
        }

    

//if(preg_match('/^[a-z\s]+$/i',$name)) {
    //echo "there is a name";}
   // else {
       // $errors["name"]="The name has illegal characters";}//
if(empty($favorite_foods)) {
    $errors['favorite_foods'] = "No fav foods? weirdo";
} else{
    if(!preg_match('/^[a-zA-Z,\s]+$/i',$favorite_foods)) {
        $errors["favorite_foods"]="The name must have a comma between items";
        //print_r($errors);
    }
}

if(empty($bio)) {
    $errors["bio"]="A bio is required";
}

if(!array_filter($errors)) {
    require('./config/db.php');
    $sql = "INSERT INTO ducks (name, favorite_foods, bio) VALUES ('$name', '$favorite_foods', '$bio')";

 mysqli_query($conn,$sql); 

 echo "query is successful. Added: ". $name . " to database";

 header("Location: ./index.php"); 
 }else{
        print_r($errors);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<?php include('./components/head.php'); ?>

<?php $page_title = "Contact";?>

<body>
<?php include('./components/nav.php'); ?>
<div class="contactbody">
<form action="./create-duck.php" id="create-duck" method="POST">
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
            <input type="text" id="datalist" name="favorite_foods">
             <br></li>

             <li><label for="myfile">Profile Photo</label>
            <input type="file" id="myfile" name="myfile"><br><br>
            <br></li>
           
            <li><label for="message">Duck Biography</label>
            <textarea id="message" name="bio" rows="4"></textarea>
            <br></li>
        </ol>
        <input type="submit" value="submit" name="submit">
</fieldset>
</form>
</div>
<?php include('./components/footer.php'); ?>
</body>
<html>