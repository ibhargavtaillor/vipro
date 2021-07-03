<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Invoice extends Model
{
    use SoftDeletes;

    protected $table = "invoice_master";

    protected $primaryKey = 'iInvoiceMasterId';

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
        "iInvoiceMasterId",
        "vUrlKey",
        "vInvoiceNumber",
        "iClientMasterId",
        "vClientName",
        "dInvoiceDate",
        "vPaymentTerms",
        "txBillingAddress",
        "txShippingAddress",
        "txTermsAndCondition",
        "txBankDetail",
        "dGrossTotal",
        "dCarting",
        "dTotal",
        "dSGSTPerc",
        "dSGST",
        "dCGSTPerc",
        "dCGST",
        "dIGSTPerc",
        "dIGST",
        "tiIsOutOfState",
        "dRoundOff",
        "dGrandTotal",
        "iTotalInvoicePrintedCount",
        "tiIsPaid",
        "tiIsActive",
        "iUpdatedAt",
        "iCreatedAt",
        "iDeletedAt",
    ];

    /**
     * Relation to Invoice Item model
     */
    public function items()
    {
        return $this->hasMany("App\InvoiceItem", "iInvoiceMasterId", "iInvoiceMasterId");
    }

    /**
     * @return String invoice number
     */
    public static function generateNextInvoiceNumber()
    {
        $prefix = date("d") . strtoupper(date("M")) . date("y");
        $lastInvoice = self::orderByDesc("iInvoiceMasterId")->value('vInvoiceNumber');
        $number = Str::padLeft("1", 4, "0");
        #condition to check whether there is invoice number exist or not
        if ($lastInvoice) {
            $number = substr($lastInvoice, -1, 4);
            $number++;
            $number = Str::padLeft($number, 4, "0");
        }
        return $prefix . $number;
    }
}
