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
 * \dosamigos\formhelpers\GoogleFontPicker renders a Bootstrap Form Helper Google Font Picker plugin.
 *
 * @see http://bootstrapformhelpers.com/googlefont/#jquery-plugins
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\formhelpers
 */
class GoogleFontPicker extends InputWidget
{
    use BootstrapFormHelpersTrait;

    /**
     * @inheritdoc
     */
    public function init()
    {

        Html::addCssClass($this->options, 'bfh-googlefonts');

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

        $this->registerPlugin($this->selectBox ? 'bfhselectbox' : 'bfhgooglefonts');
    }
} 