<?php

if(isset($_POST['submit']))  {

$errors = array(
    "name" => "",
    "favorite_foods" => "",
    "bio" => "",
    "img_src" => "",
);

$name = htmlspecialchars($_POST["name"]);
$favorite_foods = htmlspecialchars($_POST["favorite_foods"]);
$bio = htmlspecialchars($_POST["bio"]);
$img_src = $_FILES["img_src"]["name"];

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

$target_directory = "./assets/images/";

$image_file = $target_directory . basename($_FILES["img_src"]["name"]);

$image_file_type = strtolower(pathinfo($image_file,PATHINFO_EXTENSION));

//image exists

if(empty($img_src)) {
    $errors["img_src"]="An image is required";
} 
//check it is an actual image

$size_check = @getimagesize($FILES["img_src"]["tmp_name"]);
$file_size = $_FILES["img_src"]["size"];
    if(!size_check) {
        $errors["img_src"] = "File is not an image";
    } else if ($file_size > 500000) {
        $errors["img_src"] = "Filesize limit exceeded.";
    } else if ($img_file_type != "jpg"
    && $img_file_type != "png"
    && $img_file_type != "jpeg"
    && $img_file_type != "gif"
    && $img_file_type != "webp"){
    $errors["img_src"] = "Sorry, only jpg, png, jpeg, gif, webp";
    } else if (move_uploaded_file($_FILES["image_src"]["tmp_name"], $image_file)) {
    } else {
        $errors["img_src"] = "Sorry, there was an  error uploading your image.";
    }


if(!array_filter($errors)) {
    


if(!array_filter($errors)) {
    require('./config/db.php');
    $sql = "INSERT INTO ducks (name, favorite_foods, bio, img_src) VALUES ('$name', '$favorite_foods', '$bio', $img_file)";

 mysqli_query($conn,$sql); 

 echo "query is successful. Added: ". $name . " to database";

 header("Location: ./index.php"); 
 }else{
        print_r($errors);
    }
}
}

?>

<!DOCTYPE html>
<html lang="en">
<?php include('./components/head.php'); ?>
 <?php include('./components/nav.php'); ?>
 <?php $page_title = "Contact"; ?>
<body>
<div class="contactbody">
<form action="./create-duck.php" id="create-duck" method="POST" enctype="multipart/form-data">
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
             <?php if (isset($errors['img_src'])) {
                echo "<div class='error'>" . $errors["img_src"] . "</div>";
            }
            ?>
            <input type="file" id="myfile" name="img_src"><br><br>
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