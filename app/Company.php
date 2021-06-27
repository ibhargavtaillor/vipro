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
        "iIgst",
        "tiIsActive",
        "iUpdatedAt",
        "iCreatedAt",
        "iDeletedAt",
    ];

    /**
     * @return Object $company
     *
     * @description This function is used to get all company information
     */
    public static function info()
    {
        return self::where(['tiIsActive' => 1])->first();
    }
}
