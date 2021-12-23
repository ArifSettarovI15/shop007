$(document).on('click', '.js-upload-ref', function() {
    $('.js-upload').trigger('click')
})


$('.js-upload').fileupload({
    timeout: 3000000,
    sequentialUploads:true,
    dataType: 'json',
    submit: function (e, data) {
        var block = $(e.target).block()
        block.elem('loader').show()
    },
    done: function (e, data) {
        var block = $(e.target).block()
        var preview = block.elem('preview')
        block.elem('loader').hide()
        if (data.result.error) {
            alert(data.result.error);
        }
        else{
            addDataToPreview(preview, data)
            block.find('.element').val(data.result.file_id)
        }

    }
})

$(document).on('click', '.js-del-img', function() {
    var data={}
    data['action']='delete_file'
    data['file_id']=$(this).attr('data-name')

    var options={}
    options['block'] = $(this).block()
    options['AfterDone'] = delFileDone
    SendAjaxRequest(
        {
            'url': home_url + '/files/delete/',
            'data':data,
            'options':options
        }
    )
})