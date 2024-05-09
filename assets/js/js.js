window.addEventListener('DOMContentLoaded', (event) => {
    jQuery(function () {
        //JQuery start below.

        // trigger start
        function simwaTrigger() {
            setTimeout(function () {
                jQuery('#simwa-trigger').removeClass('simwa-sleep').addClass('simwa-show');
            }, 1000);

            //greeting
            setTimeout(function () {
                jQuery('#simwa-greeting-wr').removeClass('simwa-sleep').addClass('simwa-show');
            }, 1500);
        }
        simwaTrigger();
        // trigger end


        //show button container start
        function simwaContainer() {

            // open container.
            jQuery('#simwa-trigger, #simwa-greeting-wr').click(function () {
                jQuery('#simwa-container').removeClass('simwa-sleep').addClass('simwa-show');
                jQuery('#simwa-trigger').removeClass('simwa-show').addClass('simwa-sleep');
                jQuery('#simwa-greeting-wr').removeClass('simwa-show').addClass('simwa-sleep');
            });

            // close container.
            jQuery('#simwa-close').click(function () {
                jQuery('#simwa-container').removeClass('simwa-show').addClass('simwa-sleep');
                jQuery('#simwa-trigger').removeClass('simwa-sleep').addClass('simwa-show');
                setTimeout(function () {
                    jQuery('#simwa-greeting-wr').removeClass('simwa-sleep').addClass('simwa-show');
                }, 1000);
            });
        }
        simwaContainer();
        //show button container end


        //find this
        function simwa_find_image_width_height() {
            var imgs = jQuery('img.simwa-find-this');
            imgs.each(function () {
                var ini = jQuery(this);
                var w = ini.width();
                var h = ini.height();
                ini.attr('width', w);
                ini.attr('height', h);
            });
        }
        // Fungsi debounce untuk membatasi frekuensi pemanggilan fungsi
        function mm_debounce(func, wait, immediate) {
            var timeout;
            return function () {
                var context = this, args = arguments;
                var later = function () {
                    timeout = null;
                    if (!immediate) func.apply(context, args);
                };
                var callNow = immediate && !timeout;
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
                if (callNow) func.apply(context, args);
            };
        };
        simwa_find_image_width_height();
        jQuery(window).on('resize', mm_debounce(function () {
            simwa_find_image_width_height();
        }, 250));
        //find this




        //JQuery end above.
    });
});