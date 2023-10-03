<div class="w-100">
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?=DOMAIN.'public/index.php'?>">
        <img src="../public/storage/images/logo.png" alt="" width="250px" height="90px">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="<?=DOMAIN.'public/index.php'?>" id="trangchu" style="font-size:20px">Trang chủ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=DOMAIN.'public/index.php?controller=login&action=login'?>" id="dangnhap" style="font-size:20px">Đăng nhập</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Nội dung cần tìm" aria-label="Search">
          <button class="btn btn-outline-primary" type="submit">Tìm</button>
        </form>
      </div>
    </div>
  </nav>
</div>