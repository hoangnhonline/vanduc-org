$(document).ready(function(){
    var $tabs_link = $('.list_tabs a');
    $tabs_link.click(function(i){
        var $this = $(this),
            get_id = $this.attr('title');
        $tabs_link.parent().removeClass('active');
        $this.parent().addClass('active');
        $('.item_tab').hide();
        $('#'+get_id).show();
        return false;
    });
});