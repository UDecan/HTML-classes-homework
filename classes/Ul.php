<?php
declare(strict_types=1);
namespace App\classes;
use App\classes\interfaces\ViewInterface;

/**
 * Class Ul
 */
class Ul implements ViewInterface
{
    public  const TAG_NAME = 'Ul';

    /**
     * @var string[]
     */
    static protected $typeValues = ['disc', 'circle', 'square',''];

    /**
     * @var string
     */
    private $type;

    /**
     * Ul constructor.
     * @param string $type
     */
    public function __construct(string $type = 'disc')
    {
        $this->type = $type;
    }

    /**
     * @param string $inner
     * @return string
     */
    public function getView(string $inner = ''): string
    {
        $getParam = new getParamForGetView();
        $type = $getParam->getParam($this->type, 'type');

        return \sprintf('<%s %s>%s</%s>', static::TAG_NAME, $type, $inner, static::TAG_NAME);
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
     * @return Ul
     */
    public function setType(string $type): Ul
    {
        if (!in_array($type, static::$typeValues)) {
            throw new \RuntimeException('Значение вне диапазона');
        }
        $this->type = $type;
        return $this;
    }
}