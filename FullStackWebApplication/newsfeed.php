<?php session_start()?>
<?php 
if (!isset($_SESSION['login'])){
    $_SESSION['login'] = false;
}
if ($_SESSION['login'] === false){
header("Location: login_page.php");
}?>
<?php require_once('php/functions.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap.css"/>
    <link rel="stylesheet" href="assets/newsfeed.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <script src="assets/main.js" defer></script>
    <script src="https://kit.fontawesome.com/78d03b3312.js" crossorigin="anonymous"></script>
    <title>Instakilogram</title>
</head>
<body>
    <header>
        <nav>
            <div class="navigation">
                <div class="logo">
                    <a class="no-underline" href="index.php">InstaKilogram</a>
                </div>
                <div class="navigation-search-container">
                    <i class="fa fa-search"></i>
                    <form>
                        <input class="search-field" type="text" placeholder="Search" id="search-bar">
                        <div class="search-container">
                            <div class="search-container-box">
                                    <div class="search-results">

                                    </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="navigation-icons">
                <a href="newsfeed.php" class="navigation-link">
                        <i class="fa-solid fa-house"></i>
                    </a>
                    <a href="#" class="navigation-link">
                        <i class="fa-brands fa-facebook-messenger"></i>
                    </a>
                    <a href="#" class="navigation-link">
                        <i class="fa-solid fa-heart" id="heart_nav">
                        </i>
                    </a>
                    <a href="profile_page.php" class="navigation-link user-icon">
                        <img src="<?php echo get_profile_img($_SESSION['username']); ?>" onerror="this.src='assets/default_image/default_image.jpeg';" height="30" width="30" alt="avatar" class="rounded-circle">
                    </a>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container my-5">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-8">
                <!--Add button-->
                <section class="d-flex justify-content-center w-100" id="post">
                    <button class="post-btn">Add post</button>
                </section>
                <!--Post 1-->
                <section class="newfeed my-5">
                    <div class="feed">
                        <div class="card border">
                            <div class="card-header">
                                <!-------------Author-------------->
                                <div class="row">
                                    <div class="col-8">
                                        <div class="d-flex">
                                            <img src="https://images.unsplash.com/photo-1513721032312-6a18a42c8763?w=152&h=152&fit=crop&crop=faces" class="rounded-circle" height="40" width="40" alt="Avatar">
                                            <div class="mt-2">
                                                <a href="" class="text-dark">
                                                    <strong class="mt-5 username">janedoe_</strong>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <i class="fas fa-ellipsis-h icon-size mt-2 float-right"></i>
                                    </div>
                                </div>      
                            </div>
                            <!---0----Photo---------->
                            <div>
                                <img src="https://images.unsplash.com/photo-1651936948193-229f1076037d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=755&q=80" class="w-100" alt="newpicture"/>
                            </div>
                            <!------Interaction------>
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <i class="far fa-heart heart icon-size ml-0"></i>
                                            <i class="far fa-comment icon-size mx-3"></i>
                                            <i class="far fa-paper-plane icon-size"></i>
                                            <i class="far fa-bookmark bookmark icon-size float-right"></i>
                                        </div>
                                    </div>
                                    <!----Like by---->
                                    <div class="row mt-2">
                                        <div class="col-md-8 mt-1">
                                            <small><strong class="">27,949 likes</strong></small>
                                        </div>
                                    </div>
                                    <!--Description-->
                                    <div class="row">
                                        <div class="col-md-12 mt-2">
                                            <p class="description-p">
                                                <strong class="text-dark">janedoe_</strong> lorem ipsum dolor sit amet, consectetur 
                                                lorem ipsum dolor sit
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--Post 2-->
                <section class="newfeed my-5">
                    <div class="feed">
                        <div class="card border">
                            <div class="card-header">
                                <!-------------Author-------------->
                                <div class="row">
                                    <div class="col-8">
                                        <div class="d-flex">
                                            <img src="https://images.unsplash.com/photo-1652060582510-c9e4c48dad54?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=764&q=80" style="border-radius:50%" height="40" width="40" alt="Avatar">
                                            <div class="mt-2">
                                                <a href="" class="text-dark">
                                                    <strong class="mt-5 username">janedoe_</strong>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <i class="fas fa-ellipsis-h icon-size mt-2 float-right"></i>
                                    </div>
                                </div>      
                            </div>
                            <!--------Photo---------->
                            <div>
                                <img src="https://images.unsplash.com/photo-1638913665258-ddd2bceafb30?ixlib=rb-1.2.1&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" class="w-100" alt="newpicture"/>
                            </div>
                            <!------Interaction------>
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <i class="far fa-heart heart icon-size ml-0"></i>
                                            <i class="far fa-comment icon-size mx-3"></i>
                                            <i class="far fa-paper-plane icon-size"></i>
                                            <i class="far fa-bookmark bookmark icon-size float-right"></i>
                                        </div>
                                    </div>
                                    <!----Like by---->
                                    <div class="row mt-2">
                                        <div class="col-md-8 mt-1">
                                            <small><strong class="">27,949 likes</strong></small>
                                        </div>
                                    </div>
                                    <!--Description-->
                                    <div class="row">
                                        <div class="col-md-12 mt-2">
                                            <p class="description-p">
                                                <strong class="text-dark">janedoe_</strong> lorem ipsum dolor sit amet, consectetur 
                                                lorem ipsum dolor sit
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>                
            </div>
            <div class="col-md-3"></div>
        </div>
        </div>
    </main>
</body>
</html>