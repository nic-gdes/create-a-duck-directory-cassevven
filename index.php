<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
<nav class="nav">
    <a href="index.php">
  <img src="./assets/images/header_duck.png" alt="yellow rubber duck" width="100px">
<div>
     <ul>
        <li>
        <a href="index.php">Home</a>
        <a href="profile.php">Profile</a>
        <a href="create-duck.php">Create</a>
        </li>
    </ul>
</div>  
</nav>
<div class="main">
<div class="welcome">
    <h2>Welcome to Duck Domain</h2>
    <p>Dive into the world of whimsy and quirkiness, where rubber ducks reign supreme! Whether you're a seasoned rubber duck enthusiast or just starting your duck-filled journey, this is your ultimate sanctuary.</p>
</div>
<div class="grid">
<div class="card1">
  <img src="./assets/images/header_duck.png" alt="Avatar" style="width:100%">
  <div class="container">
    <h4><b>John Doe</b></h4> 
    <ul>
        <li><a href="#">Item 1</a></li>
        <li><a href="#">Item 2</a></li>
        <li><a href="#">Item 3</a></li>
      </ul>
  </div>
</div>
<div class="card2">
  <img src="./assets/images/green.png" alt="Avatar" style="width:100%">
  <div class="container">
    <h4><b>John Doe</b></h4> 
    <ul>
        <li><a href="#">Item 1</a></li>
        <li><a href="#">Item 2</a></li>
        <li><a href="#">Item 3</a></li>
      </ul>
  </div>
</div>
<div class="card3">
  <img src="./assets/images/blue.png" alt="Avatar" style="width:100%">
  <div class="container">
    <h4><b>John Doe</b></h4> 
    <ul>
        <li><a href="#">Item 1</a></li>
        <li><a href="#">Item 2</a></li>
        <li><a href="#">Item 3</a></li>
      </ul>
  </div>
</div>
</div>


</main>
<div class="footer">
    <div>
        <ul>
            <li>
            <a href="index.php">Home</a>
            <a href="profile.php">Profile</a>
            <a href="create-duck.php">Create</a>
            </li>   
        </ul>
    </div>
        
<div><p><?php echo date("Y") ?> Casseven Design All Rights Reserved</p></div>
</div>
</body>
</html>