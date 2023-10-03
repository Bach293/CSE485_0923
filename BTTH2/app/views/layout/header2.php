<div class="row w-100">
    <div class="col">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="<?= DOMAIN . 'public/index.php?controller=admin&action=index' ?>"
                style="margin-left:30px;">
                Adminitrastion
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" id="trangchu"
                            href="<?= DOMAIN . 'public/index.php?controller=admin&action=index' ?>">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="trangngoai"
                            href="<?= DOMAIN . 'public/index.php?controller=admin&action=index' ?>">Trang ngoài</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="theloai"
                            href="<?= DOMAIN . 'public/index.php?controller=admin&action=category' ?>">Thể loại</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tacgia"
                            href="<?= DOMAIN . 'public/index.php?controller=admin&action=author' ?>">Tác giả</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="baiviet"
                            href="<?= DOMAIN . 'public/index.php?controller=admin&action=article' ?>">Bài viết</a>
                    </li>
                    <li class="nav-item btn btn-warning" style="padding:0px; right: 20px;position: absolute;">
                        <a class="nav-link btn btn-warning" data-bs-toggle="modal"
                            data-bs-target="#exampleModal2"
                            href="<?= DOMAIN . 'public/index.php?controller=login&action=login' ?>">Log Out</a>
                    </li>
                    <!-- Modal -->
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Cảnh báo</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Bạn chắc chắn muốn thoát chứ ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Quay
                                            lại</button>
                                        <button type="button" class="btn btn-primary" id="outButton">Xác
                                            nhận</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        document.addEventListener("DOMContentLoaded", function () {
                            var outButton = document.getElementById("outButton");
                            outButton.addEventListener("click", function () {
                                var outUrl = document.querySelector('a[data-bs-target="#exampleModal2"]').getAttribute('href');
                                window.location.href = outUrl;
                            });
                        });
                    </script>
                </ul>
            </div>
        </nav>
    </div>
</div>