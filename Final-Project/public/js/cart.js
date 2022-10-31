load_cart(localStorage.getItem("route_cart"));
function tombol_cart(){
    load_cart(localStorage.getItem("route_cart"));
}
function load_cart(url){
    $.ajax({
        type: "GET",
        url: url,
        dataType: 'json',
        success: function (response){
            $('.top-cart-items').html(response.collection);
            $('.top-checkout-price').html('Rp. '+format_ribuan(response.total));
            $('.top-cart-number').html(format_ribuan(response.total_item) ?? 0);
            // $('#counter_cart').html(format_ribuan(response.total_item) ?? 0);
        },
    });
}
$(document).on('click', '#top-cart', function(){
    load_cart(localStorage.getItem("route_cart"));
});
function add_cart(url, id){
    $.post(url, {id:id}, function(result) {
        load_cart(localStorage.getItem("route_cart"));
    }, "json");
}
function delete_cart(url){
    $.post(url, {}, function(result) {
    }, "json");
}