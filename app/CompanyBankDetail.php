<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyBankDetail extends Model
{
    use SoftDeletes;

    protected $table = "company_bank_details";

    protected $primaryKey = 'iCompanyBankDetailId';

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
        "iCompanyBankDetailId",
        "iCompanyMasterId",
        "txBankInfo",
        "tiIsActive",
        "iUpdatedAt",
        "iCreatedAt",
        "iDeletedAt",
    ];

    /**
     * @return Object $banklist
     *
     * @description This function is used to get company bank information
     */
    public static function getAll()
    {
        return self::where(['tiIsActive' => "1"])->get();
    }
}
