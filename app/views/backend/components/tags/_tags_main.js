$( document ).on( "click", ".tag-add-save", function() {
    if ($('[name="tag"]').val()!='') {
        TagAddSave($('[name="tag"]').val());
    }
    else {
        ShowError('Введите тег');
    }
});


$( document ).on( "click", ".tag-save", function() {
    if ($('[name="tags_list"]').val()!=0) {
        TagSave($('[name="tags_list"]').val());
    }
    else {
        ShowError('Выберите тег');
    }
});


$( document ).on( "click", ".tags-list__delete", function() {
    TagDelete($(this).attr('data-id'));
});