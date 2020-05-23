<?php
declare(strict_types=1);
namespace App\classes;
use App\classes\interfaces\ViewInterface;

/**
 * Class Menu
 */
class Menu implements ViewInterface
{
    public  const TAG_NAME = 'menu';

    /**
     * @var string[]
     */
    static protected $typeValues = ['context', 'toolbar', 'list',''];

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $lable;

    /**
     * Menu constructor.
     * @param string $type
     * @param string $lable
     */
    public function __construct(string $type = 'list', string $lable = null)
    {
        $this->type = $type;
        $this->lable = $lable;
    }

    /**
     * @param string $inner
     * @return string
     */
    public function getView(string $inner = ''): string
    {
        $lable = '';
        if ($this->lable) {
            $lable = sprintf('lable="%s"', $this->lable);
        }
        $type = '';
        if ($this->type) {
            $type = sprintf('type="%s"', $this->type);
        }

        return \sprintf('<%s %s %s>%s</%s>', static::TAG_NAME, $lable, $type, $inner, static::TAG_NAME);
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
     * @return Menu
     */
    public function setType(string $type): Menu
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
    public function getLable(): string
    {
        return $this->lable;
    }

    /**
     * @param string $lable
     * @return Menu
     */
    public function setLable(string $lable): Menu
    {
        $this->lable = $lable;
        return $this;
    }
}