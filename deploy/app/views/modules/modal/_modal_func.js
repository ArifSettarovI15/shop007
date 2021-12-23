function CloseModals() {
    var magnificPopup = $.magnificPopup.instance
    magnificPopup.close()
}
function onOpenModal() {
  MaskPhone()
  grunticon.embedIcons(grunticon.getIcons(grunticon.href))
}

function openInlineModal(src) {
  $.magnificPopup.open({
    fixedContentPos: true,
    fixedBgPos: true,
    closeOnBgClick: true,
    overflowY: 'auto',
    showCloseBtn: false,
    preloader: false,
    midClick: true,
    items: {
      src: src,
      type: 'inline'
    },
    callbacks: {
      open: function() {
        initScroll($('.js-modal-scroll'))
        onOpenModal();
      },
      close: function() {
        CloseModals();
      },
      beforeOpen: function() {
        var cl='';
        if (this.st.el && this.st.el.attr('data-effect')){
          cl=this.st.el.attr('data-effect')
        }
        else {
          cl = 'fadeIn';
        }
        $('.modal').addClass(cl+' animated ')
      },
      beforeClose: function() {
        var cl='';
        if (this.st.el && this.st.el.attr('data-effect-close')){
          cl=this.st.el.attr('data-effect-close')
        }
        else {
          cl = 'fadeOut'
        }

        $('.modal').removeClass(cl+' animated fast ').addClass('fadeOut')
      },
      afterClose: function() {
        var cl = ''
        if (this.st.el && this.st.el.attr('data-effect-close')) {
          cl = this.st.el.attr('data-effect-close');
        } else {
          cl = 'fadeOut';
        }

        $('.modal').removeClass(cl)
      }
    }
  });
}

function modalSendDone(response,ajax_config,textStatus,jqXHR) {
  if (response.status) {
    openInlineModal(response.html)
    var elements = ajax_config.options.form_obj.find('.element').not('[type="hidden"]')
    elements.each(function(i, elem) {
      resetElem($(elem))
    })
  }
  if (response.complete) {
    clearBasket()
  }
}

function resetElem(elem) {
  if (elem.attr('type') === 'radio' || elem.attr('type') === 'checkbox') {
    elem.prop('checked', false)

    if (elem.hasClass('js-cbs')) {
      elem.iCheck('update')
    }
  } else {
    if (elem.attr('data-default')) {
      elem.val(elem.attr('data-default'))
    } else {
      elem.val('')
    }
  }
}
