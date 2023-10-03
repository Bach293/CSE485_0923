<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sinh viên</title>
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
    include(APP_ROOT . '/app/views/layout/header.php');
    ?>

    <div class="container-fluid p-0">
        <div class="row">
            <div class="col text-center" id="admin_content">
                <h2>CẬP NHẬT THÔNG TIN SINH VIÊN</h2>
                <div id="form_add_student">
                    <form action="<?= DOMAIN . 'public/index.php?controller=home&action=add_Student&add=true' ?>"
                        method="post">
                        <div id="liveAlertPlaceholder"></div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" name="matheloai" style="width:120px">Mã sinh viên</span>
                            <input type="text" class="form-control" id="matheloai" name="malop" disabled
                                placeholder="<?= $Student_id ?>">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1" style="width:120px">Họ và
                                tên</span>
                            <input type="text" class="form-control" name="tenSinhVien" id="tenSinhVien">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1" style="width:120px">Email</span>
                            <input type="text" class="form-control" name="email" id="email">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1" style="width:120px">Ngày
                                sinh</span>
                            <input type="text" class="form-control" name="ngaySinh" id="ngaySinh">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1" style="width:120px">Lớp</span>
                            <input type="text" class="form-control" style="width:10px" name="idLop" id="idLop" disabled>
                            <input type="text" class="form-control" id="malop" disabled>

                            <div class="dropdown">
                                <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Thêm lớp
                                </button>
                                <ul class="dropdown-menu">
                                    <?php
                                    foreach ($ClassRooms as $ClassRoom) {
                                        ?>
                                        <li class="dropdown-item" value="<?= $ClassRoom->getId() ?>"
                                            onclick="selectValue(this)" id="<?= $ClassRoom->getTenLop() ?>">
                                            <?= $ClassRoom->getTenLop() ?>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success mx-2"
                                onclick="validateForm(event)">Thêm</button>
                            <a href="<?= DOMAIN . 'public/index.php?controller=home&action=ClassRoom' ?>"
                                style="text-decoration: none;">
                                <button type="button" class="btn btn-warning">Quay lại</button>
                            </a>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>

    <?php
    include(APP_ROOT . '/app/views/layout/footer.php');
    ?>

    <script src="../public/js/snippets.js"></script>
    <script>
        var element = document.getElementById('sinhvien');
        element.className = 'nav-link active';

        function selectValue(element) {
            var selectedValue1 = element.getAttribute('id');
            var selectedValue2 = element.getAttribute('value');
            document.getElementById('malop').value = selectedValue1;
            document.getElementById('idLop').value = selectedValue2;
        }

        function validateForm(event) {
            var tenSinhVien = document.getElementById("tenSinhVien").value;
            var email = document.getElementById("email").value;
            var ngaySinh = document.getElementById("ngaySinh").value;
            var maLop = document.getElementById("malop").value;

            var emailPattern = "/^[a-zA-Z0-9._%+-]+@([a-zA-Z0-9.-]+\.)+[a-zA-Z]{2,}$/";

            var istenSinhVien = tenSinhVien.trim() !== '';
            var ismaLop = maLop.trim() !== '';
            var isngaySinh = ngaySinh.trim() !== '';
            var isemail = emailPattern.test(email);

            var isFormValid = true;

            if (!istenSinhVien) {
                event.preventDefault();
                appendAlert('Name is required', 'warning');
                isFormValid = false;
            }
            if (!ismaLop) {
                event.preventDefault();
                appendAlert('Classroom is required', 'warning');
                isFormValid = false;
            }
            if (!isngaySinh) {
                event.preventDefault();
                appendAlert('Birthday is required', 'warning');
                isFormValid = false;
            }
            if (!isemail) {
                event.preventDefault();
                appendAlert('Email is required', 'warning');
                isFormValid = false;
            }


            if (isFormValid) {
                event.stopPropagation(); // Tiếp tục sự kiện
                var form = document.getElementById('form_add_student');
                form.submit();
            }
        }
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