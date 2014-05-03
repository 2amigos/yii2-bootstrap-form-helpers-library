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
 * \dosamigos\formhelpers\PhoneInput renders a Bootstrap Form Helper Phone Input plugin.
 *
 * @see http://bootstrapformhelpers.com/phone/#jquery-plugins
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\formhelpers
 */
class PhoneInput extends InputWidget
{
    /**
     * @var bool whether to display the value as read only or not
     */
    public $readOnly = false;

    /**
     * @inheritdoc
     */
    public function init()
    {
        Html::addCssClass($this->options, 'bfh-phone');
        parent::init();

        if (!isset($this->options['data-number'])) {
            $this->options['data-number'] = ArrayHelper::remove($this->options, 'data-value');
        }
        unset($this->options['data-name'], $this->options['data-value']);
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        if (!$this->readOnly) {
            echo $this->hasModel()
                ? Html::activeTextInput($this->model, $this->attribute, $this->options)
                : Html::textInput($this->name, $this->value, $this->options);
        } else {
            echo Html::tag('span', '', $this->options);
        }

        $this->registerPlugin('bfhphone');
    }
} 