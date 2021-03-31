$("#companyForm").validate({
    rules: {
        vCompanyName: {
            required: true
        },
        txAddress: {
            required: true
        },
        vCompanyGstNumber: {
            required: true
        },
        iSgst: {
            required: true,
            number: true
        },
        iCgst: {
            required: true,
            number: true
        }
    },
    messages: {
        vCompanyName: {
            required: "Please enter Company Name"
        },
        txAddress: {
            required: "Please enter Company address"
        },
        vCompanyGstNumber: {
            required: "Please enter GST No."
        },
        iSgst: {
            required: "Please enter SGST No."
        },
        iCgst: {
            required: "Please enter SGST No."
        }
    }
});

$("#company-terms-form").validate({
    rules: {
        vTitle: {
            required: true,
        }
    },
    messages: {
        vTitle: {
            required: "Please enter a company terms",
        }
    }
});

$(".edit-company-terms").on("click", function () {
    var id = $(this).data("id");
    var vTitle = $(this).data("title");
    $("#company-terms-form").find("#vTitle").val(vTitle);
    $("#company-terms-form").find("#iCompanyTermId").val(id);
})
