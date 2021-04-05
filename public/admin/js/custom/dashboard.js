var datatable = $('#invoice-dashboard-list').DataTable({
    processing: true,
    dom: 'Blfrtip',
    buttons: [],
    serverSide: true,
    stateSave: true,
    searching: true,
    ajax: {
        url: baseUrl + "/admin/dashboard/get-invoices",
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
            data: 'dInvoiceDate',
            "orderable": false,
            className: "width10 text-center"
        },
        {
            data: 'dGrandTotal',
            "orderable": false,
            className: "width10 text-center"
        },
        {
            data: 'tiIsPaid',
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
