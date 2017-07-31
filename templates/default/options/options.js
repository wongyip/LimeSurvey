
var prepare = function(){
    var deferred = $.Deferred();
    //activate the bootstrap switch for checkboxes
    $('.action_activate_bootstrapswitch').bootstrapSwitch();
    //get option Object from Template configuration options
    var optionObject = {}
    if($('#TemplateConfiguration_options').length>0){
        try{
            optionObject = JSON.parse($('#TemplateConfiguration_options').val());
        } catch(e){ console.error('No valid option field!'); }
    }
    //check if a form exists to parse the simple option
    if($('.action_update_options_string_form').length > 0){
        //Update values in the form to the template options
        $('.action_update_options_string_form').find('.selector_option_value_field').each(function(i,item){
            
            var itemValue = optionObject[$(item).attr('name')];
            $(item).val(itemValue);
                
        });
        $('.action_update_options_string_form').find('.selector_option_radio_field').each(function(i,item){
            var itemValue = optionObject[$(item).attr('name')];
            //if it is a radio selector, check it and propagate the change to bootstrapSwitch
            console.log($(item).val());
            console.log(itemValue);

            if($(item).val() == itemValue){
                $(item).prop('checked', true).trigger('change');
                $(item).closest('label').addClass('active');
            }
        });

        //if the save button is clicked write everything into the template option field and send the form
        $('.action_update_options_string_button').on('click', function(evt){
            evt.preventDefault();
            var newOptionObject = {};
            //get all values
            $('.action_update_options_string_form').find('.selector_option_value_field').each(function(i,item){
                newOptionObject[$(item).attr('name')] = $(item).val();              
            });
            $('.action_update_options_string_form').find('.selector_option_radio_field').each(function(i,item){
                if($(item).prop('checked'))
                    newOptionObject[$(item).attr('name')] = $(item).val();              
            });
            //now write the newly created object to the correspondent field as a json string
            $('#TemplateConfiguration_options').val(JSON.stringify(newOptionObject));
            //and submit the form
            $('#template-options-form').find('button[type=submit]').trigger('click');
        });

        //hotswapping the fields
        $('.action_update_options_string_form').find('.selector_option_value_field').on('change', function(evt){
            optionObject[$(this).attr('name')] = $(this).val(); 
            if($(this).attr('type') == 'radio'){
                optionObject[$(this).attr('name')] = $(this).prop('checked') ? 'on' : 'off';
            }
            $('#TemplateConfiguration_options').val(JSON.stringify(optionObject));
        });
        //hotswapping the radio fields
        $('.action_update_options_string_form').find('.selector_option_radio_field').on('change', function(evt){
            $(this).prop('checked',true);
            optionObject[$(this).attr('name')] = $(this).val(); 
            $('#TemplateConfiguration_options').val(JSON.stringify(optionObject));
        });

        //Bootstrap theming?
        if($('#simple_edit_cssframework').length>0){
            var currentThemeObject = {};
            try{
                currentThemeObject = JSON.parse($('#TemplateConfiguration_cssframework_css').val());
            } catch(e){ console.error('No valid css framework theme field!'); }
            currentThemeObject.replace = currentThemeObject.replace || [['css/bootstrap.css','']];

            $('#simple_edit_cssframework').val(currentThemeObject.replace[0][1]);

            $('#simple_edit_cssframework').on('change', function(evt){
                //{"replace": [["css/bootstrap.css","css/flatly.css"]]}
                currentThemeObject.replace = currentThemeObject.replace || [[]];
                currentThemeObject.replace[0][1] = $('#simple_edit_cssframework').val();

                $('#TemplateConfiguration_cssframework_css').val(JSON.stringify(currentThemeObject));
            })
        }   
    }
    setTimeout(function(){deferred.resolve()},650);

    return deferred.promise();
};
$(document).on('ready pjax:complete',function(){
    $('.simple-template-edit-loading').css('display','block');
    prepare().then(function(){
        $('.simple-template-edit-loading').remove();
    })
});