<div class="row w-100 m-0">
    <div class="col p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="<?= DOMAIN . 'public/index.php?controller=home&action=Student' ?>"
                style="margin-left:30px; font-size:30px; font-weight:bold">
                Adminitrastion
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" id="sinhvien" style="font-size:20px; font-weight:bold"
                            href="<?= DOMAIN . 'public/index.php?controller=home&action=Student' ?>">Sinh viên</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="lop" style="font-size:20px; font-weight:bold"
                            href="<?= DOMAIN . 'public/index.php?controller=home&action=ClassRoom' ?>">Lớp</a>
                    </li>

                </ul>
            </div>
        </nav>
    </div>
</div>