<?php


namespace App\classes;


use App\classes\interfaces\ViewInterface;

class InputText extends Input implements ViewInterface
{
    public  const TAG_NAME = 'InputText';

    /**
     * @var string[]
     */
    static protected $autocompleteValues = ['on', 'off',''];

    /**
     * @var string
     */
    private $autocomplete;

    /**
     * @var string
     */
    private $list;

    /**
     * @var int
     */
    private $max;

    /**
     * @var int
     */
    private $maxlength;

    /**
     * @var int
     */
    private $min;

    /**
     * @var string[]
     */
    static protected $patternValues = ['\d [0-9]', '\D [^0-9]', '\s', '[A-Z]',
        '[A-Za-z]', '[А-Яа-яЁё]', '[A-Za-zА-Яа-яЁё]', '[0-9]{3}', '[A-Za-z]{6,}', '[0-9]{,3}',
        '[0-9]{5,10}', '^[a-zA-Z]+$', '^[А-Яа-яЁё\s]+$', '^[ 0-9]+$', '[0-9]{6}', '\d+(,\d{2})?',
        '\d+(\.\d{2})?', '\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}', ''];

    /**
     * @var string
     */
    private $pattern;

    /**
     * @var int
     */
    private $size;

    /**
     * Input constructor.
     * @param string $autocomplete
     * @param string $list
     * @param int $max
     * @param int $maxlength
     * @param int $min
     * @param string $pattern
     * @param int $size
     */
    public function __construct(string $autocomplete = null, string $list = null, int $max = null, int $maxlength = (int)true,
                                int $min = null, string $pattern = null, int $size = 20)
    {
        parent::__construct();
        $this->autocomplete = $autocomplete;
        $this->list = $list;
        $this->max = $max;
        $this->maxlength = $maxlength;
        $this->min = $min;
        $this->pattern = $pattern;
        $this->size = $size;
    }


    /**
     * @param string $inner
     * @return string
     */
    public function getView(string $inner = ''): string //31
    {
        $getParam = new getParamForGetView();

        $autocomplete = $getParam->getParam($this->autocomplete,'autocomplete');
        $list = $getParam->getParam($this->list,'list');
        $max = $getParam->getParam($this->max,'max');
        $maxlength = $getParam->getParam($this->maxlength,'maxlength');
        $min = $getParam->getParam($this->min,'min');
        $pattern = $getParam->getParam($this->pattern,'pattern');
        $size = $getParam->getParam($this->size,'size');

        return \sprintf('<%s %s %s %s %s %s %s>%s</%s>',
            static::TAG_NAME,$autocomplete,$list,$max,$maxlength,$min,
            $pattern,$size, static::TAG_NAME);
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
     * @return string
     */
    public function getList(): string
    {
        return $this->list;
    }

    /**
     * @param string $list
     * @return Input
     */
    public function setList(string $list): Input
    {
        $this->list = $list;
        return $this;
    }

    /**
     * @return int
     */
    public function getMax(): int
    {
        return $this->max;
    }

    /**
     * @param int $max
     * @return Input
     */
    public function setMax(int $max): Input
    {
        $this->max = $max;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxlength(): int
    {
        return $this->maxlength;
    }

    /**
     * @param int $maxlength
     * @return Input
     */
    public function setMaxlength(int $maxlength): Input
    {
        $this->maxlength = $maxlength;
        return $this;
    }

    /**
     * @return int
     */
    public function getMin(): int
    {
        return $this->min;
    }

    /**
     * @param int $min
     * @return Input
     */
    public function setMin(int $min): Input
    {
        $this->min = $min;
        return $this;
    }

    /**
     * @return string
     */
    public function getPattern(): string
    {
        return $this->pattern;
    }

    /**
     * @param string $pattern
     * @return Input
     */
    public function setPattern(string $pattern): Input
    {
        if (!in_array($pattern, static::$patternValues)) {
            throw new \RuntimeException('Значение вне диапазона');
        }
        $this->pattern = $pattern;
        return $this;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @param int $size
     * @return Input
     */
    public function setSize(int $size): Input
    {
        $this->size = $size;
        return $this;
    }
}