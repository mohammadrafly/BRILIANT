<nav class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
          BRILIANT
        </a>
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="sidebar-body">
        <?php if (session()->get('role') === 'unset'): ?>
        <ul class="nav">
          <li class="nav-item nav-category">Main</li>
          <li class="nav-item">
            <a href="<?= base_url('dashboard/lengkapi-data-diri/'.session()->get('id_token')) ?>" class="nav-link">
              <i class="link-icon" data-feather="edit-3"></i>
              <span class="link-title">Lengkapi Data Diri</span>
            </a>
          </li>
        </ul>
        <?php elseif (session()->get('role') === 'tutor'): ?>
        <ul class="nav">
          <li class="nav-item nav-category">Main</li>
          <li class="nav-item">
            <a href="<?= base_url('dashboard') ?>" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item nav-category">Menu</li>
          <li class="nav-item">
            <a href="<?= base_url('dashboard/profile/'.session()->get('id_token')) ?>" class="nav-link">
              <i class="link-icon" data-feather="user"></i>
              <span class="link-title">Profile</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('dashboard/list/jadwal/'.session()->get('id_token')) ?>" class="nav-link">
              <i class="link-icon" data-feather="calendar"></i>
              <span class="link-title">Jadwal Tutoring</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('dashboard/tutor/examp/'.session()->get('id_token')) ?>" class="nav-link">
              <i class="link-icon" data-feather="clipboard"></i>
              <span class="link-title">Ujian Saya</span>
            </a>
          </li>
        </ul>
        <?php elseif (session()->get('role') === 'siswa'): ?>
        <ul class="nav">
          <li class="nav-item nav-category">Main</li>
          <li class="nav-item">
            <a href="<?= base_url('dashboard') ?>" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item nav-category">Menu</li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
              <i class="link-icon" data-feather="book-open"></i>
              <span class="link-title">Pake Bimbel</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="emails">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="<?= base_url('dashboard/master/') ?>" class="nav-link"></a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('dashboard') ?>" class="nav-link">
              <i class="link-icon" data-feather="credit-card"></i>
              <span class="link-title">Pembayaran</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('dashboard') ?>" class="nav-link">
              <i class="link-icon" data-feather="calendar"></i>
              <span class="link-title">Jadwal Saya</span>
            </a>
          </li>
        </ul>
        <?php elseif (session()->get('role') === 'admin'): ?>
        <ul class="nav">
          <li class="nav-item nav-category">Main</li>
          <li class="nav-item">
            <a href="<?= base_url('dashboard') ?>" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item nav-category">menu</li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
              <i class="link-icon" data-feather="database"></i>
              <span class="link-title">Data Master</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="emails">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="<?= base_url('dashboard/master/soal') ?>" class="nav-link">Master Soal</a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('dashboard/master/mapel') ?>" class="nav-link">Master Mata Pelajaran</a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('dashboard/master/tutor-examp/list') ?>" class="nav-link">Master Tutor Examp</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('dashboard/transaksi/list') ?>" class="nav-link">
              <i class="link-icon" data-feather="credit-card"></i>
              <span class="link-title">Transaksi</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('dashboard/faq/list') ?>" class="nav-link">
              <i class="link-icon" data-feather="alert-triangle"></i>
              <span class="link-title">FAQ</span>
            </a>
          </li>
          <li class="nav-item nav-category">User</li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
              <i class="link-icon" data-feather="users"></i>
              <span class="link-title">Data User</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="uiComponents">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="<?= base_url('dashboard/user/list') ?>" class="nav-link">User</a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('dashboard/user/list/admin') ?>" class="nav-link">Admin</a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('dashboard/user/list/tutor') ?>" class="nav-link">Tutor</a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('dashboard/user/list/siswa') ?>" class="nav-link">Siswa</a>
                </li>
              </ul>
            </div>
            <a class="nav-link" data-toggle="collapse" href="#uiComponents2" role="button" aria-expanded="false" aria-controls="uiComponents2">
              <i class="link-icon" data-feather="user-check"></i>
              <span class="link-title">Verifikasi User</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="uiComponents2">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="<?= base_url('dashboard/user/unverified') ?>" class="nav-link">List User</a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
        <?php endif ?>
      </div>
    </nav>