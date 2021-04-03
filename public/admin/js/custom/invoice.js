$('[data-toggle="select2"]').select2();

function replaceAll(string, search, replace) {
    return string.split(search).join(replace);
}

$(".invoice-client").on("change", function () {
    var iClientId = $(this).val();
    $.ajax({
        url: baseUrl + '/admin/client/get-client',
        data: {
            iClientId: iClientId,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        method: 'POST',
        success: function (_response) {
            if (_response.code == "1") {
                var _data = _response.data;
                $("#client-address").html(_data.txAddress);
                $("#client-gst").html(_data.vGST);
            }
        }
    });
});

$(document).on("change", ".select-invoice-item", function () {
    var iItemId = $(this).val();
    var currentDropdown = $(this);
    $.ajax({
        url: baseUrl + '/admin/item/get-item',
        data: {
            iItemMasterId: iItemId,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        method: 'POST',
        success: function (_response) {
            if (_response.code == "1") {
                var _data = _response.data;
                $(currentDropdown).closest(".row").find(".item-rate").val(_data.dcPrice);
                calculateItemQtyTotalAmount($(currentDropdown).closest(".row"));
            }
        }
    });
});

/**
 * @description event is used to update the qty and its price
 */
$(document).on("input", ".item-qty", function () {
    calculateItemQtyTotalAmount($(this).closest(".row"));
})

/**
 * Initialize calder
 */
$("#invoice-date").flatpickr({
    minDate: new Date(),
    defaultDate: new Date()
});

$(document).on("click", ".remove-item", function () {
    var totalItems = $("#item-list").find(".row").length;
    if (totalItems > 1) {
        $(this).closest(".row").remove();
        calculatePrices();
    } else {
        alert("You can not delete this item. Invoice should have at least one Item");
    }
});


$(".add-item").on("click", function () {
    var totalItems = $("#item-list").find(".row").length;
    var itemTemplate = $("#item-template").html();

    itemTemplate = replaceAll(itemTemplate, "invoiceItemSr", "invoiceItem[" + totalItems + "][sr]");
    itemTemplate = replaceAll(itemTemplate, "invoiceItemTitle", "invoiceItem[" + totalItems + "][vItemTitle]");
    itemTemplate = replaceAll(itemTemplate, "invoiceItemHsn", "invoiceItem[" + totalItems + "][vHSN]");
    itemTemplate = replaceAll(itemTemplate, "invoiceItemQty", "invoiceItem[" + totalItems + "][iQty]");
    itemTemplate = replaceAll(itemTemplate, "invoiceItemRate", "invoiceItem[" + totalItems + "][dRate]");
    itemTemplate = replaceAll(itemTemplate, "invoiceItemAmount", "invoiceItem[" + totalItems + "][dAmount]");

    $("#item-list").append(itemTemplate);

    $("[name='invoiceItem[" + totalItems + "][sr]']").val((totalItems + 1));
    $("[name='invoiceItem[" + totalItems + "][vItemTitle]']").select2();

    totalItems = totalItems + 1;
});


/**
 * This function is used to calculate the total amount based on item quantity
 */
function calculateItemQtyTotalAmount(currentRow) {
    var iQty = parseFloat($(currentRow).find(".item-qty").val());
    var dcPrice = parseFloat($(currentRow).find(".item-rate").val());
    var dcAmount = iQty * dcPrice;
    $(currentRow).find(".item-amount").val(dcAmount.toFixed(2));
    calculatePrices();
}

/**
 * Single function to calculate the prices
 */
function calculatePrices() {
    var items = $("#item-list").find(".row");
    var length = $("#item-list").find(".row").length;
    var grossTotal = 0;
    if (length > 0) {
        for (var i = 0; i < length; i++) {
            var element = items[i];
            var amount = $(element).find(".item-amount").val();
            grossTotal = grossTotal + parseFloat(amount);
        }

        grossTotal = grossTotal.toFixed(2);

        $("#dGrossTotal").val(grossTotal);

        var dCarting = $("#dCarting").val();
        var dTotal = parseFloat(grossTotal) + parseFloat(dCarting);
        $("#dTotal").val(dTotal.toFixed(2));

        var diSgst = ((dTotal * iSgst) / 100).toFixed(2);
        var diCgst = ((dTotal * iCgst) / 100).toFixed(2);
        $("#dSGST").val(diSgst);
        $("#dCGST").val(diCgst);

        var dGrandTotal = parseFloat(dTotal) + parseFloat(diSgst) + parseFloat(diCgst);

        var dRoundOff = $("#dRoundOff").val();
        dGrandTotal = parseFloat(dGrandTotal) - parseFloat(dRoundOff);

        $("#dGrandTotal").val(dGrandTotal.toFixed(2));

    }
}
