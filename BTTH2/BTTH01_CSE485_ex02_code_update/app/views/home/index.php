<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="../public/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/layout.css">
</head>

<body>
    <?php
    include(APP_ROOT . '/app/views/layout/header1.php');
    ?>

    <div class="container-fluid p-0">
        <div class="row">
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner bg-warning">
                    <div class="carousel-item active">
                        <img src="../public/storage/images/main_header_1.jpg" class="d-block" alt="..." height="500px"
                            style="margin-left:50%; transform: translate(-50%, 0);">
                    </div>
                    <div class="carousel-item">
                        <img src="../public/storage/images/main_header_2.jpg" class="d-block" alt="..." height="500px"
                            style="margin-left:50%; transform: translate(-50%, 0);">
                    </div>
                    <div class="carousel-item">
                        <img src="../public/storage/images/main_header_3.jpg" class="d-block" alt="..." height="500px"
                            style="margin-left:50%; transform: translate(-50%, 0);">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <div class="mt-3 d-flex justify-content-center">
            <h4 style="color: #2185e1;">TOP BÀI HÁT YÊU THÍCH</h4>
        </div>

        <div class="row">
            <?php
            $count = 0;
            $maxCount = 8;
            foreach ($articles as $article) {
                if ($count==8){
                    break;
                }
                $img = "../public/storage/images/" . $article->getHinhanh();
                ?>
                <div class="col-md-3 d-flex justify-content-center py-3">
                    <div class="card" style="width: 18rem;">
                        <img src="<?= $img ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a href="<?= DOMAIN.'public/index.php?id='.$article->getMa_bviet().'&action=detail'?>" class="text-center">
                                <?= $article->getTen_bhat() ?>
                            </a>
                        </div>
                    </div>
                </div>
                <?php
                $count++;
            }
            ?>
        </div>
    </div>

    <?php
    include(APP_ROOT . '/app/views/layout/footer.php');
    ?>

    <script>
        var element = document.getElementById('trangchu');
        element.className = 'nav-link active';
    </script>
    <script src="../public/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>