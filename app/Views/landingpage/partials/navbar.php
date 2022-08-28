  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand text-primary" href="<?= base_url(''); ?>">
        <img height="50" src="<?= base_url('assets/icon/icon_navbar.png'); ?>" alt="" srcset="">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <!-- <span class="navbar-toggler-icon"></span> -->
        <i class="fa fa-bars text-white" aria-hidden="true"></i>
      </button>
      <div class="collapse navbar-collapse justify-content-lg-end" id="navbarNavDropdown">
        <ul class="navbar-nav ">
          <li class="nav-item">
            <a class="nav-link text-primary active" aria-current="page" href="<?= base_url('/'); ?>">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-primary" href="<?= base_url('/'); ?>">Tentang Kami</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-primary" href="<?= base_url('/'); ?>">Paket Belajar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-primary" href="<?= base_url('/'); ?>">FAQ</a>
          </li>
          <?php if (session()->get('role') == NULL): ?>?
          <li class="nav-item">
            <a href="<?= base_url('login'); ?>" type="button" class="btn btn-primary px-4 rounded-pill">Masuk</a>
          </li>
          <?php endif ?>
          <?php if (session()->get('role')): ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Hi, <?= session()->get('email') ?> 
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown" data-bs-popper="none">
                <li><a class="dropdown-item" href="<?= base_url('dashboard/siswa/profile/'.session()->get('email')); ?>">Profile Saya</a></li>
                <li><a class="dropdown-item" href="<?= base_url('dashboard/siswa/bimbel'); ?>">Paket Bimbel</a></li>
                <li><a class="dropdown-item" href="<?= base_url('dashboard/siswa/tagihan/'.session()->get('id_token')); ?>">Pembayaran</a></li>
                <?php if (session()->get('bridge_token') === NULL): ?>
                <li><a class="dropdown-item" href="<?= base_url('dashboard/siswa/jadwal/saya'); ?>">Jadwal Saya</a></li>
                <?php else: ?>
                <li><a class="dropdown-item" href="<?= base_url('dashboard/siswa/jadwal/saya/'.session()->get('bridge_token')); ?>">Jadwal Saya</a></li>
                <?php endif ?>
                <li class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="<?= base_url('logout'); ?>">Logout</a></li>
              </ul>
            </li>
          <?php endif ?>
        </ul>
      </div>
    </div>
  </nav>