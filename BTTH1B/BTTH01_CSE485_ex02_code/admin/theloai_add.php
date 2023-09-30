<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTTH01_CSE485_ex02</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/layout.css">
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



    <div class="container-fluid vh-100" style="position: relative; padding:0;">
        <?php
        include('header.php');
        ?>
        <div class="row w-100" style="position: absolute; top:56px;">
            <div class="row w-100">
                <div class="col text-center" id="admin_content">
                    <h2>THÊM MỚI THỂ LOẠI</h2>
                    <form action="add_theloai.php" method="post">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1" name="tentheloai">Tên thể loại</span>
                            <input type="text" class="form-control" name="tentheloai">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success mx-2">Thêm</button>
                            <a href="theloai.php?key=1" style="text-decoration: none;">
                                <button type="button" class="btn btn-warning">Quay lại</button>
                            </a>
                        </div>
                    </form>

                </div>
                <div class="row w-100">
                    <div class="col">
                        <hr>
                        <h4 style="text-align:center">TLU'S MUSIC GARDEN</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var element = document.getElementById('theloai');
        element.className = 'nav-link active';
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <?php
    if (isset($_GET['check_coincide']) && $_GET['check_coincide'] == 'true') {
        echo "<script type=\"text/javascript\">
        var modal = new bootstrap.Modal(document.getElementById('exampleModal'));
        modal.show();
    </script>";
    }
    ?>
</body>

</html>
