<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>BRILIANT</title>
	<link rel="preconnect" target="_blank" href="https://fonts.googleapis.com">
	<link rel="preconnect" target="_blank" href="https://fonts.gstatic.com" crossorigin>
	<link rel="stylesheet" href="<?= base_url('assets/landingpage/css/bootstrap.css') ?>">

	<link target="_blank" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url('assets/admin/modules/font-awesome/css/all.min.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/admin/css/swiper.min.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/admin/css/aos.css'); ?>">
	<script src="<?= base_url('assets/admin/modules/sweetalert/dist/sweetalert.min.js'); ?>"></script>	
	<link rel="stylesheet" href="<?= base_url('assets/landingpage/css/style.css') ?>">
	
</head>

<body>
	<header class="d-grid shadow-sm">
    <?= $this->include('landingpage/partials/navbar') ?>
	</header>
    <div class="loader-bg">
        <div class="loader-p">

        </div>
    </div>
    <main id="main" class="">
      <?= $this->renderSection('content') ?>
    </main>
    <?= $this->include('landingpage/partials/footer') ?>
<script src="<?= base_url('assets/landingpage/js/jquery.js'); ?>"></script>
<script src="<?= base_url('assets/landingpage/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= base_url('assets/admin/js/swiper.min.js'); ?>"></script>
<script src="<?= base_url('assets/admin/js/aos.js'); ?>"></script>
<script>
  var galleryThumbs = new Swiper('.gallery-thumbs', {
    effect: 'coverflow',
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: '2',
    // coverflowEffect: {
    //   rotate: 50,
    //   stretch: 0,
    //   depth: 100,
    //   modifier: 1,
    //   slideShadows : true,
    // },

    coverflowEffect: {
      rotate: 0,
      stretch: 0,
      depth: 50,
      modifier: 6,
      slideShadows: false,
    },

  });

  var swiper = new Swiper(".mySwiper", {
    effect: 'coverflow',
    // grabCursor: true,
    centeredSlides: true,
    slidesPerView: '3',
    pagination: {
      clickable: true,
      el: '.swiper-pagination',
      type: 'bullets',
    },
    initialSlide: 2,
    slideActiveClass: 'slide-center',
    // coverflowEffect: {
    //   rotate: 50,
    //   stretch: 0,
    //   depth: 100,
    //   modifier: 1,
    //   slideShadows : true,
    // },
    breakpoints: {
      // when window width is <= 499px
      499: {
        slidesPerView: '2',
      },
      993: {
        slidesPerView: '3',
      }
    },
    coverflowEffect: {
      rotate: 0,
      stretch: 0,
      depth: 50,
      modifier: 6,
      slideShadows: false,
    },
  });


  var galleryTop = new Swiper('.swiper-container.testimonial', {
    speed: 400,
    spaceBetween: 50,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    direction: 'vertical',
    pagination: {
      clickable: true,
      el: '.swiper-pagination',
      type: 'bullets',
    },
    thumbs: {
      swiper: galleryThumbs
    }
  });

  $(document).ready(function() {
    setTimeout(() => {
      $('.loader-bg').fadeToggle();
      AOS.init({
        duration: 1000
      });
    }, 1500);

    $('.navbar-toggler').click(function(e) {
      $('#main').toggleClass('overlay')
      $('.navbar-collapse').toggleClass('show')
      $('i').toggleClass('fa-bars')
      $('i').toggleClass('fa-times')

      if ($('.navbar-toggle > i').hasClass('fa-bars')) {
        // $('.navbar-toggle > i').addClass('fa-cross')
      } else {
        // $('.navbar-toggle > i').addClass('fa-bars')        
      }
    });


    // Add smooth scrolling to all links
    $("a").on('click', function(event) {

      // Make sure this.hash has a value before overriding default behavior
      if (this.hash !== "") {
        // Prevent default anchor click behavior
        event.preventDefault();

        // Store hash
        var hash = this.hash;

        // Using jQuery's animate() method to add smooth page scroll
        // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 800, function() {

          // Add hash (#) to URL when done scrolling (default click behavior)
          window.location.hash = hash;
        });
      } // End if
    });
  });
</script>
</body>

</html>