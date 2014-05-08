<?php
/**
 * @copyright Copyright (c) 2013 2amigOS! Consulting Group LLC
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace dosamigos\formhelpers;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * \dosamigos\formhelpers\CountryPicker renders a Bootstrap Form Helper Country Picker plugin.
 *
 * @see http://bootstrapformhelpers.com/country/#jquery-plugins
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\formhelpers
 */
class CountryPicker extends InputWidget
{
    use BootstrapFormHelpersTrait;

    /**
     * @var string the language code to use (default is english, no need to be set). Available languages:
     *
     * - Arabic (ar)
     * - English (en_US)
     * - Spanish (es_ES)
     * - German (de_DE)
     * - Italian (it_IT)
     * - Portuguese (pt_BR)
     * - Simplified Chinese (zh_CN)
     * - Simplified Chinese (zh_TW)
     * - Russian (ru_RU)
     */
    public $language;
    /**
     * @var bool whether to display the value as read only or not
     */
    public $readOnly = false;

    /**
     * @inheritdoc
     */
    public function init()
    {
        Html::addCssClass($this->options, 'bfh-countries');
        if (ArrayHelper::getValue($this->clientOptions, 'flags') && !$this->selectBox) {
            $this->selectBox = true;
        }
        parent::init();
        if (!isset($this->options['data-country'])) {
            $this->options['data-country'] = ArrayHelper::remove($this->options, 'data-value');
        }
        unset($this->options['data-name'], $this->options['data-value']);
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        if (!$this->readOnly) {
            echo $this->dropDownList();
        } else {
            echo Html::tag('span', '', $this->options);
        }


        $bundle = $this->registerPlugin($this->selectBox ? 'bfhselectbox' : 'bfhcountries');

        if($this->language) {
            $asset = "i18n/{$this->language}/bootstrap-formhelpers-countries.{$this->language}.js";
            if(file_exists(\Yii::getAlias($bundle->sourcePath . "/" . $asset))) {
                $bundle->js[] = $asset;
            }
        }
    }
} 