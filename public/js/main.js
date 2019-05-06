// delete comment
// $('.del-item').on('click', function(){
//     console.log($(this).data('id'));
//     var res = confirm('Подтвердите действие');
//     if(res){
//         var id = $(this).data('id');
//         $.ajax({
//             url: '/comment/delete',
//             data: {id: id},
//             type: 'GET',
//
//             success: function(res ){
//                 $("#parrent_comment").html(res);
//             },
//             error: function(){
//                 alert('Error!');
//             }
//         });
//     }
//
// });

$('.del-item').click(function(){
    window.location = 'comment/delete?id=' + $(this).data('id');
});
// download images
if($('div').is('#single')){
    var buttonSingle = $("#single"),
        file;
}
if(buttonSingle){
    console.log(buttonSingle.data('url') + "?upload=1");
    new AjaxUpload(buttonSingle, {
        action:buttonSingle.data('url') + "?upload=1",
        data: {name: buttonSingle.data('name')},
        name: buttonSingle.data('name'),
        onSubmit: function(file, ext){
            if (! (ext && /^(jpg|png|jpeg|gif)$/i.test(ext))){
                alert('Ошибка! Разрешены только картинки');
                return false;
            }
            buttonSingle.closest('.file-upload').find('.overlay').css({'display':'block'});

        },
        onComplete: function(file, response){

            setTimeout(function(){
                buttonSingle.closest('.file-upload').find('.overlay').css({'display':'none'});
                console.log(response);
                response = JSON.parse(response);
                console.log(response);
                $('.' + buttonSingle.data('name')).html('<img src="'+path+'/public/upload/images/' + response.file + '" style="max-height: 75px;">');
            }, 1000);
        }
    });
}
