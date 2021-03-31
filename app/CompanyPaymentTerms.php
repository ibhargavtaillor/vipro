<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyPaymentTerms extends Model
{
    use SoftDeletes;

    protected $table = "company_payment_terms";

    protected $primaryKey = 'iCompanyTermId';

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
        "iCompanyTermId",
        "iCompanyMasterId",
        "vTitle",
        "tiIsActive",
        "iUpdatedAt",
        "iCreatedAt",
        "iDeletedAt ",
    ];
}
