<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTTH01_CSE485_ex02</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/layout.css">
</head>

<body>
    <div class="container-fluid vh-100" style="position: relative; padding:0;">
        <?php
        include('header.php');
        ?>
        <div class="row w-100" style="position: absolute; top:56px;">
            <div class="row w-100">
                <div class="col" id="admin_content">
                    <div class="row">
                        <?php
                        include('../connection.php');
                        $stmt = $conn->prepare("SELECT count(user_id) AS count_user
                        FROM users");
                        $stmt->execute();
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <div class="col-md-3 p-5">
                            <div class="posts">
                                <p style="text-align:center; color: #2185e1; margin-bottom:0px;">Người dùng</p>
                                <p style="text-align:center; font-size:30px; margin-top:0px;">
                                    <?= $result['count_user'] ?>
                                </p>
                            </div>
                        </div>
                        <?php
                        $stmt = $conn->prepare("SELECT count(ma_tloai) AS count_theloai
                        FROM theloai");
                        $stmt->execute();
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <div class="col-md-3 p-5">
                            <div class="posts">
                                <p style="text-align:center; color: #2185e1; margin-bottom:0px;">Thể loại</p>
                                <p style="text-align:center; font-size:30px; margin-top:0px;">
                                    <?= $result['count_theloai'] ?>
                                </p>
                            </div>
                        </div>
                        <?php
                        $stmt = $conn->prepare("SELECT count(ma_tgia) AS count_tacgia
                        FROM tacgia");
                        $stmt->execute();
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <div class="col-md-3 p-5">
                            <div class="posts">
                                <p style="text-align:center; color: #2185e1; margin-bottom:0px;">Tác giả</p>
                                <p style="text-align:center; font-size:30px; margin-top:0px;">
                                    <?= $result['count_tacgia'] ?>
                                </p>
                            </div>
                        </div>
                        <?php
                        $stmt = $conn->prepare("SELECT count(ma_bviet) AS count_baiviet
                        FROM baiviet");
                        $stmt->execute();
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <div class="col-md-3 p-5">
                            <div class="posts">
                                <p style="text-align:center; color: #2185e1; margin-bottom:0px;">Bài viết</p>
                                <p style="text-align:center; font-size:30px; margin-top:0px;">
                                    <?= $result['count_baiviet'] ?>
                                </p>
                            </div>
                        </div>

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
