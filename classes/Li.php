<?php
declare(strict_types=1);
namespace App\classes;
use App\classes\interfaces\ViewInterface;

/**
 * Class Li
 */
class Li implements ViewInterface
{
    public  const TAG_NAME = 'Li';

    /**
     * @var string[]
     */
    static protected $typeValues = ['disc', 'circle', 'square',''];

    /**
     * @var string
     */
    private $type;

    /**
     * @var int
     */
    private $value;

    /**
     * Li constructor.
     * @param string $type
     * @param int $value
     */
    public function __construct(string $type = 'disc', int $value = 1)
    {
        $this->type = $type;
        $this->value = $value;
    }

    /**
     * @param string $inner
     * @return string
     */
    public function getView(string $inner = ''): string
    {
        $value = '';
        if ($this->value) {
            $type = sprintf('value="%s"', $this->value);
        }
        $type = '';
        if ($this->type) {
            $type = sprintf('type="%s"', $this->type);
        }

        return \sprintf('<%s %s %s>%s</%s>', static::TAG_NAME, $type, $value, $inner, static::TAG_NAME);
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
     * @return Li
     */
    public function setType(string $type): Li
    {
        if (!in_array($type, static::$typeValues)) {
            throw new \RuntimeException('Значение вне диапазона');
        }
        $this->type = $type;
        return $this;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @param int $value
     * @return Li
     */
    public function setValue(int $value): Li
    {
        $this->value = $value;
        return $this;
    }
}