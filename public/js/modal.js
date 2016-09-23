$(document).ready(function(){


    var url ="category";

    //display modal form for category editing
    $('.open-modal').click(function(){
        var category_slug = $(this).val();

        $.get(url + '/' + category_slug, function (data) {
            //success data
            console.log(data);
            $('#category_slug').val(data.slug);
            $('#category').val(data.name);
            $('#btn-save').val("update");
            $('#myModal').modal('show');
        })
    });

    //display modal form for creating new Category
    $('#btn-add').click(function(){
        $('#btn-save').val("add");
        $('#frmCategory').trigger("reset");
        $('#myModal').modal('show');
    });

    //delete category and remove it from list
    $('.delete-Category').click(function(){
        var category_slug = $(this).val();

        $.ajax({

            type: "DELETE",
            url: url + '/' + category_slug,
            success: function (data) {
                console.log(data);

                $("#category" + category_slug).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    //create new category / update existing category
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

        e.preventDefault();

        var formData = {
            Category: $('#category').val(),

        }

        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();

        var type = "POST"; //for creating new resource
        var category_id = $('#category_id').val();;
        var my_url = url;

        if (state == "update"){
            type = "PUT"; //for updating existing resource
            my_url += '/' + category_id;
        }

        console.log(formData);

        $.ajax({

            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);

                var category = '<tr id="category' + data.id + '"><td>' + data.id + '</td><td>' + data.category + '</td><td>' + data.description + '</td><td>' + data.created_at + '</td>';
                category += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" value="' + data.id + '">Edit</button>';
                category += '<button class="btn btn-danger btn-xs btn-delete delete-category" value="' + data.id + '">Delete</button></td></tr>';

                if (state == "add"){ //if user added a new record
                    $('#category-list').append(category);
                }else{ //if user updated an existing record

                    $("#category" + category_id).replaceWith( category );
                }

                $('#frmCategory').trigger("reset");

                $('#myModal').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
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

//# sourceMappingURL=modal.js.map
