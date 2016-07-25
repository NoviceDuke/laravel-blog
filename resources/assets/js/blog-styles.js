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
});

/* blog.post.create.blade.php */
$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 2 // Creates a dropdown of 15 years to control year
});
function post_create_submit() {
    document.getElementById('post_create_form').submit();
}
