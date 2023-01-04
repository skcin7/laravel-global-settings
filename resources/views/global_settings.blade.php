@extends('global_settings::layout')

@section('pageContent')
    <fieldset class="fieldset mb-5">
        <legend>New Global Setting</legend>
        @include('global_settings::_global_setting', ['global_setting' => $new_global_setting])
    </fieldset>

    <fieldset class="fieldset mb-5">
        <legend>Existing Global Settings</legend>

        @if($existing_global_settings->count() > 0)
            <ul class="list-unstyled mb-0" id="existing_global_settings_list">
                @foreach($existing_global_settings as $existing_global_setting)
                    <li>
                        @include('global_settings::_global_setting', ['global_setting' => $existing_global_setting])
                    </li>
                @endforeach
            </ul>
        @else
            <div class="alert alert-warning">No Existing Global Settings. Add one above.</div>
        @endif
    </fieldset>
@endsection

@section('pageScripts')
    <script type="text/javascript">
        // console.log('Global Settings Scripts...')

        $(document).on('change', 'select[name=type]', function(event) {
            event.preventDefault();

            let $type_input_element = $(this);
            let $value_input_element = $(this).closest('form').find('[name=value]');

            let type_value = String($(this).val());

            switch(type_value) {
                case '':
                default:
                    $(this).closest('form').find('[name=value]').replaceWith(
                        $("<input/>")
                            .addClass('form-control disabled')
                            .attr('autocapitalize', "off")
                            .attr('autocomplete', "off")
                            .attr('autocorrect', "off")
                            .attr('spellcheck', "false")
                            .attr('id', $value_input_element.attr('id'))
                            .attr('name', 'value')
                            .attr('placeholder', '[Specify Value...]')
                            .prop('disabled', true)
                    );
                    break;
                case 'array':
                case 'json':
                    $(this).closest('form').find('[name=value]').replaceWith(
                        $("<textarea/>")
                            .addClass('form-control')
                            .attr('autocapitalize', "off")
                            .attr('autocomplete', "off")
                            .attr('autocorrect', "off")
                            .attr('spellcheck', "false")
                            .attr('id', $value_input_element.attr('id'))
                            .attr('name', 'value')
                            .attr('placeholder', '[Specify Value...]')
                            .attr('rows', '2')
                    );
                    break;
                case 'boolean':
                    $(this).closest('form').find('[name=value]').replaceWith(
                        $("<select/>")
                            .addClass('form-control')
                            .attr('id', $value_input_element.attr('id'))
                            .attr('name', 'value')
                            .append(
                                $("<option/>")
                                    .attr('value', "")
                                    .text("[Specify Value...]")
                            )
                            .append(
                                $("<option/>")
                                    .attr('value', "true")
                                    .text("True")
                            )
                            .append(
                                $("<option/>")
                                    .attr('value', "false")
                                    .text("False")
                            )
                    );
                    break;
                case 'string':
                    $(this).closest('form').find('[name=value]').replaceWith(
                        $("<input/>")
                            .addClass('form-control')
                            .attr('autocapitalize', "off")
                            .attr('autocomplete', "off")
                            .attr('autocorrect', "off")
                            .attr('spellcheck', "false")
                            .attr('id', $value_input_element.attr('id'))
                            .attr('name', 'value')
                            .attr('placeholder', '[Specify Value...]')
                    );
                    break;
            }
        });


        $(document).on('submit', '.global_setting_form', async function(event) {
            event.preventDefault();
            console.log("Create or Update...");

            let $submitted_form_element = $(this);
            let key_value = String($submitted_form_element.find('[name=key]').val());
            let value_value = String($submitted_form_element.find('[name=value]').val());
            let type_value = String($submitted_form_element.find('[name=type]').val());

            // if(type_value == "boolean") {
            //     value_value = Boolean(value_value);
            // }


            await axios({
                "url": String($submitted_form_element.attr('action')),
                "method": "post",
                "data": {
                    "_method": String($submitted_form_element.attr('method')),
                    "_token": String($submitted_form_element.find('[name=_token]').val()),
                    "key": key_value,
                    "value": value_value,
                    "type": type_value,
                },
            })
                .then((response) => {
                    console.log(response);
                    console.log(response.data);
                    console.log(response.data.status_code);
                    console.log('Request Was Successful!');

                    let success_message = "Success!";
                    if(response.data.status_code == 201) {
                        success_message = "Created Global Setting!";
                        $submitted_form_element.find('[name=key]').val('');
                        $submitted_form_element.find('[name=type]').val('');
                        $submitted_form_element.find('[name=value]').val('');
                    }
                    else {
                        success_message = "Updated Global Setting!";
                    }

                    $.notify(success_message, {
                        "className": "success",
                    });
                })
                .catch((error) => {
                    console.log(error);
                    console.log(error.response);
                    console.log('Request Was Not Successful!');
                })
            ;
        });

        // $(document).on('change', 'input[name=key], select[name=type], [name=value]', function(event) {
        //     event.preventDefault();
        //     // console.log("Update...");
        //     $(this).closest('.global_setting_form').trigger('submit');
        // });

        $(document).on('click', '[data-event-action=remove_global_setting]', async function(event) {
            event.preventDefault();
            console.log("Remove...");

            let key = String($(this).attr('data-key'));
            if(confirm("Really remove this Global Setting? (Key: " + key + ")")) {

                let $submitted_form_element = $(this).closest('form');
                let key_value = String($submitted_form_element.find('[name=key]').val());
                let value_value = String($submitted_form_element.find('[name=value]').val());
                let type_value = String($submitted_form_element.find('[name=type]').val());


                await axios({
                    "url": String($submitted_form_element.attr('action')),
                    "method": "post",
                    "data": {
                        "_method": "delete",
                        "_token": String($submitted_form_element.find('[name=_token]').val()),
                        "key": key_value,
                        "value": value_value,
                        "type": type_value,
                    },
                })
                    .then((response) => {
                        console.log(response);
                        console.log(response.data);
                        console.log(response.data.status_code);
                        console.log('Request Was Successful!');

                        $(this).closest('li').fadeOut('fast', function() {
                            $(this).remove();
                        });

                    })
                    .catch((error) => {
                        console.log(error);
                        console.log(error.response);
                        console.log('Request Was Not Successful!');
                    })
                ;

            }
        });


        $.notify.defaults({
            "autoHide": true,
            "autoHideDelay": 5000,
            "className": 'success',
            "clickToHide": true,
            "elementPosition": 'right bottom',
            "globalPosition": 'right bottom',
            "position": 'left bottom',
            "showDuration": 200,
            "style": 'bootstrap',
        });


        $('.autosize').autosize();
    </script>
@endsection
