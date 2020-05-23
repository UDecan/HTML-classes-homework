<?php


namespace App\classes;


use App\classes\interfaces\ViewInterface;

class InputFile extends Input implements ViewInterface
{
    public  const TAG_NAME = 'InputFile';

    /**
     * @var string
     */
    private $accept;

    /**
     * @var bool
     */
    private $multiple;

    /**
     * @var string
     */
    private $placeholder;

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
        $this->accept = $accept;
        $this->autocomplete = $autocomplete;
        $this->multiple = $multiple;
        $this->placeholder = $placeholder;
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

        $accept = $getParam->getParam($this->accept,'accept');
        $autocomplete = $getParam->getParam($this->autocomplete,'autocomplete');
        $multiple = $getParam->getParam($this->multiple,'multiple');
        $placeholder = $getParam->getParam($this->placeholder,'placeholder');
        $type = $getParam->getParam($this->type,'type');
        $value = $getParam->getParam($this->value,'value');

        return \sprintf('<%s %s %s %s %s %s>%s</%s>',
            static::TAG_NAME, $accept,$autocomplete,$multiple,$placeholder,$type,$value, static::TAG_NAME);
    }

    /**
     * @return string
     */
    public function getAccept(): string
    {
        return $this->accept;
    }

    /**
     * @param string $accept
     * @return Input
     */
    public function setAccept(string $accept): Input
    {
        $this->accept = $accept;
        return $this;
    }

    /**
     * @return string
     */
    public function getAutocomplete(): string
    {
        return $this->autocomplete;
    }

    /**
     * @param string $autocomplete
     * @return Input
     */
    public function setAutocomplete(string $autocomplete): Input
    {
        if (!in_array($autocomplete, static::$autocompleteValues)) {
            throw new \RuntimeException('Значение вне диапазона');
        }
        $this->autocomplete = $autocomplete;
        return $this;
    }

    /**
     * @return bool
     */
    public function isMultiple(): bool
    {
        return $this->multiple;
    }

    /**
     * @param bool $multiple
     * @return Input
     */
    public function setMultiple(bool $multiple): Input
    {
        $this->multiple = $multiple;
        return $this;
    }

    /**
     * @return string
     */
    public function getPlaceholder(): string
    {
        return $this->placeholder;
    }

    /**
     * @param string $placeholder
     * @return Input
     */
    public function setPlaceholder(string $placeholder): Input
    {
        $this->placeholder = $placeholder;
        return $this;
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