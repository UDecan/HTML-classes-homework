<?php


namespace App\classes;


use App\classes\interfaces\ViewInterface;

class InputCheckBox extends Input implements ViewInterface
{
    public  const TAG_NAME = 'InputCheckBox';

    /**
     * @var string[]
     */
    static protected $autocompleteValues = ['on', 'off',''];

    /**
     * @var string
     */
    private $autocomplete;

    /**
     * @var bool
     */
    private $checked;

    /**
     * Input constructor.
     * @param string $autocomplete
     * @param bool $checked
     */
    public function __construct(string $autocomplete = null, bool $checked = null)
    {
        parent::__construct();
        $this->autocomplete = $autocomplete;
        $this->checked = $checked;
    }


    /**
     * @param string $inner
     * @return string
     */
    public function getView(string $inner = ''): string //31
    {
        $getParam = new getParamForGetView();

        $autocomplete = $getParam->getParam($this->autocomplete,'autocomplete');
        $checked = $getParam->getParam($this->checked,'checked');

        return \sprintf('<%s %s>%s</%s>',
            static::TAG_NAME, $autocomplete,$checked, static::TAG_NAME);
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
    public function isChecked(): bool
    {
        return $this->checked;
    }

    /**
     * @param bool $checked
     * @return Input
     */
    public function setChecked(bool $checked): Input
    {
        $this->checked = $checked;
        return $this;
    }
}