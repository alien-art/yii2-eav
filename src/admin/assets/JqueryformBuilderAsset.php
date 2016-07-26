<?php
namespace mirocow\eav\admin\assets;

use yii\web\AssetBundle;

/**
 * 18 July 2016
 *
 * @author Alien-art <alien@alien-art.ru>
 * Class Asset
 * @package alien\jquery_i18next\assets\JqueryI18NextAsset
 */
class JqueryformBuilderAsset extends AssetBundle
{
    public $baseUrl = '@web';
    public $sourcePath = '@mirocow/eav/admin/assets/formbuilder';
    public $css = [
        'css/form-builder.min.css'];
    public $js = [
        'js/form-builder.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset',
		'yii\jui\JuiAsset'
    ];
}