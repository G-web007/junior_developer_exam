$(document).ready(function () {
    // Submitting the product form using AJAX
    $("#productForm").submit(function(e) {
        e.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: "add_product.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                loadProducts();
                $("#productForm")[0].reset();
            }
        });
    });

    loadProducts();

    // $(document).on("click", ".edit-btn", function () {
    //     var product_id = $(this).data("id");
        // Update product using AJAX
        // $("#editForm").submit(function (e) {
        //     e.preventDefault();

        //     var formData = $(this).serialize();

        //     $.ajax({
        //         type: "POST",
        //         url: "update_product.php",
        //         data: formData,
        //         success: function () {
        //             loadProducts(); 
        //         },
        //         error: function () {
        //             // Handle error, if any
        //         }
        //     });
        // });
    // });   

    // Delete product using AJAX
    $(document).on("click", ".delete-btn", function () {
        var product_id = $(this).data("id");

        if (confirm("Are you sure you want to delete this product?")) {
            $.ajax({
                url: "delete_product.php",
                method: "POST",
                data: { id: product_id },
                success: function () {
                    loadProducts();
                },
                error: function () {
     
                }
            });
        }
    });

     // Loading products on page load
     function loadProducts() {
        $.ajax({
            type: "GET",
            url: "get_product.php",
            success: function(response) {
                $("#productList").html(response);
            }
        });
    }
    
});



