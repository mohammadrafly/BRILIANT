<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Dashboard | BRILIANT</title>
	<!-- plugin css for this page -->
	<link rel="stylesheet" href="<?= base_url('assets_b/vendors/datatables.net-bs4/dataTables.bootstrap4.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets_b/vendors/select2/select2.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets_b/vendors/jquery-tags-input/jquery.tagsinput.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets_b/vendors/dropzone/dropzone.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets_b/vendors/dropify/dist/dropify.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets_b/vendors/bootstrap-colorpicker/bootstrap-colorpicker.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets_b/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets_b/vendors/font-awesome/css/font-awesome.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets_b/vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css') ?>">
	<!-- end plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="<?= base_url('assets_b/fonts/feather-font/css/iconfont.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets_b/vendors/flag-icon-css/css/flag-icon.min.css') ?>">
	<!-- endinject -->
  <!-- Layout styles -->  
	<link rel="stylesheet" href="<?= base_url('assets_b/css/demo_1/style.css') ?>">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="<?= base_url('assets_b/images/favicon.png') ?>" />
</head>
<body>
	<div class="main-wrapper">

        <?= $this->include('dashboard/partials/sidebar') ?>

        <div class="page-wrapper">

            <?= $this->include('dashboard/partials/navbar') ?>

				<div class="page-content">

					<?= $this->renderSection('content') ?>

				</div>

            <?= $this->include('dashboard/partials/footer') ?>
        </div>
            
	</div>

	<!-- core:js -->
	<script src="<?= base_url('assets_b/vendors/core/core.js') ?>"></script>
	<!-- endinject -->
	<!-- plugin js for this page -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="<?= base_url('assets_b/vendors/jquery-validation/jquery.validate.min.js') ?>"></script>
	<script src="<?= base_url('assets_b/vendors/bootstrap-maxlength/bootstrap-maxlength.min.js') ?>"></script>
	<script src="<?= base_url('assets_b/vendors/inputmask/jquery.inputmask.min.js') ?>"></script>
	<script src="<?= base_url('assets_b/vendors/select2/select2.min.js') ?>"></script>
	<script src="<?= base_url('assets_b/vendors/typeahead.js/typeahead.bundle.min.js') ?>"></script>
	<script src="<?= base_url('assets_b/vendors/jquery-tags-input/jquery.tagsinput.min.js') ?>"></script>
	<script src="<?= base_url('assets_b/vendors/dropzone/dropzone.min.js') ?>"></script>
	<script src="<?= base_url('assets_b/vendors/dropify/dist/dropify.min.js') ?>"></script>
	<script src="<?= base_url('assets_b/vendors/bootstrap-colorpicker/bootstrap-colorpicker.min.js') ?>"></script>
	<script src="<?= base_url('assets_b/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') ?>"></script>
	<script src="<?= base_url('assets_b/vendors/moment/moment.min.js') ?>"></script>
	<script src="<?= base_url('assets_b/vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.js') ?>"></script>
	<!-- end plugin js for this page -->
	<!-- inject:js -->
	<script src="<?= base_url('assets_b/vendors/feather-icons/feather.min.js') ?>"></script>
	<script src="<?= base_url('assets_b/js/template.js') ?>"></script>
	<!-- endinject -->
	<!-- custom js for this page -->
	<script src="<?= base_url('assets_b/js/form-validation.js') ?>"></script>
	<script src="<?= base_url('assets_b/js/bootstrap-maxlength.js') ?>"></script>
	<script src="<?= base_url('assets_b/js/inputmask.js') ?>"></script>
	<script src="<?= base_url('assets_b/js/select2.js') ?>"></script>
	<script src="<?= base_url('assets_b/js/typeahead.js') ?>"></script>
	<script src="<?= base_url('assets_b/js/tags-input.js') ?>"></script>
	<script src="<?= base_url('assets_b/js/dropzone.js') ?>"></script>
	<script src="<?= base_url('assets_b/js/dropify.js') ?>"></script>
	<script src="<?= base_url('assets_b/js/bootstrap-colorpicker.js') ?>"></script>
	<script src="<?= base_url('assets_b/js/datepicker.js') ?>"></script>
	<script src="<?= base_url('assets_b/js/timepicker.js') ?>"></script>

	<script src="<?= base_url('assets_b/vendors/datatables.net/jquery.dataTables.js') ?>"></script>
	<script src="<?= base_url('assets_b/vendors/datatables.net-bs4/dataTables.bootstrap4.js') ?>"></script>
	<script src="<?= base_url('assets_b/js/data-table.js') ?>"></script>
	<script>
		$(document).ready( function () {
			$('#test').DataTable();
		} );
	</script>
	<script>
        $('img[data-enlargeable]').addClass('img-enlargeable').click(function() {
        var src = $(this).attr('src');
        var modal;

        function removeModal() {
            modal.remove();
            $('body').off('keyup.modal-close');
        }
        modal = $('<div>').css({
            background: 'RGBA(0,0,0,.5) url(' + src + ') no-repeat center',
            backgroundSize: 'contain',
            width: '100%',
            height: '100%',
            position: 'fixed',
            zIndex: '10000',
            top: '0',
            left: '0',
            cursor: 'zoom-out'
        }).click(function() {
            removeModal();
        }).appendTo('body');
        //handling ESC
        $('body').on('keyup.modal-close', function(e) {
            if (e.key === 'Escape') {
            removeModal();
            }
        });
        });
    </script>
</body>
</html>    