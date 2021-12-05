function delFileDone(response,ajax_config,textStatus,jqXHR) {
    if (response.status) {
        ajax_config.options.block.parent().fadeOut()
        ajax_config.options.block.elem('del').removeAttr('data-name')
        $('.add-file').find('.element').val('')
        ajax_config.options.block.elem('img-inner').html('')
    }
}

function addDataToPreview(preview, data) {
    var previewImg = preview.find('.image-preview')
    var previewDel =  preview.find('.js-del-img')
    if (data) {
        previewImg.html(data.files[0].preview)
        previewDel.attr('data-name', data.result.file_id)
        preview.fadeIn()
    } else {
        previewImg.html('')
        previewDel.attr('data-name', '')
        preview.hide()
    }
}