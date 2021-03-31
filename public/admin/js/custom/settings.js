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


$("#company-bank-form").validate({
    rules: {
        txBankInfo: {
            required: true,
        }
    },
    messages: {
        txBankInfo: {
            required: "Please enter a Company Bank Details",
        }
    }
});

$(".update-bankinfo").on("click", function () {
    var id = $(this).data('id');
    var bankInfo = $(this).data("bankinfo");
    $("#company-bank-form").find("#iCompanyBankDetailId").val(id);
    $("#company-bank-form").find("#txBankInfo").val(bankInfo);
});


$("#terms-condition-form").validate({
    rules: {
        txCondition: {
            required: true,
        }
    },
    messages: {
        txCondition: {
            required: "Please enter a Company Terms & Condition",
        }
    }
});

$(".update-condition").on("click", function () {
    var id = $(this).data('id');
    var condition = $(this).data("condition");
    $("#terms-condition-form").find("#iCompanyContidionId").val(id);
    $("#terms-condition-form").find("#txCondition").val(condition);
});