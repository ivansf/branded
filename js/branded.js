(function (window, $) {

    $('#close-messages').live('click', function(){
        $('#console .messages').slideUp();
        return false;
    });

})(window, jQuery);