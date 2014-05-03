<?php
/**
 * @copyright Copyright (c) 2013 2amigOS! Consulting Group LLC
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace dosamigos\formhelpers;

use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * \dosamigos\formhelpers\FontPicker renders a Bootstrap Form Helper Font Picker plugin.
 *
 * @see http://bootstrapformhelpers.com/font/#jquery-plugins
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\formhelpers
 */
class FontPicker extends InputWidget
{
    use BootstrapFormHelpersTrait;

    /**
     * @var string the language code to use (default is english, no need to be set). Available languages:
     *
     * - English (en_US)
     */
    public $language;

    /**
     * @inheritdoc
     */
    public function init()
    {

        Html::addCssClass($this->options, 'bfh-fonts');

        parent::init();

        if (!isset($this->options['data-font'])) {
            $this->options['data-font'] = ArrayHelper::remove($this->options, 'data-value');
        }
        unset($this->options['data-name'], $this->options['data-value']);
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        echo $this->dropDownList();

        $bundle = $this->registerPlugin($this->selectBox ? 'bfhselectbox' : 'bfhfonts');

        if($this->language) {
            $asset = "i18n/{$this->language}/bootstrap-formhelpers-fonts.{$this->language}.js";
            if(file_exists(\Yii::getAlias($bundle->sourcePath . "/" . $asset))) {
                $bundle->js[] = $asset;
            }
        }
    }
} 