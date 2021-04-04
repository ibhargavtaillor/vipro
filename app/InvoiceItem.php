<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceItem extends Model
{
    use SoftDeletes;

    protected $table = "invoice_items";

    protected $primaryKey = 'iInvoiceItemId';

    protected $dateFormat = 'U';

    /**
     * The name of the "created at" column.
     *
     * @var string|null
     */
    const CREATED_AT = 'iCreatedAt';

    /**
     * The name of the "updated at" column.
     *
     * @var string|null
     */
    const UPDATED_AT = 'iUpdatedAt';

    /**
     * The name of the "Deleted At" column.
     *
     * @var string|null
     */
    const DELETED_AT = 'iDeletedAt';

    protected $fillable = [
        "iInvoiceItemId",
        "iInvoiceMasterId",
        "vItemTitle",
        "vHSN",
        "iQty",
        "dRate",
        "dAmount",
        "iUpdatedAt",
        "iCreatedAt",
        "iDeletedAt",
    ];

    /**
     * Relation to invice model
     */
    public function invoice()
    {
        return $this->belongsTo("App\Invoice", "iInvoiceMasterId", "iInvoiceMasterId");
    }
}
