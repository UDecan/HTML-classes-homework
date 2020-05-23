<?php


namespace App\classes;


use App\classes\interfaces\ViewInterface;

class InputButton extends Input implements ViewInterface
{
    public  const TAG_NAME = 'InputButton';

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
     * @param string $type
     * @param string $value
     */
    public function __construct(string $type = 'text', string $value = null)
    {
        parent::__construct();
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

        return \sprintf('<%s %s>%s</%s>',
            static::TAG_NAME,$type,$value, static::TAG_NAME);
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