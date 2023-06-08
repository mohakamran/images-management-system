<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Images Web App with PHP</title>
    <!-- link css  -->
    <link href="index.css" rel="stylesheet" />
</head>
<body>
    <!-- include php navbar -->
    <?php include "navbar.php" ?>
    <!-- end include php navbar -->
    <div class="row">
        <div class="main">
            <div class="container-image">
                <div class="image">
                    <image src="images/dummy-image.jpg" />
                    <p class="desc">This is just dummy description.</p>
                    <a class="view-more" href="#">View</a>
                </div>
                <div class="image">
                    <image src="images/dummy-image.jpg" />
                    <p class="desc">This is just dummy description.</p>
                    <a class="view-more" href="#">View</a>
                </div>
                <div class="image">
                    <image src="images/dummy-image.jpg" />
                    <p class="desc">This is just dummy description.</p>
                    <a class="view-more" href="#">View</a>
                </div>
                <div class="image">
                    <image src="images/dummy-image.jpg" />
                    <p class="desc">This is just dummy description.</p>
                    <a class="view-more" href="#">View</a>
                </div>
                <div class="image">
                    <image src="images/dummy-image.jpg" />
                    <p class="desc">This is just dummy description.</p>
                    <a class="view-more" href="#">View</a>
                </div>
                <div class="image">
                    <image src="images/dummy-image.jpg" />
                    <p class="desc">This is just dummy description.</p>
                    <a class="view-more" href="#">View</a>
                </div>

            </div>
        </div>
        <div class="sidebar">
            <div class="categories">
                <h3>Categories</h3>
                <span class="category"><a href="#">category</a></span>
                <span class="category"><a href="#">category</a></span>
                <span class="category"><a href="#">category</a></span>
                <span class="category"><a href="#">category</a></span>
                <span class="category"><a href="#">category</a></span>
            </div> 
            <div class="categories">
                <h3>Latest</h3>
                <span class="category"><a href="#">category</a></span>
                <span class="category"><a href="#">category</a></span>
                <span class="category"><a href="#">category</a></span>
                <span class="category"><a href="#">category</a></span>
                <span class="category"><a href="#">category</a></span>
            </div> 
        </div>
    </div>
</body>
</html>