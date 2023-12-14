<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nova+Mono&family=Roboto&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">


    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @yield('style')

</head>

<body>
    @include('layouts.partials.navbar')

    @yield('content')
    @include('layouts.partials.footer')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script>
        jQuery(document).ready(function () {
            
            updateCartCounter();
            updateWishlistCounter(); 

            $('#searchForm').submit(function (e) {
                e.preventDefault();

                // Get the search query
                var query = $('#searchInput').val();
                console.log(query);
                // Make an AJAX call to the search route
                fetch("{{ route('products.search') }}?query=" + encodeURIComponent(query))
                    .then(response => response.json())
                    .then(data => {
                        // Handle the search results
                        displayResults(data);
                    })
                    .catch(error => console.error('Error:', error));
            });

            function displayResults(results) {

                var productList = $('#searchResults');
                productList.empty();

                // Render new product list
                results.forEach(function (product) {
                    var listItem = $('<li style="display: flex; align-items: center; margin-bottom: 10px;"><a href="">');

                    // Column 1: Image
                    var imageColumn = $('<div style="flex: 0 0 100px; margin-right: 10px;">');
                    imageColumn.append('<img src="' + product.product_image + '" alt="Product Image" width="100">');
                    listItem.append(imageColumn);

                    // Column 2: Title and Price
                    var infoColumn = $('<div>');
                    infoColumn.append('<h3>' + product.product_name + '</h3>');
                    infoColumn.append('<p>$' + product.price + '</p></a>');
                    listItem.append(infoColumn);

                    productList.append(listItem);
                });
            }

            // sending ajax request for removing an item from the cart

            $(".remove-from-cart").click(function (e) {
                e.preventDefault();
                var ele = $(this);
                console.log(ele.parents());
                var parent_row = ele.parents(".item-sale");

                // Show the Bootstrap modal
                $('#itemsModal').modal('show');

                // Add an event listener for the confirmation button
                $("#itemsModal").on('click', '.btn-primary', function () {
                    fetch('{{ url('remove-from-cart') }}', {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ id: ele.attr("data-id") })
                    })
                    .then(response => response.json())
                    .then(data => {
                        parent_row.remove();
                        $(".cart-total").text(data.total);
                    })
                    .catch(error => console.error('Error:', error));
                
                    // Hide the Bootstrap modal after confirmation
                    $('#itemsModal').modal('hide');
                });
            });



            //sending ajax request to calculate the new subtotal and total
            $(".quantity").change(function (e) {
                e.preventDefault();

                var ele = $(this);
                var parent_row = ele.parents("div");
                var quantity = ele.val();
                var product_subtotal = parent_row.find("span.product-subtotal");
                var cart_total = $(".cart-total");
                

                $.ajax({
                    url: '{{ url('update-cart') }}',
                    method: "patch",
                    data: { _token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: quantity },
                    dataType: "json",
                    success: function (response) {
                        console.log(ele.val())
                        product_subtotal.text(response.subTotal);
                        cart_total.text(response.total);
                       
                        ele.val(response.quantity);
                    }
                });
            });

            function updateCartCounter() {
                $.ajax({
                    url: '{{ route('cart.total') }}',
                    method: 'GET',
                    success: function (response) {
                        $('#cartCounter').text(response.total);
                    }
                });
            }

            // Function to update the wishlist counter
            function updateWishlistCounter() {
                $.get('/wishlist/count', function(data) {
                    $('#wishlistCounter').text(data.count);
                });
            }
            });
        
    </script>
</body>

</html>
