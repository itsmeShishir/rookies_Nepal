$("#drop-down-myaccount").click(function () {
    alert("clicked")
})
//for product detail page image view 
$(".image-div").click(function () {
    var img_src = document.getElementById("product-image").src;
    document.getElementById("product-image-view").style.display = "flex";
    document.getElementById("view-image").src = img_src;

})
$("#close-preview").click(function () {
    document.getElementById("product-image-view").style.display = "none";

})
$(".product_price").change(function (e) {
    let price = $(".product_price").val()
    const tax_amount = price * 0.13
    $("#tax_amount").val(tax_amount);

})
$(window).keydown(function (event) {
    if (event.keyCode == 13) {
        event.preventDefault();
        return false;
    }
});

