$(document).ready(function(){



    var url ="category/";
    var old_name = "";

    //display modal form for tag editing
  $(document).on("click",'.edit-modal',function(){
        var category_slug = $(this).val();

        $.get(url  + category_slug, function (data) {
            //success data
            console.log(category_slug);
            $('#category_name').val(data.name);
            console.log(data.name);
            old_slug = category_slug;
            $('#btn-save').val("update");
            $('#categoryModal').modal('show');
        })
    });

    //display modal form for creating new Tag
    $('#btn-add').click(function(){
        $('#btn-save').val("add");
        $('#frmCategory').trigger("reset");
        $('#categoryModal').modal('show');
    });

    //delete tag and remove it from list

    $(document).on("click",'.delete-category',function(){
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
      })
        var category_slug = $(this).val();
        console.log(category_slug);
          $.ajax({
           type: "POST",
           data:{_method: 'delete'},
           url: url  + category_slug,
           success: function (data) {
              // console.log(data);

               $('#category' + category_slug).remove();
           },
         });
        });

    //create new tag / update existing tag
    $("#btn-save").click(function (e) {
        var url='category';
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        e.preventDefault();
        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();
        var  type ="POST";
        var formData = {
          name:$('#category_name').val(),
        }
        // 更新
        if (state == "update"){
            url =url+"/"+old_slug;
            type = "PUT";
          }
        $.ajax({

          type:type,
          url:url,
          data:formData,
          datatype:'json',
          success:function(data){
            // category data
            var category = '<tr id="category' + data.id + '"><td>' + data.id + '</td><td>' + data.name + '</td><td>' + data.created_at + '</td>';
            category += '<td><button class="btn btn-info btn-md tag-edit" value="' + data.slug + '">Edit</button>';
            category += '<button class="btn btn-danger btn-md  delete-tag" value="' + data.slug + '">Delete</button></td></tr>';

            // state condition
            if(state == "add"){

              console.log("# "+data.id+" Add Success!!");
              console.log("Name: "+data.name);
              console.log("Slug: "+data.slug);
              $('#category_list').append(category);
            }else {
              console.log("# "+old_slug+" Update Success!!");
              console.log("Name: "+data.name);
              console.log("Slug: "+data.slug);
              $('#category'+old_slug).replaceWith(category);

            }

            $('#frmCategory').trigger("reset");
            $('#categoryModal').modal('hide');
          },

        });
      });
});
