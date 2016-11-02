<?php
/**
 * @author Alexey Samoylov <alexey.samoylov@gmail.com>
 */

namespace alien\eav\widgets;

use Yii;
use alien\eav\handlers\AttributeHandler;

class Textarea extends AttributeHandler
{
    static $order = 1;

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
    <span class='symbol'><span class='fa fa-paragraph'></span></span> Input textarea    
TEMPLATE;*/

    public static function fieldButton()
    {return '<span class=\'symbol\'><span class=\'fa fa-paragraph\'></span></span> '.Yii::t('eav','Input textarea');
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

        //$this->owner->addRule($this->getAttributeName(), 'string', ['max' => 255]);
    }

    public function run()
    {
        return $this->owner->activeForm->field(
            $this->owner, 
            $this->getAttributeName(), 
            ['template' => "{input}\n{hint}\n{error}"])
            ->textArea();
    }
}