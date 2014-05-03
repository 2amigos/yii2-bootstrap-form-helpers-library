<?php
/**
 * @copyright Copyright (c) 2013 2amigOS! Consulting Group LLC
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace dosamigos\formhelpers;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;

/**
 * \dosamigos\formhelpers\Widget is the base class for all Bootstrap Form Helpers.
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\formhelpers
 */
class InputWidget extends \yii\widgets\InputWidget
{
    /**
     * @var array the options for the Bootstrap FormHelper plugin.
     */
    public $clientOptions = [];
    /**
     * @var array the event handlers for the underlying Bootstrap FormHelper input JS plugin.
     */
    public $clientEvents = [];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $this->options = ArrayHelper::merge($this->asDataAttributes($this->clientOptions), $this->options);
        $this->clientOptions = false;

        if ($this->hasModel()) {
            $this->options['data-name'] = Html::getInputName($this->model, $this->attribute);
            $this->options['data-value'] = Html::getAttributeValue($this->model, $this->attribute);
        } else {
            $this->options['data-name'] = $this->name;
            $this->options['data-value'] = $this->value;
        }

    }

    /**
     * Converts client options to HTML5 data- attributes.
     * @param array $options the options to convert
     * @return array
     */
    protected function asDataAttributes($options)
    {
        $data = [];
        foreach ($options as $key => $value) {
            $data["data-$key"] = $value;
        }
        return $data;
    }

    /**
     * Registers a specific Bootstrap plugin and the related events
     * @param string $name the name of the Bootstrap plugin
     * @return BootstrapFormHelpersAsset
     */
    protected function registerPlugin($name)
    {
        $view = $this->getView();

        $bundle = BootstrapFormHelpersAsset::register($view);

        $id = $this->options['id'];

        if ($this->clientOptions !== false) {
            $options = empty($this->clientOptions) ? '' : Json::encode($this->clientOptions);
            $js = "jQuery('#$id').$name($options);";
            $view->registerJs($js);
        }

        if (!empty($this->clientEvents)) {
            $js = [];
            foreach ($this->clientEvents as $event => $handler) {
                $js[] = "jQuery('#$id').on('$event', $handler);";
            }
            $view->registerJs(implode("\n", $js));
        }

        return $bundle;
    }
} 