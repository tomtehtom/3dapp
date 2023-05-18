<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Test View </title>
    
</head>
<body>
<h1>Second 3D App Test View </h1>
    <p>If you are seeing the test Model 3D Image Data below, then your basic MVC framework is working </p>
    <div class="box">
        <h2><?php echo $model_1 ?></h2>
        <img class="imgBox" src='../assets/images/gallery_images/<?php echo $image3D_1?>.jpg'>
    </div>
    <div class="box">
        <h2><?php echo $model_2 ?></h2>
        <img class="imgBox" src='../assets/images/gallery_images/<?php echo $image3D_2 ?>.jpg'>
    </div>
    <div class="box">
        <h2><?php echo $model_3 ?></h2>
        <img class="imgBox" src='../assets/images/gallery_images/<?php echo $image3D_3 ?>.jpg'>
    </div>
    <div class="box">
        <h2><?php echo $model_4 ?></h2>
        <img class="imgBox" src='../assets/images/gallery_images/<?php echo $image3D_4 ?>.jpg'>
    </div>
    <div class="box">
        <h2><?php echo $model_5 ?></h2>
        <img class="imgBox" src='../assets/images/gallery_images/<?php echo $image3D_5 ?>.png'>
    </div>
    <div class="box">
        <h2><?php echo $model_6 ?></h2>
        <img class="imgBox" src='../assets/images/gallery_images/<?php echo $image3D_6 ?>.png'>
    </div>

	<p>If you are seeing the test data above Model 3D Image Data, then your basic MVC framework is working </p>
</body>
</html>