
    $('.add_section').on('click', function(e){
        e.preventDefault()
        var sect = $(this).parent()
        sect.addClass('edited_section')
        // var html = "<div><h1>Hello World</h1></div>"
        // console.log(html)
        // openInlineModal(html)

    })

    $('.js_add_section').on('click', function(){
    var block = $(this).attr('id')
    var value = $(this).html()

    var html =
    '<section>		' +
    '<div class="section1">' +
    '<div class="section_wrapper">				' +
    '	<div class="logotype t-title">	' +
    '		<div class="title js_edit_title" onclick="edit_title(this)">TigerWeb</div>' +
    '</div>' +
    '<div class="login_button">					' +
    '<button><strong>Войти в кабинет</strong></button>' +
    '</div>' +
    '</div>		' +
    '</div>	</section>	 <div class="add_section_wrapper"><a href="#ex1" class="add_section"><img src="source/images/addadd.svg" alt=""></a>   </div>'

    $('.edited_section').after(html);
    $('.edited_section').removeClass('edited_section');
})

    function edit_title(elem){
    $(elem).replaceWith('<input type="text" class="edit_title" value="'+$(elem).html()+'"><button class="save_title" onclick="save_title_button(this)">+</button>')
    $('.save_title').css('display','block')
}
    function edit_text(elem){
    $(elem).replaceWith('<textarea rows="4" cols="50" class="edit_text">'+$(elem).html()+'</textarea><button class="save_text" onclick="save_text_button(this)">+</button>')
    $('.save_title').css('display','block')
}
    function save_title_button(elem){
    var parent = elem.closest("div")
    var title = $(parent).find('input.edit_title')
    result = "<div class=\"title js_edit_title\" onclick=\"edit_title(this)\">"+title.val()+"</div>"
    title.replaceWith(result)
    $('.save_title').remove()
}
    function save_text_button(elem){
    var parent = elem.closest("div")
    var text = $(parent).find('textarea.edit_text')

    result = "<div class=\"descr js_edit_text\"  onclick=\"edit_text(this)\">"+text.val()+"</div>"
    text.replaceWith(result)
    $('.save_text').remove()
}


    $(function(){
    $("[data-tooltip]").mousemove(function (eventObject) {
        $data_tooltip = $(this).attr("data-tooltip");
        $("#tooltip").css('background', 'url('+$data_tooltip+') no-repeat')
        $("#tooltip").css('background-size', 'contain')
        $("#tooltip").css('width', '400px')
        $("#tooltip").css('height', '300px')
            .css({
                "top" : eventObject.pageY + 5,
                "left" : eventObject.pageX + 5
            })
            .show();
    }).mouseout(function () {
        $("#tooltip").hide()
            .html("")
            .css({
                "top" : 0,
                "left" : 0
            });
    });
});


