<?php
/**
 * @copyright Copyright (c) 2013 2amigOS! Consulting Group LLC
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace dosamigos\formhelpers;

use yii\helpers\Html;

/**
 * \dosamigos\formhelpers\DatePicker renders a Bootstrap Form Helper Date Picker plugin.
 *
 * @see http://bootstrapformhelpers.com/datepicker/#jquery-plugins
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\formhelpers
 */
class DatePicker extends InputWidget
{
    /**
     * @var string the language code to use (default is english, no need to be set). Available languages:
     *
     * - English (en_US)
     * - Spanish (es_ES)
     * - Spanish (es_US)
     */
    public $language;

    /**
     * @inheritdoc
     */
    public function init()
    {
        Html::addCssClass($this->options, 'bfh-datepicker');
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        echo Html::tag('div', '', $this->options);
        $bundle = $this->registerPlugin('bfhdatepicker');

        if($this->language) {
            $asset = "i18n/{$this->language}/bootstrap-formhelpers-datepicker.{$this->language}.js";
            if(file_exists(\Yii::getAlias($bundle->sourcePath . "/" . $asset))) {
                $bundle->js[] = $asset;
            }
        }
    }
} 