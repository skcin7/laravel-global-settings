<?php

namespace Skcin7\LaravelGlobalSettings\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Skcin7\LaravelGlobalSettings\Models\GlobalSetting as GlobalSettingModel;
use Skcin7\LaravelGlobalSettings\LaravelGlobalSettingsManager as GlobalSettingFacade;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;

class LaravelGlobalSettingsController extends Controller
{
    /**
     * Show the GlobalSettings package administration page.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $facade_instance = (new GlobalSettingFacade());

//        $new_global_setting = new GlobalSettingModel();
        $new_global_setting = $facade_instance->create();
        $existing_global_settings = $facade_instance->all();

        return view('global_settings::global_settings', [
            'new_global_setting' => $new_global_setting,
            'existing_global_settings' => $existing_global_settings,
        ]);
    }

    /**
     * Show the GlobalSettings package about page.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function about(Request $request)
    {
        return view('global_settings::about', [
            //
        ]);
    }

    /**
     * Show the GlobalSettings package info.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function info(Request $request)
    {
        return $this->respondWithJson(
            (new GlobalSettingFacade())->all(),
            "Laravel Global Settings - Package Instance Information",
            200
        );
    }

    /**
     * Redirect to the Git public repository page for the package.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function github(Request $request): RedirectResponse
    {
        return Redirect::to('https://github.com/skcin7/laravel-global-settings');
    }

    /**
     * Create or update a GlobalSetting from the data in the HTTP request.
     *
     * @param GlobalSettingModel $global_setting
     * @param string $key
     * @param string $value
     * @param string $type
     * @return GlobalSettingModel
     */
    private function createOrUpdateGlobalSetting(GlobalSettingModel $global_setting, string $key, string $value, string $type): GlobalSettingModel
    {
        $global_setting->setAttribute(GlobalSettingModel::tableKeyColumn(), $key);
        $global_setting->setAttribute(GlobalSettingModel::tableValueColumn(), $value);
        $global_setting->setAttribute(GlobalSettingModel::tableTypeColumn(), $type);
        $global_setting->save();

        return $global_setting;
    }

    /**
     * Create a new GlobalSetting instance.
     *
     * @param Request $request
     * @return JsonResponse|RedirectResponse
     */
    public function create(Request $request)
    {
        $request->validate(GlobalSettingModel::validationRules());

        $new_global_setting_instance = new GlobalSettingModel();
//        $new_global_setting_instance = $this->createOrUpdateFromRequest($request, $new_global_setting_instance);
        $new_global_setting_instance = $this->createOrUpdateGlobalSetting($new_global_setting_instance, $request->input('key'), $request->input('value'), $request->input('type'));

        $success_message = 'The Global Setting has been successfully created!';

        if($request->expectsJson()) {
            return $this->respondWithJson($new_global_setting_instance, $success_message, 201);
        }

        return redirect()->route(Config('global_settings.routes.name_prefix') . 'index')
            ->with('flash_message', [
                'message' => $success_message,
                'type' => 'success',
            ]);
    }

    /**
     * Get an existing GlobalSetting instance by its unique key, or gracefully fail if none can be found.
     *
     * @param string $key
     * @return mixed
     */
    private function getExistingGlobalSettingByKeyOrFail(string $key)
    {
        $existing_global_setting_instance = GlobalSettingModel::where(GlobalSettingModel::tableKeyColumn(), $key)->first();
        if(! $existing_global_setting_instance) {
            abort(404, 'Existing Global Setting Not Found With That Key (Key: ' . $key . ')');
        }
        return $existing_global_setting_instance;
    }

    /**
     * Update an existing GlobalSetting instance.
     *
     * @param Request $request
     * @param string $key
     * @return JsonResponse|RedirectResponse
     */
    public function update(Request $request, string $key)
    {
        $request->validate(GlobalSettingModel::validationRules($key));

//        $existing_global_setting_instance = GlobalSettingModel::where(GlobalSettingModel::tableKeyColumn(), $key)->firstOrFail();
        $existing_global_setting_instance = $this->getExistingGlobalSettingByKeyOrFail($key);
//        $existing_global_setting_instance = $this->createOrUpdateFromRequest($request, $existing_global_setting_instance);
        $new_global_setting_instance = $this->createOrUpdateGlobalSetting($existing_global_setting_instance, $request->input('key'), $request->input('value'), $request->input('type'));

        $success_message = 'The Global Setting has been successfully updated!';

        if($request->expectsJson()) {
            return $this->respondWithJson($existing_global_setting_instance, $success_message, 200);
        }

        return redirect()->route(Config('global_settings.routes.name_prefix') . 'index')
            ->with('flash_message', [
                'message' => $success_message,
                'type' => 'success',
            ]);
    }

    /**
     * Delete an existing GlobalSetting instance.
     *
     * @param Request $request
     * @param string $key
     * @return JsonResponse|RedirectResponse
     */
    public function delete(Request $request, string $key)
    {
//        $existing_global_setting_instance = GlobalSettingModel::where(GlobalSettingModel::tableKeyColumn(), $key)->firstOrFail();
        $existing_global_setting_instance = $this->getExistingGlobalSettingByKeyOrFail($key);
        $existing_global_setting_instance->delete();

        $success_message = 'The Global Setting has been successfully deleted!';

        if($request->expectsJson()) {
            return $this->respondWithJson($existing_global_setting_instance, $success_message, 200);
        }

        return redirect()->route(Config('global_settings.routes.name_prefix') . 'index')
            ->with('flash_message', [
                'message' => $success_message,
                'type' => 'success',
            ]);

//        return redirect()->route(Config('global_settings.routes.name_prefix') . 'index')
//            ->with('flash_message', [
//                'message' => 'The global setting <strong>' . $existing_global_setting_instance->getAttribute('key') . '</strong> has been successfully deleted!',
//                'type' => 'success',
//            ]);
    }


}
