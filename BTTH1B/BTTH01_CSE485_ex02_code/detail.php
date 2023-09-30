<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTTH01_CSE485_ex02</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/layout.css">
</head>

<body>
    <div class="container-fluid vh-100" style="position: relative; padding:0;">
        <?php
        include('header.php');
        ?>
        <div class="row w-100" style="position: absolute; top:120px;">
            <div class="row w-100">
                <div class="col" id="detail-content">
                    <div class="row h-100">
                        <div class="col-md-1"></div>
                        <?php
                        if (isset($_GET['id'])) {
                            include('connection.php');
                            $id = $_GET['id'];
                            $stmt = $conn->prepare("SELECT baiviet.ten_bhat, tacgia.ten_tgia, theloai.ten_tloai, baiviet.tomtat, baiviet.noidung, baiviet.hinhanh
                            FROM baiviet
                            JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia
                            JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai
                            WHERE baiviet.ma_bviet = $id");
                            $stmt->execute();

                            $result = $stmt->fetch(PDO::FETCH_ASSOC);
                            if ($stmt->rowCount() > 0) {
                                ?>
                                <div class="col-md-3 py-2">
                                    <img src="<?= $result['hinhanh'] ?>" alt="" width="100%">
                                </div>
                                <div class="col-md-7 px-4">
                                    <p style="color:#2185e1; font-size:23px;">
                                        <?= $result['ten_bhat'] ?>
                                    </p>
                                    <p><b>Bài hát: </b>
                                        <?= $result['ten_bhat'] ?>
                                    </p>
                                    <p><b>Thể loại: </b>
                                        <?= $result['ten_tloai'] ?>
                                    </p>
                                    <p><b>Tóm tắt: </b>
                                        <?= $result['tomtat'] ?>
                                    </p>
                                    <p><b>Nội dung: </b>
                                        <?= $result['noidung'] ?>
                                    </p>
                                    <p><b>Tác giả: </b>
                                        <?= $result['ten_tgia'] ?>
                                    </p>
                                </div>
                                <?php
                            } else {
                                echo "0 results";
                            }
                        }
                        ?>

                        <div class="col-md-1"></div>
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
        var element = document.getElementById('trangchu');
        element.className = 'nav-link active';
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>
