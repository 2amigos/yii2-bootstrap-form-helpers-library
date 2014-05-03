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
 * \dosamigos\formhelpers\TimePicker renders a Bootstrap Form Helper Time Picker plugin.
 *
 * @see http://bootstrapformhelpers.com/timepicker/#jquery-plugins
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\formhelpers
 */
class TimePicker extends InputWidget
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        Html::addCssClass($this->options, 'bfh-timepicker');
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        echo Html::tag('div', '', $this->options);
        $this->registerPlugin('bfhtimepicker');
    }
} 