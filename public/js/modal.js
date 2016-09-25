$(document).ready(function(){



    var url ="category/";


    //display modal form for category editing
    $('.edit-modal').click(function(){
        var category_slug = $(this).val();

        $.get(url  + category_slug, function (data) {
            //success data
            //console.log(data);
            console.log(category_slug);

            $('#category_slug').val(data.slug);
            $('#category_name').val(data.name);
            $('#btn-save').val("update");
            $('#categoryModal').modal('show');
        })
    });

    //display modal form for creating new Category
    $('#btn-add').click(function(){
        $('#btn-save').val("add");
        $('#frmCategory').trigger("reset");
        $('#categoryModal').modal('show');
    });

    //delete category and remove it from list
    $('.delete-category').click(function(){
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

            name:$('#category_name').val(),
        }

        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();

        var type = "POST"; //for creating new resource
        var category_new_name = $('#category_name').val();;
        var my_url = url;

        if (state == "update"){
            type = "PUT"; //for updating existing resource
            my_url +=   category_slug;
        }

        console.log(formData);

        $.ajax({

            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);

                var category = '<tr id="category' + data.slug + '"><td>' + data.id + '</td><td>' + data.name + '</td><td>' + data.created_at + '</td>';
                category += '<td><button class="btn btn-info btn-md  edit-modal" value="' + data.slug + '">Edit</button>';
                category += '<button class="btn btn-danger btn-md  delete-category" value="' + data.slug + '">Delete</button></td></tr>';

                if (state == "add"){ //if user added a new record
                    $('#category-list').append(category);
                }else{ //if user updated an existing record

                    $("#category" + category_new_name).replaceWith( category );
                }

                $('#frmCategory').trigger("reset");

                $('#categoryModal').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
});

//# sourceMappingURL=modal.js.map
