<script src="{{ asset('js/manifest.js') }}"></script>
<script src="{{ asset('js/vendor.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/fontawesome-all.min.js') }}"></script>
<script src="{{ asset('js/jquery.elevatezoom.js') }}"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-117292723-4"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-117292723-4');
</script>

<script>
    $(document).ready(function () {
        /* 回到頂端按鈕 */
        $(window).scroll(function(){
            if ($(this).scrollTop() > 200) {
                $('#scroll-to-top').fadeIn();
            } else {
                $('#scroll-to-top').fadeOut();
            }
        });
        
        $('#scroll-to-top').click(function(){
            $('html, body').animate({scrollTop : 0}, 800);
            return false;
        });
    });

    /* 後分類摺疊按鈕 */
    $(document).on('show.bs.collapse', '.collapse', function () {
        $(this).parent().find('.switch').toggleClass('fas fa-minus');
    })
    $(document).on('hide.bs.collapse', '.collapse', function () {
        $(this).parent().find('.switch').toggleClass('fas fa-plus');
    })

    /* 警報關閉按鈕 */
    $(document).on('click', '.close', function () {
        $('.alert').alert('close');
    });

    /* 圖像放大鏡 */
    if ($(document).width() > 767) {
        $('#item-zoom').elevateZoom({
            gallery: 'item-gallery',
            zoomType: 'inner',
            easing: true,
            cursor: 'crosshair',
            zoomWindowPosition: 1,
            galleryActiveClass: 'active',
            imageCrossfade: true,
            //loadingIcon: "{{ asset('images/loading.svg') }}",
        });
    }

    /* 藝廊 */
    $('#item-gallery').bind('click', function (e) {
        let ez = $('#item-zoom').data('elevateZoom');
        $.fancybox(ez.getGalleryList());
        return false;
    });
</script>
