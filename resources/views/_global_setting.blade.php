<form action="{{ route(Config::get('global_settings.routes.name_prefix', '') . ($global_setting->exists ? 'update' : 'create'), ['key' => ($global_setting->exists ? $global_setting->getAttribute('key') : null) ]) }}" class="d-flex flex-row mb-3 global_setting_form" method="{{ ($global_setting->exists ? 'put' : 'post') }}">
    @csrf
{{--    <input name="_method" type="hidden" value="post"/>--}}

    <div class="col-3 p-2">
        <div class="input-group">
            <div class="input-group-prepend d-none d-md-flex">
                <label class="input-group-text px-1 cursor_pointer rounded-end-0" for="{{ $global_setting->exists ? $global_setting->getAttribute('key') : 'NO_KEY' }}__global_setting_input__key">Unique Key<span class="text-danger">*</span></label>
            </div>
            <input autocapitalize="off" autocomplete="off" autocorrect="off" spellcheck="false" class="form-control textarea_code" id="{{ $global_setting->exists ? $global_setting->getAttribute('key') : 'NO_KEY' }}__global_setting_input__key" name="key" placeholder="[Specify Unique Key...]" value="{{ old('key') ? old('key') : $global_setting->getAttribute('key') }}"/>
        </div>
        <div class="form-text lh-1">
            The unique key of this Global Setting.
        </div>
    </div>

    <div class="col-3 p-2">
        <div class="input-group">
            <div class="input-group-prepend d-none d-md-flex">
                <label class="input-group-text px-1 cursor_pointer rounded-end-0" for="{{ $global_setting->exists ? $global_setting->getAttribute('key') : 'NO_KEY' }}__global_setting_input__type">Type<span class="text-danger">*</span></label>
            </div>
            <select class="form-control textarea_code" id="{{ $global_setting->exists ? $global_setting->getAttribute('key') : 'NO_KEY' }}__global_setting_input__type" name="type">
                <option value="">[Global Setting Type...]</option>
                <option value="array" {{ ( old('type') && old('type') == "array" ? 'selected' : ($global_setting->getAttribute('type') == "array" ? 'selected' : '') ) }}>Array</option>
                <option value="boolean" {{ ( old('type') && old('type') == "boolean" ? 'selected' : ($global_setting->getAttribute('type') == "boolean" ? 'selected' : '') ) }}>Boolean</option>
                <option value="float" {{ ( old('type') && old('type') == "float" ? 'selected' : ($global_setting->getAttribute('type') == "float" ? 'selected' : '') ) }}>Float</option>
                <option value="integer" {{ ( old('type') && old('type') == "integer" ? 'selected' : ($global_setting->getAttribute('type') == "integer" ? 'selected' : '') ) }}>Integer</option>
                <option value="json" {{ ( old('type') && old('type') == "json" ? 'selected' : ($global_setting->getAttribute('type') == "json" ? 'selected' : '') ) }}>JSON</option>
                <option value="string" {{ ( old('type') && old('type') == "string" ? 'selected' : ($global_setting->getAttribute('type') == "string" ? 'selected' : '') ) }}>String</option>
            </select>
        </div>
        <div class="form-text lh-1">
            The type that the Global Setting is stored as and will be casted to.
        </div>
    </div>

    <div class="col-3 p-2">
        <div class="input-group">
            <div class="input-group-prepend d-none d-md-flex">
                <label class="input-group-text px-1 cursor_pointer rounded-end-0" for="{{ $global_setting->exists ? $global_setting->getAttribute('key') : 'NO_KEY' }}__global_setting_input__value">Value<span class="text-danger">*</span></label>
            </div>

            @switch($global_setting->getAttribute('type'))
                @case("array")
                @case("json")
                    <textarea autocapitalize="off" autocomplete="off" autocorrect="off" spellcheck="false" class="form-control autosize textarea_code" id="{{ $global_setting->exists ? $global_setting->getAttribute('key') : 'NO_KEY' }}__global_setting_input__value" name="value" placeholder="[Specify Value...]" rows="2">{{ old('value') ? old('value') : $global_setting->getAttribute('value') }}</textarea>
                @break

                @case("boolean")
                    <select class="form-control" id="{{ $global_setting->exists ? $global_setting->getAttribute('key') : 'NO_KEY' }}__global_setting_input__value" name="value" required>
                        <option value="">[Specify Value...]</option>
                        <option value="true" {{ $global_setting->getAttribute('value') == "true" ? 'selected' : '' }}>True</option>
                        <option value="false" {{ $global_setting->getAttribute('value') == "false" ? 'selected' : '' }}>False</option>
                    </select>
                @break

                @default
                    <input autocapitalize="off" autocomplete="off" autocorrect="off" spellcheck="false" class="form-control font_family_monospace" id="{{ $global_setting->exists ? $global_setting->getAttribute('key') : 'NO_KEY' }}__global_setting_input__value" name="value" placeholder="[Specify Value...]" type="text" value="{{ old('value') ? old('value') : $global_setting->getAttribute('value') }}" disabled/>
                @break

                @case("string")
                    <input autocapitalize="off" autocomplete="off" autocorrect="off" spellcheck="false" class="form-control font_family_monospace" id="{{ $global_setting->exists ? $global_setting->getAttribute('key') : 'NO_KEY' }}__global_setting_input__value" name="value" placeholder="[Specify Value...]" type="text" value="{{ old('value') ? old('value') : $global_setting->getAttribute('value') }}"/>
                @break

                @case("float")
                    <input autocapitalize="off" autocomplete="off" autocorrect="off" spellcheck="false" class="form-control" id="{{ $global_setting->exists ? $global_setting->getAttribute('key') : 'NO_KEY' }}__global_setting_input__value" name="value" placeholder="[Specify Value...]" type="number" value="{{ old('value') ? old('value') : $global_setting->getAttribute('value') }}"/>
                @break

                @case("integer")
                    <input autocapitalize="off" autocomplete="off" autocorrect="off" spellcheck="false" class="form-control" id="{{ $global_setting->exists ? $global_setting->getAttribute('key') : 'NO_KEY' }}__global_setting_input__value" name="value" placeholder="[Specify Value...]" type="number" value="{{ old('value') ? old('value') : $global_setting->getAttribute('value') }}" step="1.0"/>
                @break
            @endswitch
        </div>
        <div class="form-text lh-1">
            The value of this Global Setting. After you specify the type, then you may specify the value.
        </div>
    </div>

{{--        <div class="col">--}}
{{--            <div class="input-group">--}}
{{--                <div class="input-group-prepend d-none d-md-flex">--}}
{{--                    <label class="input-group-text px-1 cursor_pointer" for="add_global_setting__description_input">Description<span class="text-warning">*</span></label>--}}
{{--                </div>--}}
{{--                <textarea autocapitalize="off" autocomplete="off" autocorrect="off" spellcheck="false" class="form-control autosize" id="add_global_setting__description_input" name="description" placeholder="[Specify Description...]" rows="2">{{ old('description') ? old('description') : $global_setting->getAttribute('description') }}</textarea>--}}
{{--            </div>--}}
{{--            <div class="form-text lh-1">--}}
{{--                The description of the Global Setting.--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="col">--}}
{{--            <div class="input-group">--}}
{{--                <div class="form-check form-switch mb-2 cursor_pointer">--}}
{{--                    <input class="form-check-input" type="checkbox" role="switch" id="add_global_setting__is_optional_input">--}}
{{--                    <label class="form-check-label" for="add_global_setting__is_optional_input">Optional</label>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="form-text lh-1">--}}
{{--                The Global Setting is optional.--}}
{{--            </div>--}}
{{--        </div>--}}

    <div class="col-3 p-2">
        <div class="input-group">
            <button class="btn btn-primary" type="submit">{{ $global_setting->exists ? 'Update' : 'Create' }} Global Setting</button>
            @if($global_setting->exists)
                <button class="btn btn-danger" type="button" data-event-action="remove_global_setting" data-key="{{ $global_setting->exists ? $global_setting->getAttribute('key') : '' }}">Remove</button>
            @endif
        </div>
    </div>

    {{--                    <div class="form-group row mb-0">--}}
    {{--                        <div class="col">--}}
    {{--                            <button type="submit">Add Global Setting</button>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}

</form>
