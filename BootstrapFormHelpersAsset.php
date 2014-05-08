<?php
/**
 * @copyright Copyright (c) 2013 2amigOS! Consulting Group LLC
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace dosamigos\formhelpers;

use yii\web\AssetBundle;

/**
 * dosamigos\formhelpers\BootstrapFormHelpersAsset
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\formhelpers
 */
class BootstrapFormHelpersAsset extends AssetBundle
{
    public $sourcePath = '@vendor/2amigos/yii2-bootstrap-form-helpers-library/assets';

    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset'
    ];

    public function init()
    {
        $this->css[] = YII_DEBUG ? 'css/bootstrap-formhelpers.css' : 'css/bootstrap-formhelpers.min.css';
        $this->js[] = YII_DEBUG ? 'js/bootstrap-formhelpers.js' : 'js/bootstrap-formhelpers.min.js';
    }

} 
