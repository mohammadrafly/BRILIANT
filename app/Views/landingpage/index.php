<?= $this->extend('landingpage/layouts/template') ?>

<?= $this->section('content') ?>
    
        <section id="hero">
            <div class="container pt-3">
                <div class="row align-items-center text-center">
                    <div class="col-lg-12 pt-5" data-aos="zoom-in" data-aos-delay="100">
                        <h1 class="display-6 fw-bold"> </h1>
                        <p class="lead">Solusi Menjadi Siswa Berprestasi Bersama Kami</p>
                        <?php if(!session()->get('id')): ?>
                            <div class="d-md-flex justify-content-center mb-4 mb-lg-5">
                                <a href="<?= base_url('register'); ?>" type="button" class="btn btn-primary px-5 rounded-pill me-md-2 fw-bold">Daftar Siswa</a>
                                <a href="<?= base_url('register'); ?>" type="button" class="btn btn-primary px-5 rounded-pill me-md-2 fw-bold">Daftar Tutor</a>
                            </div>
                        <?php else: ?>
                        <?php endif ?>
                    </div>
                    <!-- <div class="cola-lg-12 d-flex justify-content-center">
                <img class="rounded-lg-3 img-hero" src="charisse-kenion-ts-E3IVKv8o-unsplash.jpg" alt="">
            </div>                    -->
                </div>
            </div>
        </section>
        <section id="section-2" class="d-flex w-100 m-0 p-0">
            <div class="w-50">
                <div class="row card shadow p-3 m-5 shadow-md justify-content-center align-items-center bg-white text-dark h-100" data-aos="fade-up">
                    <div class="px-3">
                        <p class="fs-6 fw-bold text-primary">Kenapa Harus Memilih Permata Smart?</p>
                        <p class="ms-2 mb-0">>> Tutor setara S1 dan memiliki pengalaman mengajar</p>
                        <p class="ms-2 mb-0"">>> Jadwal les fleksibel (bisa memilih & disesuaikan)</p>
                        <p class=" ms-2 mb-0"">>> Materi sesuai kebutuhan siswa </p>
                        <p class="ms-2 mb-0"">>> Free konsultasi diluar jam bimbel</p>
                        <p class=" ms-2 mb-0"">>> Menggunakan kurikulum nasional</p>
                    </div>
                    </p>
                </div>
            </div>
            <div class="w-50 text-dark p-5" data-aos="fade-left">
                <img src="<?= base_url('assets/img/question.jpg'); ?>" class="img-fluid" />
                <small class="float-end">Designed by <a href="www.freepik.com">Freepik</a></small>
            </div>
            </div>
        </section>
        <section id="section-3" class="bg-white d-flex align-items-center w-100 p-0 m-0 align-content-strench">
            <div class="w-50 w-md-100 h-100 p-5" data-aos="fade-right">
                <img src="<?= base_url('assets/img/package-list.jpg'); ?>" class="img-fluid" />
            </div>
            <div class="container w-50 w-md-100 flex align-items-center justify-content-center" data-aos="fade-up">
                <div class="row justify-content-center align-items-center">
                    <div class="d-flex justify-content-center">
                        <div class="card shadow shadow-md rounded rounded-3 w-">
                            <div class="card-body">
                                <h6 class="card-subtitle mb-2 fw-bold text-primary">Tingkat SD</h6>
                                <h5 class="card-title fs-3 fw-bold">Mulai 149K<span class="fw-light fs-6">/Bulan</span></h5>
                                <p class="card-text">
                                <ul class="price-feature mt-4 p-0">
                                    <li class="list-feature"><i class="fa fa-check-circle" aria-hidden="true"></i>
                                        <p class="ms-2 mb-0">Materi belajar lengkap</p>
                                    </li>
                                    <li class="list-feature"><i class="fa fa-check-circle" aria-hidden="true"></i>
                                        <p class="ms-2 mb-0">Tutor ahli dibidangnya</p>
                                    </li>
                                    <li class="list-feature"><i class="fa fa-check-circle" aria-hidden="true"></i>
                                        <p class="ms-2 mb-0">Tutor datang kerumah</p>
                                    </li>
                                    <li class="list-feature"><i class="fa fa-check-circle" aria-hidden="true"></i>
                                        <p class="ms-2 mb-0">4x pertemuan sebulan</p>
                                        </lnavbari>
                                    <li class="list-feature"><i class="fa fa-check-circle" aria-hidden="true"></i>
                                        <p class="ms-2 mb-0">Durasi belajar 60 menit</p>
                                    </li>
                                </ul>
                                </p>
                                <a href="<?= base_url('dashboard/siswa/bimbel'); ?>" type="button" class="btn btn-outline-primary flex w-auto px-4 rounded-pill">
                                    <span class="me-3">Pelajari lebih lanjut</span>
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="section-4">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <h1 class="section-title-1 py-5 text-primary">Frequently Answered Question</h1>
                    <div class="col-lg-12">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                        <?php foreach ($content2 as $i => $row): ?>  
                          <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-heading<?= $i; ?>">
                              <button class="accordion-button collapsed shadow-sm" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?= $i; ?>" aria-expanded="false" aria-controls="flush-collapseOne">
                                <?= $row['pertanyaan'] ?>
                              </button>
                            </h2>
                            <div id="flush-collapse<?= $i; ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                              <div class="accordion-body"><?= $row['jawaban']; ?></div>
                            </div>
                          </div>
                        <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?= $this->endSection() ?>