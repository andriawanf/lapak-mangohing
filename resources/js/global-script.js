$(document).ready(function () {
    // Update quantity and subtotal when input value changes
    $('[id^="quantity-input-"]').off('input').on('input', function () {
        var input = $(this);
        var quantity = input.val();
        var price = input.data('price');
        var id = input.data('id');

        // Ensure the quantity is at least 1
        if (quantity < 1) {
            quantity = 1;
            input.val(quantity);
        }

        // Calculate the new subtotal
        var newSubtotal = price * quantity;

        // Update the subtotal in the table row
        // $('#subtotal-' + id).find('.subtotal-value').text('Rp. ' + newSubtotal.toLocaleString() + ',00');

        // Update the total subtotal in the card
        updateTotalSubtotal();

        // Send AJAX request to update the database
        updateQuantityInDatabase(id, quantity);
    });

    // Decrement button functionality
    $('[id^="decrement-button-"]').off('click').on('click', function () {
        var button = $(this);
        var inputId = button.data('counter-decrement');
        var input = $('#' + inputId);
        var quantity = parseInt(input.val()) - 1;
        // Decrease the quantity by 1
        if (quantity > 1) {
            input.val(quantity).trigger('input');
        }
    });

    // Increment button functionality
    $('[id^="increment-button-"]').off('click').on('click', function () {
        var button = $(this);
        var inputId = button.data('counter-increment');
        var input = $('#' + inputId);
        var quantity = parseInt(input.val()) + 1;
        // Increase the quantity by 1
        input.val(quantity).trigger('input');
    });

    function updateTotalSubtotal() {
        var totalSubtotal = 0;

        // Sum all subtotals
        $('[id^="quantity-input-"]').each(function () {
            var input = $(this);
            var quantity = input.val();
            var price = input.data('price');
            var subtotal = price * quantity;

            totalSubtotal += subtotal;
        });

    }

    function updateQuantityInDatabase(id, quantity) {
        $.ajax({
            url: '/product/collection/update-cart', // Ganti dengan URL endpoint untuk memperbarui cart
            method: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'), // Sertakan token CSRF
                id: id,
                quantity: quantity
            },
            success: function (response) {
                // Jika ada respon yang perlu ditangani, bisa ditambahkan di sini
            },
            error: function (xhr, status, error) {
                console.error('Failed to update quantity');
                // Tangani kesalahan, misalnya menampilkan pesan kesalahan ke pengguna
            }
        });
    }

    // Initial calculation of total subtotal
    updateTotalSubtotal();
});


// total
$(document).ready(function () {
    const checkboxes = $('input[type="checkbox"][data-id]');
    const quantityInputs = $('input[data-input-counter]');
    const subtotalElement = $('.subtotal-product');
    const totalDiscount = $('.total-discount');
    const discountPercent = $('.discount-percent');
    const totalElement = $('.total-price');

    checkboxes.on('change', updateCart);
    quantityInputs.on('input', updateCart);

    function updateCart() {
        const selectedProductIds = checkboxes.filter(':checked').map(function () {
            return $(this).data('id');
        }).get();

        if (selectedProductIds.length > 0) {
            $.ajax({
                url: '/product/cart/calculate',
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    product_ids: selectedProductIds
                },
                success: function (response) {
                    const subtotal = response.subtotal;
                    const discount = response.total_discount;
                    const total_discount = response.discounted_price;
                    const grand_total = response.grand_total;

                    subtotalElement.text(`Rp. ${grand_total.toLocaleString('id-ID', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`);
                    discountPercent.text(new Intl.NumberFormat('id-ID', { minimumFractionDigits: 2, maximumFractionDigits: 2, }).format(discount) + '%');
                    totalDiscount.text('-Rp. ' + new Intl.NumberFormat('id-ID', { minimumFractionDigits: 2, maximumFractionDigits: 2, }).format(total_discount));
                    totalElement.text(`Rp. ${subtotal.toLocaleString('id-ID', { minimumFractionDigits: 0, maximumFractionDigits: 0 })},00`);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        } else {
            subtotalElement.text('Rp. 0.00');
            totalElement.text('Rp. 0.00');
        }
    }
});

// checkout
document.getElementById('product-selection-form').addEventListener('submit', function (e) {
    const checkboxes = document.querySelectorAll('input[name="product_ids[]"]:checked');
    if (checkboxes.length === 0) {
        e.preventDefault();
        alert('Please select at least one product.');
    }
});