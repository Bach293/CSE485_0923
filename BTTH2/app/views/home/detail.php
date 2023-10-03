<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Page</title>
    <link href="../public/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/layout.css">
</head>

<body>
    <?php
    include(APP_ROOT . '/app/views/layout/header1.php');
    ?>

    <div class="row">
        <div class="col" id="detail-content">
            <div class="row h-100">
                <?php
                $img = "../public/storage/images/" . $article->getHinhanh();
                ?>
                <div class="col-md-1"></div>
                <div class="col-md-3 py-2">
                    <img src="<?= $img ?>" alt="" width="100%">
                </div>
                <div class="col-md-7 px-4">
                    <p style="color:#2185e1; font-size:23px;">
                        <?= $article->getTen_bhat() ?>
                    </p>
                    <p><b>Bài hát: <?= $article->getTen_bhat() ?></b>

                    </p>
                    <p><b>Thể loại: <?= $category->getTen_tloai() ?></b>

                    </p>
                    <p><b>Tóm tắt: <?= $article->getTomtat() ?></b>

                    </p>
                    <p><b>Nội dung: <?= $article->getNoidung() ?></b>

                    </p>
                    <p><b>Tác giả: <?= $author->getTen_tgia() ?></b>

                    </p>
                </div>
                <div class="col-md-1"></div>
            </div>
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