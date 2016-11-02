<?php
/**
 * @author Alexey Samoylov <alexey.samoylov@gmail.com>
 */

namespace alien\eav\widgets;

use Yii;

class EncodedTextInput extends TextInput
{
    const VALUE_HANDLER_CLASS = '\alien\eav\handlers\ArrayValueHandler';

    static $order = 3;

    static $fieldView = <<<TEMPLATE
    <textarea 
      class='form-control input-sm' type='text' 
      rows=<%= rf.get(Formbuilder.options.mappings.AREA_ROWS) %>
      cols=<%= rf.get(Formbuilder.options.mappings.AREA_COLS) %> 
      <% if ( rf.get(Formbuilder.options.mappings.LOCKED) ) { %>disabled readonly<% } %> 
    />
    </textarea>    
TEMPLATE;

    static $fieldSettings = <<<TEMPLATE
    <%= Formbuilder.templates['edit/field_options']() %>
    <%= Formbuilder.templates['edit/text_area']() %>    
TEMPLATE;

    /*static $fieldButton = <<<TEMPLATE
    <span class='symbol'><span class='fa fa-paragraph'></span></span> Json textarea    
TEMPLATE;*/
    
    public static function fieldButton()
    {return '<span class=\'symbol\'><span class=\'fa fa-paragraph\'></span></span> '.Yii::t('eav','Json textarea');
    }

    static $defaultAttributes = <<<TEMPLATE
    function (attrs) {
                attrs.field_options.size = 'small';
                return attrs;
            }   
TEMPLATE;


    public function init()
    {
        parent::init();
    }
}