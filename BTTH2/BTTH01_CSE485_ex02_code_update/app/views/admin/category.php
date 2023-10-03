
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
    <!-- Modal Delete Defail -->
    <div class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-warning">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">XÓA THẤT BẠI</h1>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

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

    <?php
    include(APP_ROOT . '/app/views/layout/header2.php');
    ?>

    <div class="container-fluid p-0">
        <div class="row">
            <div class="col" id="admin_content">
                <a href="<?= DOMAIN . 'public/index.php?controller=admin&action=add_category' ?>"><button
                        class="btn btn-success">Thêm mới</button></a>

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
                        $page = $count / 10;
                        $pages = ceil($page);
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
                        foreach ($categorys as $category) {
                            ?>
                            <tr>
                                <th scope="row" id="<?= $category->getMa_tloai() ?>">
                                    <?= $category->getMa_tloai() ?>
                                </th>
                                <td>
                                    <?= $category->getTen_tloai() ?>
                                </td>
                                <td>
                                    <a
                                        href="<?= DOMAIN . 'public/index.php?controller=admin&action=edit_category&id=' . $category->getMa_tloai() ?>"><i
                                            class="bi bi-pencil-square">
                                        </i></a>
                                </td>
                                <td>
                                    <a href="<?= DOMAIN . 'public/index.php?controller=admin&action=delete_category&id=' . $category->getMa_tloai() ?>"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                            class="bi bi-trash3-fill"></i></a>
                                </td>
                            </tr>
                            <?php
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
                                    href="<?= DOMAIN . 'public/index.php?controller=admin&action=category&key=' . $previous ?>">Previous</a>
                            </li>
                            <?php
                            for ($i = 1; $i <= $pages; $i++) {
                                if ($i == 1) {
                                    ?>
                                    <li class="page-item"><a class="page-link active" id="<?= $i ?>"
                                            href="<?= DOMAIN . 'public/index.php?controller=admin&action=category&key=' . $i ?>">
                                            <?= $i ?>
                                        </a></li>
                                    <?php
                                    continue;
                                }
                                ?>
                                <li class="page-item"><a class="page-link" id="<?= $i ?>"
                                        href="<?= DOMAIN . 'public/index.php?controller=admin&action=category&key=' . $i ?>">
                                        <?= $i ?>
                                    </a></li>
                                <?php
                            }
                            ?>
                            <li class="page-item"><a class="page-link"
                                    href="<?= DOMAIN . 'public/index.php?controller=admin&action=category&key=' . $next ?>">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>
        </div>
    </div>

    <?php
    include(APP_ROOT . '/app/views/layout/footer.php');
    ?>

    <script>
        var element = document.getElementById('theloai');
        element.className = 'nav-link active';
        var key = document.getElementById('<?= $key ?>');
        if (key.id !== '1') {
            var key1 = document.getElementById('1');
            key1.className = 'page-link';
            key.className = 'page-link active';
        }
    </script>
    <script src="../public/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var urlParams = new URLSearchParams(window.location.search);
            var checkAddParam = '';
            <?php
            if (isset($check_add)) {
                ?>
                var checkAddParam = '<?= $check_add ?>';
                <?php
            }
            ?>

            if (checkAddParam == 'true') {
                var toastElement = document.getElementById('liveToast_add');
                var toast = new bootstrap.Toast(toastElement);
                toast.show();
            }
        });

        document.addEventListener("DOMContentLoaded", function () {
            var urlParams = new URLSearchParams(window.location.search);
            var checkAddParam = '';
            <?php
            if (isset($check_delete)) {
                ?>
                var checkAddParam = '<?= $check_delete ?>';
                <?php
            }
            ?>

            if (checkAddParam === 'true') {
                var toastElement = document.getElementById('liveToast_delete');
                var toast = new bootstrap.Toast(toastElement);
                toast.show();
            }
        });

        document.addEventListener("DOMContentLoaded", function () {
            var urlParams = new URLSearchParams(window.location.search);
            var checkAddParam = '';
            <?php
            if (isset($check_edit)) {
                ?>
                var checkAddParam = '<?= $check_edit ?>';
                <?php
            }
            ?>
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

        document.addEventListener("DOMContentLoaded", function () {
            var urlParams = new URLSearchParams(window.location.search);
            var checkAddParam = '';
            <?php
            if (isset($check_delete)) {
                ?>
                var checkAddParam = '<?= $check_delete ?>';
                <?php
            }
            ?>
            if (checkAddParam == 'false') {
                var modal = new bootstrap.Modal(document.getElementById('exampleModal'));
                modal.show();
            }
        });
    </script>
</body>

</html>