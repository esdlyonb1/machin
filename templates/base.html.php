
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $pageTitle ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-warning">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <?php if (\App\Session::getUser()){ ?>

                        <a href="#" class="nav-link active"><?= \App\Session::getUser()->getUsername() ?></a>
                        <a class="nav-link active" href="?type=user&action=signout">sign out</a>
                    <?php }else { ?>

                        <a class="nav-link active" href="?type=user&action=register">sign up</a>
                        <a class="nav-link active" href="?type=user&action=signin">sign in</a>

                    <?php } ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="?type=film&action=create">Nouveau film</a>


                </li>

            </ul>

        </div>
    </div>
</nav>

<?php if(\App\View::getInfo()) { ?>
<div class="alert alert-primary alert-dismissible fade show" role="alert">
    <strong> <?= \App\View::getInfo() ?> </strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>
<div class="container mt-5">


            <?= $pageContent ?>


</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>