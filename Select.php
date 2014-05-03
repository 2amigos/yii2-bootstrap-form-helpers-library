<?php
/**
 * @copyright Copyright (c) 2013 2amigOS! Consulting Group LLC
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace dosamigos\formhelpers;

use yii\helpers\Html;

/**
 * \dosamigos\formhelpers\Select renders the Select Bootstrap Form helper.
 *
 * @see http://bootstrapformhelpers.com/select/#jquery-plugins
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\formhelpers
 */
class Select extends InputWidget
{
    /**
     * @var array the array keys are option values, and the array values
     * are the corresponding option labels.
     */
    public $items = [];

    /**
     * @inheritdoc
     */
    public function init()
    {
        Html::addCssClass($this->options, 'bfh-selectbox');
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $input[] = Html::beginTag('div', $this->options);
        foreach ($this->items as $key => $value) {
            $input[] = Html::tag('div', (string)$value, ['data-value' => (string)$key]);
        }
        $input[] = Html::endTag('div');

        echo implode("\n", $input);

        $this->registerPlugin('bfhselectbox');
    }
} 