<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyConditions extends Model
{
    use SoftDeletes;

    protected $table = "company_conditions";

    protected $primaryKey = 'iCompanyContidionId';

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
        "iCompanyContidionId",
        "iCompanyMasterId",
        "txCondition",
        "tiIsActive",
        "iUpdatedAt",
        "iCreatedAt",
        "iDeletedAt",
    ];
}
