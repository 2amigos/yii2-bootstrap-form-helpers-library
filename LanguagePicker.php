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
 * \dosamigos\formhelpers\LanguagePicker renders a Bootstrap Form Helper Language Picker plugin.
 *
 * @see http://bootstrapformhelpers.com/language/#jquery-plugins
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\formhelpers
 */
class LanguagePicker extends InputWidget
{
    use BootstrapFormHelpersTrait;

    /**
     * @var string the language code to use (default is english, no need to be set). Available languages:
     *
     * - English (en_US)
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

        Html::addCssClass($this->options, 'bfh-languages');

        parent::init();

        if (!isset($this->options['data-language'])) {
            $this->options['data-language'] = ArrayHelper::remove($this->options, 'data-value');
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

        $bundle = $this->registerPlugin($this->selectBox ? 'bfhselectbox' : 'bfhlanguages');

        if($this->language) {
            $asset = "i18n/{$this->language}/bootstrap-formhelpers-languages.{$this->language}.js";
            if(file_exists(\Yii::getAlias($bundle->sourcePath . "/" . $asset))) {
                $bundle->js[] = $asset;
            }
        }
    }
} 