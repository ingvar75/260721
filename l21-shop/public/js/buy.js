$.fn.Buy = function () {
    let container = $(this);
    let methods = {
        initEvents: function () {
            container.find('button.buy-button').on('click', methods.addToCart);
        },
        addToCart: function (e) {
            e.stopPropagation();
            e.preventDefault();

            $.ajax({
                type: 'post',
                url: '/products/add-to-cart',
                data: $(this).data(),
                success: function (data) {
                    container.find('#products-in-cart').text(data["productsInCart"]);
                }
            });
        }
    };

    methods.initEvents();
};