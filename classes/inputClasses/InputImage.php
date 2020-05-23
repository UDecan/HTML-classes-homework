<?php


namespace App\classes;


use App\classes\interfaces\ViewInterface;

class InputImage extends Input implements ViewInterface
{
    public  const TAG_NAME = 'InputImage';

    /**
     * @var string[]
     */
    static protected $alignValues = ['bottom', 'left', 'middle','right', 'top',''];

    /**
     * @var string
     */
    private $align;

    /**
     * @var string
     */
    private $alt;

    /**
     * @var int
     */
    private $border;

    /**
     * @var string
     */
    private $src;

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
        $this->align = $align;
        $this->alt = $alt;
        $this->border = $border;
        $this->src = $src;
    }


    /**
     * @param string $inner
     * @return string
     */
    public function getView(string $inner = ''): string //31
    {
        $getParam = new getParamForGetView();

        $align = $getParam->getParam($this->align,'align');
        $alt = $getParam->getParam($this->alt,'alt');
        $border = $getParam->getParam($this->border,'border');
        $size = $getParam->getParam($this->size,'size');
        $src = $getParam->getParam($this->src,'src');

        return \sprintf('<%s %s %s %s %s>%s</%s>',
            static::TAG_NAME, $align,$alt,$border,$size,$src, static::TAG_NAME);
    }

    /**
     * @return string
     */
    public function getAlign(): string
    {
        return $this->align;
    }

    /**
     * @param string $align
     * @return Input
     */
    public function setAlign(string $align): Input
    {
        if (!in_array($align, static::$alignValues)) {
            throw new \RuntimeException('Значение вне диапазона');
        }
        $this->align = $align;
        return $this;
    }

    /**
     * @return string
     */
    public function getAlt(): string
    {
        return $this->alt;
    }

    /**
     * @param string $alt
     * @return Input
     */
    public function setAlt(string $alt): Input
    {
        $this->alt = $alt;
        return $this;
    }

    /**
     * @return int
     */
    public function getBorder(): int
    {
        return $this->border;
    }

    /**
     * @param int $border
     * @return Input
     */
    public function setBorder(int $border): Input
    {
        $this->border = $border;
        return $this;
    }

    /**
     * @return string
     */
    public function getSrc(): string
    {
        return $this->src;
    }

    /**
     * @param string $src
     * @return Input
     */
    public function setSrc(string $src): Input
    {
        $this->src = $src;
        return $this;
    }
}