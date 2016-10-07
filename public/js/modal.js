$(document).ready(function(){



    var url ="category/";
    var old_name = "";

    //display modal form for category editing
    $('.edit-modal').click(function(){
        var category_slug = $(this).val();

        $.get(url  + category_slug, function (data) {
            //success data
            console.log(category_slug);
            $('#category_name').val(data.name);
            old_slug = category_slug;
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        var category_slug = $(this).val();
        $.post(url+category_slug, { _method:'DELETE'});
    });

    //create new category / update existing category
    $("#btn-save").click(function (e) {
        var url='category';
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();

        if (state == "update"){
            // 更新
            url =url+ '/'+ old_slug;
            var formData = {
                _method:'PUT',
                name:$('#category_name').val(),
            }
            console.log('old_slug = '+old_slug);
            $.post(url, formData);
        }else{
            // 新增
            var formData = {
                name:$('#category_name').val(),
            }
            $.post(url, formData, function(data) {
                console.log('Create Success');
                console.log('Response : ');
                console.log('name = '+data.name);
                console.log('slug = '+data.slug);

            });
        }
      
        console.log(formData);

    });
});

$(document).ready(function(){



    var url ="tag/";
    var old_name = "";

    //display modal form for tag editing
  $(document).on("click",'.tag-edit',function(){
        var tag_id = $(this).val();``

        $.get(url  + tag_id, function (data) {
            //success data
            console.log(tag_id);
            $('#tag_name').val(data.name);
            console.log(data.name);
            old_id = tag_id;
            $('#tag-save').val("update");
            $('#tagModal').modal('show');
        })
    });

    //display modal form for creating new Tag
    $('#tag-add').click(function(){
        $('#tag-save').val("add");
        $('#frmTag').trigger("reset");
        $('#tagModal').modal('show');
    });

    //delete tag and remove it from list

    $(document).on("click",'.delete-tag',function(){

        var tag_id = $(this).val();
        console.log(tag_id);
          $.ajax({
           type: "DELETE",
           url: url  + tag_id,
           success: function (data) {
               console.log(data);

               $('#tag' + tag_id).remove();
           },
         });
        });

    //create new tag / update existing tag
    $("#tag-save").click(function (e) {
        var url='tag';
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        e.preventDefault();
        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#tag-save').val();
        var tname = $('#tag_name').val()
        var formData = {
          name:$('#tag_name').val(),
        }
        //var tag_id = old_id;
        var  type ="POST";
        if (state == "update"){
            // 更新
            url =url+"/"+old_id;
            type = "PUT";
            //$.post(url, formData);
          }

            /*$.post(url, formData, function(data) {
                console.log('Create Success');
                console.log('Response : ');
                console.log('name = '+data.name);

            });*/



        $.ajax({
        //  $.post(url, formData);
          type:type,
          url:url,
          data:formData,
          datatype:'json',
          success:function(data){
            // tag data
            var tag = '<tr id="tag' + data.id + '"><td>' + data.id + '</td><td>' + data.name + '</td><td>' + data.created_at + '</td>';
            tag += '<td><button class="btn btn-info btn-md tag-edit" value="' + data.id + '">Edit</button>';
            tag += '<button class="btn btn-danger btn-md  delete-tag" value="' + data.id + '">Delete</button></td></tr>';
            // state condition
            if(state == "add"){
              $('#tag_list').append(tag);
            }else {
              console.log(tag_id);
              console.log(state);
              console.log(type);
              console.log(tname);

              $('#tag'+old_id).replaceWith(tag);
            }

            $('#frmTag').trigger("reset");
            $('#tagModal').modal('hide');
          },

        });

      //  console.log(formData);





    });
});

//# sourceMappingURL=modal.js.map
