function initSortableWidgets() {
  $('[data-custom-sortable-widget=1]').sortableWidgets({
    animation: 300,
    handle: '.custom-sortable-widget-handler',
    dataIdAttr: 'data-sortable-id',
    onEnd: function (e) {
      var context = $(this.el);//.parents('[data-custom-sortable-widget=1]');console.log(this.el);
      $.post(context.data('sortable-url'), {
        sorting: this.toArray(),
        offset: $(e.item).find('[data-offset]').data('offset')
      }).done(function (jsonData) {
          if (context.data('pjax')) {
              $.pjax.reload({container: context.data('pjax-container'), timeout: context.data('pjax-timeout')})
          }
          var toastContent = jsonData["message"];
          M.toast({html: toastContent});
      });
    }
  });
}