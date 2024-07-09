$(document).ready(function () {
    // csrf token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function updateSubtotal(productId) {
        var quantity = $('#quantity-input-' + productId).val();
        var price = $('#quantity-input-' + productId).data('price');
        var subtotal = quantity * price;
        $('#subtotal-' + productId + ' .subtotal-value').text(
            `Rp. ${Intl.NumberFormat('id-ID').format(subtotal)},00`
        );
    }

    function updateQuantity(input, quantity) {
        var productId = input.data('id');
        input.val(quantity);
        updateSubtotal(productId);

        $.ajax({
            url: '/product/collection/update-cart',
            method: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                product_id: productId,
                quantity: quantity
            },
            success: function (response) {
                // Handle success response (optional)
            },
            error: function (xhr, status, error) {
                // Handle error response (optional)
                alert('Error: ' + error);
            }
        });
    }

    $('[id^="quantity-input-"]').on('input', function () {
        var input = $(this);
        var quantity = input.val();
        updateQuantity(input, quantity);
    });

    $('[id^="decrement-button-"]').on('click', function () {
        var id = $(this).data('input-counter-decrement');
        var input = $('#' + id);
        var quantity = parseInt(input.val());
        if (quantity < 1) quantity = 1;
        updateQuantity(input, quantity);
    });

    $('[id^="increment-button-"]').on('click', function () {
        var id = $(this).data('input-counter-increment');
        var input = $('#' + id);
        var quantity = parseInt(input.val());
        updateQuantity(input, quantity);
    });

});

// total
$(document).ready(function () {
    const checkboxes = $('input[type="checkbox"][data-id]');
    const quantityInputs = $('input[data-input-counter]');
    const subtotalElement = $('.subtotal-product');
    const totalElement = $('.total-price');

    checkboxes.on('change', updateSubtotal);
    quantityInputs.on('input', updateSubtotal);

    function updateSubtotal() {
        let subtotal = 0;
        let total = 0;
        checkboxes.each(function () {
            if ($(this).is(':checked')) {
                const id = $(this).data('id');
                const quantityInput = $(`#quantity-input-${id}`);
                const price = parseFloat(quantityInput.data('price'));
                const quantity = parseInt(quantityInput.val());
                subtotal += price * quantity;
                total += price * quantity;
            }
        });

        subtotalElement.text(`Rp. ${subtotal.toLocaleString('id-ID', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`);
        totalElement.text(`Rp. ${total.toLocaleString('id-ID', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`);
    }

});