
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Page</title>
    <link href="../public/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/layout.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-warning">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">THÊM THẤT BẠI</h1>
                </div>
                <div class="modal-body">
                    Lỗi dữ liệu.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <?php
    include(APP_ROOT . '/app/views/layout/header2.php');
    ?>

    <div class="container-fluid p-0">
        <div class="row">
            <div class="col text-center" id="admin_content">
                <h2>THÊM MỚI THỂ LOẠI</h2>
                <form action="<?= DOMAIN . 'public/index.php?controller=admin&action=add_category&add=true' ?>"
                    method="post">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1" name="tentheloai">Tên thể loại</span>
                        <input type="text" class="form-control" name="tentheloai">
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success mx-2">Thêm</button>
                        <a href="<?= DOMAIN . 'public/index.php?controller=admin&action=category' ?>"
                            style="text-decoration: none;">
                            <button type="button" class="btn btn-warning">Quay lại</button>
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <?php
    include(APP_ROOT . '/app/views/layout/footer.php');
    ?>

    <script>
        var element = document.getElementById('theloai');
        element.className = 'nav-link active';
    </script>
    <script src="../public/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script>
        var checkAddParam = '<?= $check_add ?>';
        if (checkAddParam == 'false') {
            var modal = new bootstrap.Modal(document.getElementById('exampleModal'));
            modal.show();
        }

        
    </script>
</body>

</html>