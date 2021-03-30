$("#itemForm").validate({
    rules: {
        vTitle: {
            required: true,
        },
        dcPrice: {
            required: true,
            number: true
        }
    },
    messages: {
        vTitle: {
            required: "Please enter a Item Name",
        },
        dcPrice: {
            required: "Please enter a Item Rate",
            number: "Please enter a valid Item Rate"
        }
    }
});

var datatable = $('#item-datatable').DataTable({
    processing: true,
    dom: 'Blfrtip',
    buttons: [],
    serverSide: true,
    stateSave: true,
    searching: true,
    ajax: {
        url: baseUrl + "/admin/item/get-items",
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    },
    "order": [
        [1, "asc"]
    ],
    columns: [{
            data: 'DT_RowIndex',
            "orderable": false,
            "searchable": false,
            className: "width5 text-center"
        },
        {
            data: 'vTitle',
            "orderable": false,
            className: "width25 text-left"
        },
        {
            data: 'dcPrice',
            "orderable": false,
            className: "width10 text-center"
        },
        {
            data: 'action',
            "orderable": false,
            "searchable": false,
            className: "width10 text-center"
        },
    ]
});
