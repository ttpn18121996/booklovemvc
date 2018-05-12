$(document).ready(function() {
    $(".add").click(function() {
        var t = $(this).attr("id"),
            a = $("#rooturl").attr("url");
        $.ajax({
            url: a + "cart/add",
            dataType: "json",
            data: {
                id: t
            },
            type: "POST",
            success: function(t) {
                $(".cart-box p").text("Có " + t.total + " sản phẩm"), $(".cart-box h3").html('<i class="fa fa-shopping-cart" aria-hidden="true"></i> ' + t.totalBill + " VNĐ"), $("#modalCart").modal("show")
            },
            error: function(t) {
                $(".cart-box p").text("Có " + t.total + " sản phẩm"), $(".cart-box h3").html('<i class="fa fa-shopping-cart" aria-hidden="true"></i> ' + t.totalBill + " VNĐ"), $("#modalCart").modal("show")
            }
        })
    }),
    $(".update").click(function() {
        var t = $(this).parentsUntil(".tb-format tbody").find(".value").attr("id"),
            a = $(this).parentsUntil(".tb-format tbody").find(".value").text(),
            i = $("#rooturl").attr("url"),
            o = $(this).parentsUntil(".tb-format tbody").find(".price");
        $.ajax({
            url: i + "cart/update",
            dataType: "json",
            data: {
                id: t,
                qty: a
            },
            type: "POST",
            success: function(t) {
                $(".tb-format tfoot h4").text("Tổng tiền: " + t.totalBill + " VNĐ"), $(".cart-box h3").html('<i class="fa fa-shopping-cart" aria-hidden="true"></i> ' + t.totalBill + " VNĐ"), $(".cart-box p").text("Có " + t.total + " sản phẩm"), o.text(t.price + "VNĐ")
            }
        })
    }),
    $(".delete").click(function() {
        var t = $(this).attr("id"),
            a = $("#rooturl").attr("url");
        $(this).parentsUntil("tbody").fadeOut(500, function() {
            $(this).remove()
        }), $.ajax({
            url: a + "cart/deleteItem",
            dataType: "json",
            data: {
                id: t
            },
            type: "POST",
            success: function(t) {
                $(".tb-format tfoot h4").text("Tổng tiền: " + t.totalBill + " VNĐ"), $(".cart-box h3").html('<i class="fa fa-shopping-cart" aria-hidden="true"></i> ' + t.totalBill + " VNĐ"), $(".cart-box p").text("Có " + t.total + " sản phẩm")
            }
        })
    })
});