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

    <!-- Toasts Add-->
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast_add" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <i class="bi bi-check-lg"></i>
                <strong class="me-auto"></strong>
                <small>1 mins ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Bạn đã thêm thể loại thành công.
            </div>
        </div>
    </div>

    <!-- Toasts Delete-->
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast_delete" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <i class="bi bi-check-lg"></i>
                <strong class="me-auto"></strong>
                <small>1 mins ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Bạn đã xóa thể loại thành công.
            </div>
        </div>
    </div>

    <!-- Toasts Edit-->
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast_edit" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <i class="bi bi-check-lg"></i>
                <strong class="me-auto"></strong>
                <small>1 mins ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Bạn đã sửa thể loại thành công.
            </div>
        </div>
    </div>

    <div class="container-fluid vh-100" style="position: relative; padding:0;">
        <?php
        include('header.php');
        ?>
        <div class="row w-100" style="position: absolute; top:56px;">
            <div class="row w-100">
                <div class="col" id="admin_content">
                    <a href="theloai_add.php"><button class="btn btn-success">Thêm mới</button></a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên thể loại</th>
                                <th scope="col" style="width:200px">Sửa</th>
                                <th scope="col" style="width:200px">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include('../connection.php');

                            $stmt = $conn->prepare("SELECT count(ma_tloai) AS count_theloai
                                    FROM theloai");
                            $stmt->execute();
                            $result = $stmt->fetch(PDO::FETCH_ASSOC);
                            $quantity = 6;
                            $pages = $result['count_theloai'] / $quantity;
                            $pages = ceil($pages);

                            if (isset($_GET['key'])) {
                                $key = $_GET['key'];
                            } else {
                                $key = 1;
                            }
                            $offset = ($key - 1) * $quantity;
                            if ($key == 1) {
                                $previous = $key;
                                $next = $key + 1;
                            } else if ($key == $pages) {
                                $previous = $key - 1;
                                $next = $key;
                            } else {
                                $previous = $key - 1;
                                $next = $key + 1;
                            }

                            $stmt = $conn->prepare("SELECT * FROM theloai LIMIT $offset, $quantity");
                            $stmt->execute();

                            if ($stmt->rowCount() > 0) {
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <tr>
                                        <th scope="row" id="<?= $row['ma_tloai'] ?>">
                                            <?= $row['ma_tloai'] ?>
                                        </th>
                                        <td>
                                            <?= $row['ten_tloai'] ?>
                                        </td>
                                        <td>
                                            <a href="theloai_edit.php?id=<?= $row['ma_tloai'] ?>"><i class="bi bi-pencil-square"></i></a>
                                        </td>
                                        <td>
                                            <a href="delete_theloai.php?id=<?= $row['ma_tloai'] ?>" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal"><i class="bi bi-trash3-fill"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "0 results";
                            }
                            ?>

                        </tbody>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Cảnh báo</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Bạn chắc chắn muốn xóa chứ ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Quay
                                            lại</button>
                                        <button type="button" class="btn btn-primary" id="deleteButton">Xác nhận</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </table>
                    <div class="d-flex justify-content-end">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link"
                                        href="theloai.php?key=<?= $previous ?>">Previous</a></li>
                                <?php
                                for ($i = 1; $i <= $pages; $i++) {
                                    if ($i == 1) {
                                        ?>
                                        <li class="page-item"><a class="page-link active" id="<?= $i ?>"
                                                href="theloai.php?key=<?= $i ?>">
                                                <?= $i ?>
                                            </a></li>
                                        <?php
                                        continue;
                                    }
                                    ?>
                                    <li class="page-item"><a class="page-link" id="<?= $i ?>"
                                            href="theloai.php?key=<?= $i ?>">
                                            <?= $i ?>
                                        </a></li>
                                    <?php
                                }
                                ?>
                                <li class="page-item"><a class="page-link" href="theloai.php?key=<?= $next ?>">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
            <div class="row w-100">
                <div class="col">
                    <hr>
                    <h4 style="text-align:center">TLU'S MUSIC GARDEN</h4>
                </div>
            </div>
        </div>

    </div>

    <script>
        var element = document.getElementById('theloai');
        element.className = 'nav-link active';
        var key = document.getElementById('<?= $key ?>');
        if (key.id != '1') {
            var key1 = document.getElementById('1');
            key1.className = 'page-link';
            key.className = 'page-link active';
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function () {
            var urlParams = new URLSearchParams(window.location.search);
            var checkAddParam = urlParams.get('check_add');

            if (checkAddParam === 'true') {
                var toastElement = document.getElementById('liveToast_add');
                var toast = new bootstrap.Toast(toastElement);
                toast.show();
            }
        });

        document.addEventListener("DOMContentLoaded", function () {
            var urlParams = new URLSearchParams(window.location.search);
            var checkAddParam = urlParams.get('check_delete');

            if (checkAddParam === 'true') {
                var toastElement = document.getElementById('liveToast_delete');
                var toast = new bootstrap.Toast(toastElement);
                toast.show();
            }
        });

        document.addEventListener("DOMContentLoaded", function () {
            var urlParams = new URLSearchParams(window.location.search);
            var checkAddParam = urlParams.get('check_edit');

            if (checkAddParam === 'true') {
                var toastElement = document.getElementById('liveToast_edit');
                var toast = new bootstrap.Toast(toastElement);
                toast.show();
            }
        });

        document.addEventListener("DOMContentLoaded", function () {
            var deleteButton = document.getElementById("deleteButton");
            deleteButton.addEventListener("click", function () {
                var deleteUrl = document.querySelector('a[data-bs-target="#exampleModal"]').getAttribute('href');
                window.location.href = deleteUrl;
            });
        });
    </script>
</body>

</html>
