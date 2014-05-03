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
 * \dosamigos\formhelpers\FontSizePicker renders a Bootstrap Form Helper Font Size Picker plugin.
 *
 * @see http://bootstrapformhelpers.com/fontsize/#jquery-plugins
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\formhelpers
 */
class FontSizePicker extends InputWidget
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

        Html::addCssClass($this->options, 'bfh-fontsizes');

        parent::init();

        if (!isset($this->options['data-fontsize'])) {
            $this->options['data-fontsize'] = ArrayHelper::remove($this->options, 'data-value');
        }
        unset($this->options['data-name'], $this->options['data-value']);
    }

    /**
     * @inheritdoc
     */
    public function run()
    {

        echo $this->dropDownList();

        $bundle = $this->registerPlugin($this->selectBox ? 'bfhselectbox' : 'bfhfontsize');

        if($this->language) {
            $asset = "i18n/{$this->language}/bootstrap-formhelpers-fontsizes.{$this->language}.js";
            if(file_exists(\Yii::getAlias($bundle->sourcePath . "/" . $asset))) {
                $bundle->js[] = $asset;
            }
        }
    }
} 