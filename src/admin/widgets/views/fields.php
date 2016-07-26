<?php

use mirocow\eav\admin\assets\FbAsset;
use alien\jquery_i18next\assets\JqueryI18NextAsset;

/**
 * @var \yii\web\View $this
 * @var string $content
 */
$path = FbAsset::register($this);
JqueryI18NextAsset::register($this);
?>

    <div class="form-builder fb-main">
    </div>
<?php
$language = explode("-", Yii::$app->language);
$this->registerJsFile($path->baseUrl.'/locales/'.$language[0].'.js');

$js_form_builder = <<<JS
  $(function(){
  
    fb = new Formbuilder({
      uri: '$url',
      selector: '.fb-main',
      bootstrapData: '$bootstrapData',
    });
   
    fb.on('save', function(payload){
      $.ajax({
        url: '$urlSave',
        type: 'post',
        data: {
          categoryId: $categoryId, 
          entityModel: '$entityModel', 
          entityName: '$entityName', 
          payload: payload, _csrf: yii.getCsrfToken()
        },        
        dataType: 'json',
      }).success(function(response) {
      });
    });
  });
JS;

$this->registerJs($js_form_builder, yii\web\View::POS_READY, 'js_form_builder');

?>