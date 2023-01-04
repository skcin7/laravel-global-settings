<?php

namespace Skcin7\LaravelGlobalSettings;

use Illuminate\Database\Eloquent\Collection;
use Skcin7\LaravelGlobalSettings\Models\GlobalSetting as GlobalSettingModel;
use Symfony\Component\Finder\Glob;
use Illuminate\Support\Facades\DB;

class LaravelGlobalSettingsManager
{
//    /**
//     * All settings loaded about the Linktree are stored here.
//     * @var array
//     */
//    private $global_settings = [];
//
//    /**
//     * Create a new LaravelGlobalSettingsManager instance.
//     */
//    public function __construct()
//    {
//        foreach(GlobalSetting::all() as $global_setting) {
//            $value = $global_setting->getAttribute('value');
//
//            switch(strtolower($global_setting->getAttribute('type'))) {
//                case 'array':
////                    $value = (array)$value;
//                    $value = json_decode((string)$value, true);
//                    break;
//                case 'boolean':
//                    $value = (bool)filter_var($value, FILTER_VALIDATE_BOOL);
//                    break;
//                case 'float':
//                    $value = (float)$value;
//                    break;
//                case 'integer':
//                    $value = (int)$value;
//                    break;
//                case 'json':
//                    $value = json_decode($value, true);
//                    break;
//                case 'string':
//                    $value = (string)$value;
//                    break;
//            }
//
//            $this->global_settings[$global_setting->getAttribute('key')] = $value;
//        }
//    }

//    /**
//     * @param $format
//     * @return array|false|string
//     */
//    public function all($format = "array")
//    {
//        if($format == "json") {
//            return json_encode($this->global_settings);
//        }
//        else if($format == "json_pretty") {
//            return json_encode($this->global_settings, JSON_PRETTY_PRINT);
//        }
//        return $this->global_settings;
//    }

    /**
     * The collection of all the GlobalSetting instances is stored here.
     *
     * @var Collection
     */
    private $global_settings;

    /**
     * Create a new LaravelGlobalSettingsManager instance.
     */
    public function __construct()
    {
        $this->global_settings = GlobalSettingModel::all();

//        $this->global_settings = new Collection();
//
//        foreach(DB::table(GlobalSetting::tableName())->get() as $this_existing_global_setting) {
////            echo $user->name;
//            $existing_global_setting = new GlobalSetting();
//            $existing_global_setting->setAttribute('id', $this_existing_global_setting->id);
//            $existing_global_setting->setAttribute('key', $this_existing_global_setting->key);
//            $existing_global_setting->setAttribute('value', $this_existing_global_setting->value);
//            $existing_global_setting->setAttribute('type', $this_existing_global_setting->type);
//
//            $this->global_settings->push($existing_global_setting);
//        }

//        foreach(GlobalSetting::all() as $global_setting) {
//            $this->global_settings[$global_setting->getAttribute('key')] = $global_setting;
//        }

//        $this->global_settings = GlobalSetting::all();

//        foreach(GlobalSetting::all() as $global_setting) {
//            $value = $global_setting->getAttribute('value');
//
//            switch(strtolower($global_setting->getAttribute('type'))) {
//                case 'array':
////                    $value = (array)$value;
//                    $value = json_decode((string)$value, true);
//                    break;
//                case 'boolean':
//                    $value = (bool)filter_var($value, FILTER_VALIDATE_BOOL);
//                    break;
//                case 'float':
//                    $value = (float)$value;
//                    break;
//                case 'integer':
//                    $value = (int)$value;
//                    break;
//                case 'json':
//                    $value = json_decode($value, true);
//                    break;
//                case 'string':
//                    $value = (string)$value;
//                    break;
//            }
//
//            $this->global_settings[$global_setting->getAttribute('key')] = $value;
//        }
    }

    /**
     * The name of the package.
     */
    const PACKAGE_INFO__NAME = "Laravel Global Settings";

    /**
     * The version of the package.
     */
    const PACKAGE_INFO__VERSION = "1.0.0-beta";

    /**
     * The author of the package.
     */
    const PACKAGE_INFO__AUTHOR = "Nick Morgan";

    /**
     * The contact info to reach the author of the package.
     */
    const PACKAGE_INFO__CONTACT = "nick@nicholas-morgan.com";

    /**
     * The date that the package was last updated.
     */
    const PACKAGE_INFO__DATE = "January 2023";

    /**
     * Get information about the LaravelGlobalSettingsManager package.
     * @return string[]
     */
    public function info(): array
    {
        return [
            'Name' => self::PACKAGE_INFO__NAME,
            'Version' => self::PACKAGE_INFO__VERSION,
            'Author' => self::PACKAGE_INFO__AUTHOR,
            'Contact' => self::PACKAGE_INFO__CONTACT,
            'Date' => self::PACKAGE_INFO__DATE,
        ];
    }

    public function about(): string
    {
        return self::PACKAGE_INFO__NAME . " (v" . self::PACKAGE_INFO__VERSION . ")" . " | Made By: " . self::PACKAGE_INFO__AUTHOR . " <" . self::PACKAGE_INFO__CONTACT . "> | Date: " . self::PACKAGE_INFO__DATE;
    }

    /**
     * Count the number of GlobalSetting instances exist in this implementation of the package.
     *
     * @return int
     */
    public function count(): int
    {
        return count($this->global_settings);
    }

    /**
     * Get all existing GlobalSetting instances.
     *
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->global_settings;
    }

    /**
     * Create a brand new GlobalSetting instance.
     *
     * @param string $key = ""
     * @param string $value = ""
     * @param string $type = ""
     * @return GlobalSettingModel
     */
    public function create(string $key = "", string $value = "", string $type = ""): GlobalSettingModel
    {
        $new_global_setting = new GlobalSettingModel();
        $new_global_setting->setAttribute("key", $key);
        $new_global_setting->setAttribute("value", $value);
        $new_global_setting->setAttribute("type", $type);
        return $new_global_setting;
    }

    /**
     * Determine if a GlobalSettings instance exists with the specified key(s).
     *
     * @param mixed ...$keys
     * @return bool
     */
    public function has(mixed ...$keys): bool
    {
        if(func_num_args() == 0) {
            return false;
        }

        $all_keys_exist = true;

        foreach($keys as $key) {
            if(is_string($key)) {

                if(! DB::connection(GlobalSettingModel::databaseConnection())
                    ->table(GlobalSettingModel::tableName())
                    ->where('key', $key)
                    ->exists()) {
                    $all_keys_exist = false;
                }

            }
            else if(is_array($key)) {
                foreach($key as $current_key) {
                    if(is_string($current_key)) {

                        if(! DB::connection(GlobalSettingModel::databaseConnection())
                            ->table(GlobalSettingModel::tableName())
                            ->where('key', $current_key)
                            ->exists()) {
                            $all_keys_exist = false;
                        }

                    }
                }
            }
        }

        return $all_keys_exist;
    }


    /**
     * Get the matched GlobalSetting instance that matches the specified key.
     * @param string $key
     * @return mixed
     */
    public function get(string $key = ""): mixed
    {
        if(is_string($key) && strlen($key) > 0) {
            $first_matched_global_setting = $this->global_settings->firstWhere('key', $key);
            if($first_matched_global_setting instanceof GlobalSettingModel) {
                return $first_matched_global_setting;
            }
        }

        return null;
    }


//    public function set(string $key, mixed $value)
//    {
//        $this->global_settings[$key] = (string)$value;
//    }

//    public function save()
//    {
//        foreach($this->global_settings as $key => $global_setting) {
//            DB::connection(GlobalSettingModel::databaseConnection())
//                ->table(GlobalSettingModel::tableName())
//                ->updateOrInsert(
//                    [GlobalSettingModel::tableKeyColumn() => $key],
//                    [
//                        GlobalSettingModel::tableKeyColumn() => $global_setting['key'],
//                        GlobalSettingModel::tableValueColumn() => $global_setting['value'],
//                        GlobalSettingModel::tableTypeColumn() => $global_setting['type'],
//                    ]
//                );
//        }
//    }



}
