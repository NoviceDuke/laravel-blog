$.fn.extend({
    animateCss: function(animationName) {
        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        $(this).addClass('animated ' + animationName).one(animationEnd, function() {
            $(this).removeClass('animated ' + animationName);
        });
    }
});

/* All page used */
$(document).ready(function() {
    //materail styleselect 標籤初始化
    // $('select').material_select();
    $('.chips-placeholder').material_chip({
        placeholder: 'Enter a tag',
        secondaryPlaceholder: '+Tag',
    });
    $('.chips').material_chip();

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

    // 動畫

    $("#float_previous").animateCss('bounceIn');
    $("#float_menu").animateCss('zoomIn');


});

/* blog.article.create.blade.php */
$(document).ready(function() {
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 2 // Creates a dropdown of 15 years to control year
    });

    //動畫
    $("#article_create_submit").animateCss('zoomIn');
    $("#article_edit_submit").animateCss('zoomIn');
    // $("h4").animateCss('zoomIn');
});
function article_create_submit() {
    var tags = $('.chips').material_chip('data');
    console.log(tags);
    for (var key in tags) {
        $('<input />').attr('type', 'hidden')
        .attr('name', "tags["+key+"]")
        .attr('value', tags[key].tag)
        .appendTo('#article_create_form');
    }

    document.getElementById('article_create_form').submit();
}
function article_edit_submit() {
    document.getElementById('article_edit_form').submit();
}

/* right.blade.php */
$(document).ready(function() {
    $('.carousel').carousel();
});
