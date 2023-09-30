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
    <div class="container-fluid vh-100" style="position: relative; padding:0;">
        <?php
        include('header.php');
        ?>
        <div class="row w-100" style="position: absolute; top:56px;">
            <div class="row w-100">
                <div class="col" id="admin_content">
                    <button class="btn btn-success">Thêm mới</button>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tiêu đề</th>
                                <th scope="col">Tên bài hát</th>
                                <th scope="col">Tên thể loại</th>
                                <th scope="col">Tên tác giả</th>
                                <th scope="col">Ngày viết</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col" style="width:30px">Sửa</th>
                                <th scope="col" style="width:30px">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include('../connection.php');

                            $stmt = $conn->prepare("SELECT count(ma_bviet) AS count_baiviet
                            FROM baiviet");
                            $stmt->execute();
                            $result = $stmt->fetch(PDO::FETCH_ASSOC);
                            $quantity = 10;
                            $pages = $result['count_baiviet'] / $quantity;
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

                            $stmt = $conn->prepare("SELECT baiviet.ma_bviet, baiviet.tieude, baiviet.ten_bhat, tacgia.ten_tgia, 
                            theloai.ten_tloai, baiviet.ngayviet, baiviet.hinhanh
                            FROM baiviet
                            JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia
                            JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai
                            LIMIT $offset, $quantity");
                            $stmt->execute();

                            if ($stmt->rowCount() > 0) {
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <tr>
                                        <th scope="row" id="<?= $row['ma_bviet'] ?>">
                                            <?= $row['ma_bviet'] ?>
                                        </th>
                                        <td>
                                            <?= $row['tieude'] ?>
                                        </td>
                                        <td>
                                            <?= $row['ten_bhat'] ?>
                                        </td>
                                        <td>
                                            <?= $row['ten_tloai'] ?>
                                        </td>
                                        <td>
                                            <?= $row['ten_tgia'] ?>
                                        </td>
                                        <td>
                                            <?= $row['ngayviet'] ?>
                                        </td>
                                        <td>
                                            <img src="<?= $row['hinhanh'] ?>" alt="none" height="30px">
                                        </td>
                                        <td>
                                            <a href=""><i class="bi bi-pencil-square"></i></a>
                                        </td>
                                        <td>
                                            <a href=""><i class="bi bi-trash3-fill"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "0 results";
                            }
                            ?>

                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link"
                                        href="baiviet.php?key=<?= $previous ?>">Previous</a></li>
                                <?php
                                for ($i = 1; $i <= $pages; $i++) {
                                    if ($i == 1) {
                                        ?>
                                        <li class="page-item"><a class="page-link active" id="<?= $i ?>"
                                                href="baiviet.php?key=<?= $i ?>">
                                                <?= $i ?>
                                            </a></li>
                                        <?php
                                        continue;
                                    }
                                    ?>
                                    <li class="page-item"><a class="page-link" id="<?= $i ?>"
                                            href="baiviet.php?key=<?= $i ?>">
                                            <?= $i ?>
                                        </a></li>
                                    <?php
                                }
                                ?>
                                <li class="page-item"><a class="page-link" href="baiviet.php?key=<?= $next ?>">Next</a>
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
        var element = document.getElementById('baiviet');
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
</body>

</html>
