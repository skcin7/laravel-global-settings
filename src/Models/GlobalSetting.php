<?php

namespace Skcin7\LaravelGlobalSettings\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class GlobalSetting extends Model
{
    use HasFactory;

    /**
     * The database connection where the table is stored.
     * @return mixed
     */
    public static function databaseConnection()
    {
        return Config::get('global_settings.database.connection', null);
    }

    /**
     * The database table name used for storing the global settings.
     * @return string
     */
    public static function tableName(): string
    {
        return Config::get('global_settings.database.table_name', 'global_settings');
    }

    /**
     * The database column name used for storing the primary key in the global settings table.
     * @return string
     */
    public static function tableKeyColumn(): string
    {
        return Config::get('global_settings.database.key_column', 'key');
    }

    /**
     * The database column name used for storing the value of the global setting, in the global settings table.
     * @return string
     */
    public static function tableValueColumn(): string
    {
        return Config::get('global_settings.database.value_column', 'value');
    }

    /**
     * The database column name used for storing the type of the global setting attribute, in the global settings table.
     * @return string
     */
    public static function tableTypeColumn(): string
    {
        return Config::get('global_settings.database.type_column', 'type');
    }

    /**
     * Create a new GlobalSetting instance.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(self::tableName());

        $this->setKeyName(self::tableKeyColumn());

        $this->attributes = [
            self::tableKeyColumn() => '',
            self::tableValueColumn() => '',
            self::tableTypeColumn() => '',
        ];

        $this->casts = [
            self::tableKeyColumn() => 'string',
            self::tableValueColumn() => 'string',
            self::tableTypeColumn() => 'string',
        ];

        $this->fillable = [
            self::tableKeyColumn(),
            self::tableValueColumn(),
            self::tableTypeColumn(),
        ];
    }

    /**
     * Validation rules which all valid global settings must pass to be stored in the database.
     *
     * @param mixed $ignore_key = null
     * @return string[][]
     */
    public static function validationRules(mixed $ignore_key = null): array
    {
        return [
            self::tableKeyColumn() => [
                'required',
                'string',
                'min:1',
                'max:255',
//                'unique:' . self::databaseConnection() . '.' . self::tableName() . ',' . self::tableKeyColumn(),
                Rule::unique(self::databaseConnection() . '.' . self::tableName(), self::tableKeyColumn())->ignore($ignore_key, 'key'),
            ],
            self::tableValueColumn() => [
                'nullable',
                'string',
            ],
            self::tableTypeColumn() => [
                'required',
                'string',
                //'in:array,boolean,float,integer,json,string',
                Rule::in(['array', 'boolean', 'float', 'integer', 'json', 'string']),
            ],
        ];
    }

    // /**
    //  * The database table used by the model.
    //  * @var string
    //  */
    // public $table = 'global_settings';

    // /**
    //  * The primary key for the model.
    //  * @var string
    //  */
    // protected $primaryKey = 'key';

    /**
     * The "type" of the primary key ID.
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     * @var bool
     */
    public $incrementing = false;

    // /**
    //  * The model's default values for attributes.
    //  * @var array
    //  */
    // protected $attributes = [
    //     'key' => '',
    //     'value' => '',
    //     'type' => '',
    // ];

    // /**
    //  * The attributes that should be cast.
    //  * @var array
    //  */
    // protected $casts = [
    //     'key' => 'string',
    //     'value' => 'string',
    //     'type' => 'string',
    // ];

    // /**
    //  * The attributes that are mass assignable.
    //  * @var array
    //  */
    // protected $fillable = [
    //     'key',
    //     'value',
    //     'type',
    // ];

    /**
     * The attributes that should be hidden for serialization.
     * @var array
     */
    protected $hidden = [
        //
    ];

    /**
     * Not using Eloquent timestamps.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get all global settings.
     * @return Collection
     */
    public static function getGlobalSettings(): Collection
    {
        $global_settings = DB::table(self::tableName())
            ->orderBy(self::tableKeyColumn(), 'asc')
            ->get();

        return $global_settings;
    }

    /**
     * Get the value attribute.
     *
     * @return mixed
     */
    public function val(): mixed
    {
        $global_setting_value = $this->getAttribute('value');

        switch($this->getAttribute('type')) {
            case 'array':
                $global_setting_value = json_decode($global_setting_value, true);
                break;
            case 'boolean':
                $global_setting_value = (bool) filter_var($global_setting_value, FILTER_VALIDATE_BOOL);
                break;
            case 'float':
                $global_setting_value = (float) $global_setting_value;
                break;
            case 'integer':
                $global_setting_value = (int) $global_setting_value;
                break;
            case 'json':
                $global_setting_value = json_decode($global_setting_value);
                break;
            case 'string':
                $global_setting_value = (string) $global_setting_value;
                break;
        }

        return $global_setting_value;
    }

//    /**
//     * Get the value attribute.
//     *
//     * @return mixed
//     */
//    public function getValueAttribute(): mixed
//    {
//        $global_setting_value = $this->getAttribute('value');
//
//        switch($this->getAttribute('type')) {
//            case 'array':
//                $global_setting_value = json_decode($global_setting_value, true);
//                break;
//            case 'boolean':
//                $global_setting_value = (bool) filter_var($global_setting_value, FILTER_VALIDATE_BOOL);
//                break;
//            case 'float':
//                $global_setting_value = (float) $global_setting_value;
//                break;
//            case 'integer':
//                $global_setting_value = (int) $global_setting_value;
//                break;
//            case 'json':
//                $global_setting_value = json_decode($global_setting_value);
//                break;
//            case 'string':
//                $global_setting_value = (string) $global_setting_value;
//                break;
//        }
//
//        return $global_setting_value;
//    }

    // public static function getGlobalSetting(string $global_setting_key)
    // {
    //     $global_setting = GlobalSetting::query()->where('key', $global_setting_key)->firstOrFail();

    // }

    // public static function setGlobalSetting(string $global_setting_key, mixed $global_setting_value)
    // {
    //     $global_setting = GlobalSetting::query()->where('key', $global_setting_key)->firstOrFail();
    //     $global_setting->setAttribute($global_setting_key, (string)$global_setting_value);
    //     $global_setting->save();
    // }


}
