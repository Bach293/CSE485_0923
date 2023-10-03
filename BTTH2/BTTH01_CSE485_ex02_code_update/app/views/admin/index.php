
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link href="../public/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/layout.css">
</head>

<body>
    <?php
    include(APP_ROOT . '/app/views/layout/header2.php');
    ?>

    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-3 p-5">
                <div class="posts">
                    <p style="text-align:center; color: #2185e1; margin-bottom:0px;">Người dùng</p>
                    <p style="text-align:center; font-size:30px; margin-top:0px;">
                        <?= $user ?>
                    </p>
                </div>
            </div>
            <div class="col-md-3 p-5">
                <div class="posts">
                    <p style="text-align:center; color: #2185e1; margin-bottom:0px;">Thể loại</p>
                    <p style="text-align:center; font-size:30px; margin-top:0px;">
                        <?= $category ?>
                    </p>
                </div>
            </div>
            <div class="col-md-3 p-5">
                <div class="posts">
                    <p style="text-align:center; color: #2185e1; margin-bottom:0px;">Tác giả</p>
                    <p style="text-align:center; font-size:30px; margin-top:0px;">
                        <?= $author ?>
                    </p>
                </div>
            </div>
            <div class="col-md-3 p-5">
                <div class="posts">
                    <p style="text-align:center; color: #2185e1; margin-bottom:0px;">Bài viết</p>
                    <p style="text-align:center; font-size:30px; margin-top:0px;">
                        <?= $article ?>
                    </p>
                </div>
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