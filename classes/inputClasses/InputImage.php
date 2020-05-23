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
     * @param string $align
     * @param string $alt
     * @param int $border
     * @param string $src
     */
    public function __construct(string $align = 'bottom', string $alt = null, int $border = 0, string $src = null)
    {
        parent::__construct();
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
        $src = $getParam->getParam($this->src,'src');

        return \sprintf('<%s %s %s %s>%s</%s>',
            static::TAG_NAME, $align,$alt,$border,$src, static::TAG_NAME);
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