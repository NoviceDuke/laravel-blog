$.fn.extend({
    animateCss: function(animationName) {
        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        $(this).addClass('animated ' + animationName).one(animationEnd, function() {
            $(this).removeClass('animated ' + animationName);
        });
    }
});
/* app.blade.php  Foating至頂按鈕初始化 */
$(document).ready(function() {
    $("#btn-floating-green").click(function() {
        $('html,body').animate({
            scrollTop: 0
        }, 750);
    });
    $('.slider').slider({
        full_width: true
    });
    $("#post_create_submit").animateCss('zoomIn');
    $("#float_previous").animateCss('bounceIn');
    $("#float_menu").animateCss('zoomIn');
    $("h4").animateCss('zoomIn');

});

/* blog.post.create.blade.php */
$(document).ready(function() {
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 2 // Creates a dropdown of 15 years to control year
    });
});

function post_create_submit() {
    document.getElementById('post_create_form').submit();
}
$(window).load(function(e) {
    if ($("toast").length)
        Materialize.toast($('toast').data("error"), 4000, 'toast-error');
});

/* right.blade.php */
$(document).ready(function() {
    $('.carousel').carousel();
});
