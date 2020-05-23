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
     * Input constructor.
     * @param string $accept
     * @param bool $multiple
     * @param string $placeholder
     */
    public function __construct(string $accept = null, bool $multiple = null, string $placeholder = null)
    {
        parent::__construct();
        $this->accept = $accept;
        $this->multiple = $multiple;
        $this->placeholder = $placeholder;
    }


    /**
     * @param string $inner
     * @return string
     */
    public function getView(string $inner = ''): string //31
    {
        $getParam = new getParamForGetView();

        $accept = $getParam->getParam($this->accept,'accept');
        $multiple = $getParam->getParam($this->multiple,'multiple');
        $placeholder = $getParam->getParam($this->placeholder,'placeholder');

        return \sprintf('<%s %s %s>%s</%s>',
            static::TAG_NAME, $accept,$multiple,$placeholder, static::TAG_NAME);
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
}