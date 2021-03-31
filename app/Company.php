<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = "company_master";

    protected $primaryKey = 'iCompanyMasterId';

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
        "iCompanyMasterId",
        "iAdminId",
        "vCompanyName",
        "txAddress",
        "vCompanyGstNumber",
        "iSgst",
        "iCgst",
        "tiIsActive",
        "iUpdatedAt",
        "iCreatedAt",
        "iDeletedAt ",
    ];
}
