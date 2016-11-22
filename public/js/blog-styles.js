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

// 註冊設定 a button能夠賦予DELETE method
// <a href="posts/2" data-method="delete" data-confirm="Are you sure?" data-token="{{csrf_token()}}">
  var laravel = {
     initialize: function() {
       this.methodLinks = $('a[data-method]');
       this.token = $('a[data-token]');
       this.registerEvents();
     },

     registerEvents: function() {
       this.methodLinks.on('click', this.handleMethod);
     },

     handleMethod: function(e) {
       var link = $(this);
       var httpMethod = link.data('method').toUpperCase();
       var form;

       // If the data-method attribute is not PUT or DELETE,
       // then we don't know what to do. Just ignore.
       if ( $.inArray(httpMethod, ['PUT', 'DELETE']) === - 1 ) {
         return;
       }

       // Allow user to optionally provide data-confirm="Are you sure?"
       if ( link.data('confirm') ) {
         if ( ! laravel.verifyConfirm(link) ) {
           return false;
         }
       }

       form = laravel.createForm(link);
       form.submit();

       e.preventDefault();
     },

     verifyConfirm: function(link) {
       return confirm(link.data('confirm'));
     },

     createForm: function(link) {
       var form =
       $('<form>', {
         'method': 'POST',
         'action': link.attr('href')
       });

       var token =
       $('<input>', {
         'type': 'hidden',
         'name': '_token',
         'value': link.data('token')
         });

       var hiddenInput =
       $('<input>', {
         'name': '_method',
         'type': 'hidden',
         'value': link.data('method')
       });

       return form.append(token, hiddenInput)
                  .appendTo('body');
     }
   };

   laravel.initialize();

//# sourceMappingURL=blog-styles.js.map
