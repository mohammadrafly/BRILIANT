<?= $this->extend('auth/layouts/template') ?>

<?= $this->section('content') ?>
    
    <div id="app">
        <section class="section">
            <div class="d-flex flex-wrap align-items-stretch">
                <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                    <div class="p-4 m-3">
                    <img height="70" class="mb-5" src="<?= base_url('assets/icon/icon_navbar.png'); ?>" alt="" srcset="">
                        <h4 class="text-dark font-weight-normal">Daftar <span class="font-weight-bold text-primary">BRILIANT</span></h4>
                        <?php if (!empty(session()->getFlashdata('error'))) : ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <?php echo session()->getFlashdata('error'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty(session()->getFlashdata('success'))) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo session()->getFlashdata('success'); ?>
                            </div>
                        <?php endif; ?>
                        <form method="POST" action="<?= base_url('register/proced'); ?>" class="needs-validation">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Kata Sandi</label>
                                </div>
                                <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="confirmation_password" class="control-label">Konfirmasi Kata Sandi</label>
                                </div>
                                <input id="password" type="password" class="form-control" name="password_conf" tabindex="2" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                    Daftar
                                </button>
                            </div>
                            <div class="row justify-content-md-center">
                                atau
                            </div>
                            <div class="row justify-content-md-center">
                                Sudah punya akun? 
                                <a href="<?= base_url('login') ?>">
                                    Masuk!
                                </a>
                            </div>
                        </form>

                        <div class="text-center mt-5 text-small">
                            Copyright &copy; by BRILIANT
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <a href="<?= base_url('/'); ?>" type="button" class="btn btn-outline-primary flex w-auto px-4 rounded-pill row justify-content-md-center">
                                <span class="me-3">Kembali</span>
                                <i class="fas fa-arrow-left"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="<?= base_url('assets/img/bg-login.jpeg'); ?>" style="background: url('<?= base_url('assets/img/bg-login.jpeg'); ?>');">

                    <div class="absolute-bottom-left index-2">
                        <div class="text-light p-5 pb-2">
                            <div class="mb-5 pb-3">
                    </div>
                </div>
            </div>
        </section>
    </div>

<?= $this->endSection() ?>