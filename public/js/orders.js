(function($){
    'use strict';

    $(function () {

        let orderDetail = $('.order-detail');

        orderDetail.find('.title').each(function() {
            $clamp(this, {clamp: 2});
        });

        orderDetail.find('.description').each(function() {
            $clamp(this, {clamp: 2});
        });
    });

})(jQuery);