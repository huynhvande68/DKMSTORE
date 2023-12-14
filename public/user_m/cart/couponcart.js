function coupon(e) {
    e.preventDefault();
    if (
        !$(this)
            .parent()
            .find("input")
            .val()
    ) {
        $(this)
            .parent()
            .find("span.alert")
            .addClass("alert-warning");
        $(this)
            .parent()
            .find("span.alert")
            .text("Ma khong hop le");
        setTimeout(function() {
            $("span.alert").removeClass("alert-warning");
            $("span.alert").text("");
        }, 2000);
    } else {
        let code = $(this)
            .parent()
            .find("input")
            .val()
            .replace(/[^a-z0-9\s]/gi, "")
            .toUpperCase();
        let url = $(this)
            .parent()
            .parent()
            .attr("action");

        //call ajax
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('input[name="_token"]').val()
            },
            type: "POST",
            url: url,
            data: { val: code },
            dataType: "json",
            success: function(data) {
                if (data.code === 200) {
                    if (data.message == 0) {
                        $("span.alert").addClass("alert-danger");
                        $("span.alert").text("Ma da het han");
                        setTimeout(function() {
                            $("span.alert").removeClass("alert-danger");
                            $("span.alert").text("");
                        }, 2000);
                    }
                    if (data.message == -1) {
                        $("span.alert").addClass("alert-info");
                        $("span.alert").text("Ma chua den ngay su dung");
                        setTimeout(function() {
                            $("span.alert").removeClass("alert-info");
                            $("span.alert").text("");
                        }, 2000);
                    }
                    if (data.message == 3) {
                        $("span.alert").addClass("alert-secondary");
                        $("span.alert").text("Ma sai - da dung het");
                        setTimeout(function() {
                            $("span.alert").removeClass("alert-secondary");
                            $("span.alert").text("");
                        }, 2000);
                    }
                    if (data.message == 1) {
                        $("span.alert").addClass("alert-success");
                        $("span.alert").text("Áp dụng mã thành công");
                        setTimeout(function() {
                            $("span.alert").removeClass("alert-success");
                            $("span.alert").text("");
                        }, 2000);
                        if (data.select_code == 1) {
                            $(".qrcode").val(data.qr_code);
                            $(".cpon").text("(theo %)");
                            $("td.csd").text(data.detail);
                        }
                        if (data.select_code == 2) {
                            $(".qrcode").val(data.qr_code);
                            $(".cpon").text("(theo tien mat)");
                            $("td.csd").text(data.detail);
                        }
                        let a = document.getElementsByClassName("cart_amount");
                        let total = parseInt(
                            a[0].innerText.replaceAll(",", "")
                        );
                        let sale = parseInt(a[2].innerText);
                        let shipper = parseInt(a[1].innerText.replace(".", ""));
                        if (data.select_code == 1) {
                            let totals = (total + shipper) / sale;
                            a[3].innerHTML = totals.toLocaleString("it-IT", {
                                style: "currency",
                                currency: "VND"
                            });
                            num = totals / 22755;
                            $(".show_pal").val(num.toFixed(2));
                        } else {
                            let totals = total + shipper - sale;
                            if (sale > total) {
                                totals = shipper;
                            }
                            a[3].innerHTML = totals.toLocaleString("it-IT", {
                                style: "currency",
                                currency: "VND"
                            });
                            num = totals / 22755;
                            $(".show_pal").val(num.toFixed(2));
                        }
                    }
                }
            }
        });
    }
}

$(function() {
    $(".btn_coupon").click(coupon);
});
