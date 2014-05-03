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
 * \dosamigos\formhelpers\TimeZonePicker renders a Bootstrap Form Helper Time Zone Picker plugin.
 *
 * @see http://bootstrapformhelpers.com/timezone/#jquery-plugins
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\formhelpers
 */
class TimeZonePicker extends InputWidget
{
    use BootstrapFormHelpersTrait;

    /**
     * @var string the language code to use (default is english, no need to be set). Available languages:
     *
     * - English (en_US)
     * - Simplified Chinese (zh_CN)
     */
    public $language;
    /**
     * @var string the two letter country code or ID of a bfh-countries HTML element. To filter based on a country.
     * It is required.
     */
    public $country;

    /**
     * @inheritdoc
     */
    public function init()
    {
        if (empty($this->country)) {
            throw new InvalidConfigException('"$country" cannot be empty.');
        }

        Html::addCssClass($this->options, 'bfh-timezones');

        $this->clientOptions['country'] = $this->country;

        parent::init();

        if (!isset($this->options['data-timezone'])) {
            $this->options['data-timezone'] = ArrayHelper::remove($this->options, 'data-value');
        }
        unset($this->options['data-name'], $this->options['data-value']);
    }

    /**
     * @inheritdoc
     */
    public function run()
    {

        echo $this->dropDownList();

        $bundle = $this->registerPlugin($this->selectBox ? 'bfhselectbox' : 'bfhtimezones');

        if($this->language) {
            $asset = "i18n/{$this->language}/bootstrap-formhelpers-timezones.{$this->language}.js";
            if(file_exists(\Yii::getAlias($bundle->sourcePath . "/" . $asset))) {
                $bundle->js[] = $asset;
            }
        }
    }
} 