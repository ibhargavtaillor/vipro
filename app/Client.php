<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = "client_master";

    protected $primaryKey = 'iClientMasterId';

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
        "iClientMasterId",
        "vClientName",
        "txAddress",
        "vGST",
        "tiIsActive",
        "iUpdatedAt",
        "iCreatedAt",
        "iDeletedAt ",
    ];

    /**
     * @param String $vGST Gst number
     *
     * Check GST number is already exist or not
     */
    public static function isGstAlreatExist($vGST)
    {
        $isExist = self::where(['vGST' => $vGST])->first();
        if (empty($isExist)) {
            return true;
        } else {
            return false;
        }
    }
}
