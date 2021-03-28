$("#clientForm").validate({
    rules: {
        vClientName: {
            required: true,
        },
        txAddress: {
            required: true,
        },
        vGST: {
            required: true,
        }
    },
    messages: {
        vClientName: {
            required: "Please enter Client Name",
        },
        txAddress: {
            required: "Please enter Client Address",
        },
        vGST: {
            required: "Please enter GST Number",
        }
    }
});


var datatable = $('#datatable').DataTable({
    processing: true,
    dom: 'Blfrtip',
    buttons: [],
    serverSide: true,
    stateSave: true,
    searching: true,
    ajax: {
        url: baseUrl + "/admin/client/get-clients",
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
            data: 'vClientName',
            "orderable": false,
            className: "width25 text-left"
        },
        {
            data: 'txAddress',
            "orderable": false,
            className: "width10 text-center"
        },
        {
            data: 'vGST',
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
