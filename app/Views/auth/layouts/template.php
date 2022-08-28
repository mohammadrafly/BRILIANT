<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <title>Briliant</title>
        <!-- General CSS Files -->
		<link rel="stylesheet" href="<?= base_url('assets/admin/modules/bootstrap/dist/css/bootstrap.min.css'); ?>">
		<link rel="stylesheet" href="<?= base_url('assets/admin/modules/font-awesome/css/all.min.css'); ?>">
        <!-- CSS Libraries -->
        <!-- <link rel="stylesheet" href="../node_modules/bootstrap-social/bootstrap-social.css"> -->
        <!-- Template CSS -->
        <link rel="stylesheet" href="<?= base_url('assets/admin/css/style.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/admin/css/components.css') ?>">
    </head>

    <body>
    <?= $this->renderSection('content') ?>
    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('javascript/validation_register.js') ?>"></script>

    </body>
    </html>