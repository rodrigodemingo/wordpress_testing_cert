jQuery(document).ready(function($) {
    $('.panel').hover(function() {
        $('.panel-collapse', this).stop(true, true).delay(200).fadeIn();
    }, function() {
        $('.panel-collapse', this).stop(true, true).delay(200).fadeOut();
    });
});