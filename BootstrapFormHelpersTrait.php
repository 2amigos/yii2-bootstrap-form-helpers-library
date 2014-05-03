<?php
/**
 * @copyright Copyright (c) 2013 2amigOS! Consulting Group LLC
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace dosamigos\formhelpers;

use yii\helpers\Html;

/**
 * dosamigos\formhelpers\BootstrapFormHelpersTrait
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\formhelpers
 */
trait BootstrapFormHelpersTrait
{
    /**
     * @var bool whether to use [[Select]] or not
     */
    public $selectBox = false;

    /**
     * Renders a dropdown list for the helper
     */
    protected function dropDownList()
    {
        if (!$this->selectBox) {
            return $this->hasModel()
                ? Html::activeDropDownList($this->model, $this->attribute, [], $this->options)
                : Html::dropDownList($this->name, $this->value, [], $this->options);
        } else {
            return Select::widget([
                'model' => $this->model,
                'attribute' => $this->attribute,
                'name' => $this->name,
                'value' => $this->value,
                'options' => $this->options,
            ]);
        }
    }
} 