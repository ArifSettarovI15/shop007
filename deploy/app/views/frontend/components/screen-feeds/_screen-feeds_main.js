$(document).on('click', '.js-full-feed', function(e) {
    e.preventDefault()

    var data = {}
    data['action']='get_review'
    data['id']=$(this).attr('data-id')

    var options = {}
    options['AfterDone'] = getFeedDone
    SendAjaxRequest(
        {
            'url': home_url + '/reviews/',
            'data':data,
            'options':options
        }
    )
})

function getFeedDone(response,ajax_config,textStatus,jqXHR) {
    if (response.status) {
        openInlineModal(response.html)
    }
}