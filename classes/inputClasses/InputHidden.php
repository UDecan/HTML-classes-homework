<?php


namespace App\classes;


use App\classes\interfaces\ViewInterface;

class InputHidden extends Input implements ViewInterface
{
    public  const TAG_NAME = 'InputHidden';

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $value;

    /**
     * Input constructor.
     * @param string $accept
     * @param string $accesskey
     * @param string $align
     * @param string $alt
     * @param string $autocomplete
     * @param bool $autofocus
     * @param int $border
     * @param bool $checked
     * @param bool $disabled
     * @param string $form
     * @param string $formaction
     * @param string $formenctype
     * @param string $formmethod
     * @param bool $formnovalidate
     * @param string $formtarget
     * @param string $list
     * @param int $max
     * @param int $maxlength
     * @param int $min
     * @param bool $multiple
     * @param string $name
     * @param string $pattern
     * @param string $placeholder
     * @param bool $readonly
     * @param bool $required
     * @param int $size
     * @param string $src
     * @param double $step
     * @param int $tabindex
     * @param string $type
     * @param string $value
     */
    public function __construct(string $accept = null, string $accesskey = null, string $align = 'bottom', string $alt = null, string $autocomplete = null,
                                bool $autofocus = null, int $border = 0, bool $checked = null, bool $disabled = null, string $form = null,
                                string $formaction = null, string $formenctype = 'application/x-www-form-urlencoded', string $formmethod = null, bool $formnovalidate = null,
                                string $formtarget = null, string $list = null, int $max = null, int $maxlength = (int)true, int $min = null, bool $multiple = null,
                                string $name = null, string $pattern = null, string $placeholder = null, bool $readonly = null, bool $required = null,
                                int $size = 20, string $src = null, float $step = 1, int $tabindex = null, string $type = 'text', string $value = null)
    {
        $this->type = $type;
        $this->value = $value;
    }


    /**
     * @param string $inner
     * @return string
     */
    public function getView(string $inner = ''): string //31
    {
        $getParam = new getParamForGetView();

        $type = $getParam->getParam($this->type,'type');
        $value = $getParam->getParam($this->value,'value');

        return \sprintf('<%s %s %s %s %s %s %s %s %s>%s</%s>',
            static::TAG_NAME, $type,$value, static::TAG_NAME);
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Input
     */
    public function setType(string $type): Input
    {
        if (!in_array($type, static::$typeValues)) {
            throw new \RuntimeException('Значение вне диапазона');
        }
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return Input
     */
    public function setValue(string $value): Input
    {
        $this->value = $value;
        return $this;
    }
}