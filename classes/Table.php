<?php
declare(strict_types=1);
namespace App\classes;
use App\classes\interfaces\ViewInterface;

/**
 * Class Table
 */
class Table implements ViewInterface
{
    public  const TAG_NAME = 'Table';

    /**
     * @var string[]
     */
    static protected $alignValues = ['center', 'left', 'right', 'justify', ''];

    /**
     * @var string
     */
    private $align;

    /**
     * @var string
     */
    private $background;

    /**
     * @var string
     */
    private $bgcolor;

    /**
     * @var int
     */
    private $border;

    /**
     * @var string
     */
    private $bordercolor;

    /**
     * @var int
     */
    private $cellpadding;

    /**
     * @var int
     */
    private $cellspacing;

    /**
     * @var int
     */
    private $cols;

    /**
     * @var string[]
     */
    static protected $frameValues = ['void', 'border', 'above', 'below', 'hsides', 'vsides', 'rhs', 'lhs', ''];

    /**
     * @var string
     */
    private $frame;

    /**
     * @var int
     */
    private $height;

    /**
     * @var string[]
     */
    static protected $rulesValues = ['all', 'groups', 'cols', 'none', 'rows', ''];

    /**
     * @var string
     */
    private $rules;

    /**
     * @var string
     */
    private $summary;

    /**
     * @var int
     */
    private $width;

    /**
     * Table constructor.
     * @param string $align
     * @param string $background
     * @param string $bgcolor
     * @param int $border
     * @param string $bordercolor
     * @param int $cellpadding
     * @param int $cellspacing
     * @param int $cols
     * @param string $frame
     * @param int $height
     * @param string $rules
     * @param string $summary
     * @param int $width
     */
    public function __construct(string $align = 'left', string $background = null, string $bgcolor = '#ffffff', int $border = 0,
                                string $bordercolor = 'red', int $cellpadding = 0, int $cellspacing = null, int $cols = null, string $frame = 'border',
                                int $height = 100, string $rules = null, string $summary = null, int $width = 100)
    {
        $this->align = $align;
        $this->background = $background;
        $this->bgcolor = $bgcolor;
        $this->border = $border;
        $this->bordercolor = $bordercolor;
        if ($cellspacing != null){
            $this->cellpadding = ($border == null) ? 0 : 2;
        }
        else {
            $this->cellpadding = $cellpadding;
        }
        $this->cellspacing = $cellspacing;
        $this->cols = $cols;
        $this->frame = $frame;
        $this->height = $height;
        if ($rules != null){
            $this->rules = $border == 0 ? 'none' : 'all';
        }
        else{
            $this->rules = $rules;
        }
        $this->summary = $summary;
        $this->width = $width;
    }

    /**
     * @param string $inner
     * @return string
     */
    public function getView(string $inner = ''): string
    {
        $getParam = new getParamForGetView();
        $align = $getParam->getParam($this->align,'align');
        $background = $getParam->getParam($this->background,'background');
        $bgcolor = $getParam->getParam($this->bgcolor,'bgcolor');
        $border = $getParam->getParam($this->border,'border');
        $bordercolor = $getParam->getParam($this->bordercolor,'bordercolor');
        $cellpadding = $getParam->getParam($this->cellpadding,'cellpadding');
        $cellspacing = $getParam->getParam($this->cellspacing,'cellspacing');
        $cols = $getParam->getParam($this->cols,'cols');
        $frame = $getParam->getParam($this->frame,'frame');
        $height = $getParam->getParam($this->height,'height');
        $rules = $getParam->getParam($this->rules,'rules');
        $summary = $getParam->getParam($this->summary,'summary');
        $width = $getParam->getParam($this->width,'width');

        return \sprintf('<%s %s %s %s %s %s %s %s %s %s %s %s %s %s>%s</%s>',
            static::TAG_NAME, $align, $background,$bgcolor,$border,$bordercolor, $cellpadding,$cellspacing,
            $cols,$frame,$height,$rules,$summary,$width, $inner, static::TAG_NAME);
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
     * @return Table
     */
    public function setAlign(string $align): Table
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
    public function getBackground(): string
    {
        return $this->background;
    }

    /**
     * @param string $background
     * @return Table
     */
    public function setBackground(string $background): Table
    {
        $this->background = $background;
        return $this;
    }

    /**
     * @return string
     */
    public function getBgcolor(): string
    {
        return $this->bgcolor;
    }

    /**
     * @param string $bgcolor
     * @return Table
     */
    public function setBgcolor(string $bgcolor): Table
    {
        $this->bgcolor = $bgcolor;
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
     * @return Table
     */
    public function setBorder(int $border): Table
    {
        $this->border = $border;
        return $this;
    }

    /**
     * @return string
     */
    public function getBordercolor(): string
    {
        return $this->bordercolor;
    }

    /**
     * @param string $bordercolor
     * @return Table
     */
    public function setBordercolor(string $bordercolor): Table
    {
        $this->bordercolor = $bordercolor;
        return $this;
    }

    /**
     * @return int
     */
    public function getCellpadding(): int
    {
        return $this->cellpadding;
    }

    /**
     * @param int $cellpadding
     * @return Table
     */
    public function setCellpadding(int $cellpadding): Table
    {
        $this->cellpadding = $cellpadding;
        return $this;
    }

    /**
     * @return int
     */
    public function getCellspacing(): int
    {
        return $this->cellspacing;
    }

    /**
     * @param int $cellspacing
     * @return Table;
     */
    public function setCellspacing(int $cellspacing): Table
    {
        $this->cellspacing = $cellspacing;
        return $this;
    }

    /**
     * @return int
     */
    public function getCols(): int
    {
        return $this->cols;
    }

    /**
     * @param int $cols
     * @return Table
     */
    public function setCols(int $cols): Table
    {
        $this->cols = $cols;
        return $this;
    }

    /**
     * @return string
     */
    public function getFrame(): string
    {
        return $this->frame;
    }

    /**
     * @param string $frame
     * @return Table
     */
    public function setFrame(string $frame): Table
    {
        if (!in_array($frame, static::$frameValues)) {
            throw new \RuntimeException('Значение вне диапазона');
        }
        $this->frame = $frame;
        return $this;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $height
     * @return Table
     */
    public function setHeight(int $height): Table
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return string
     */
    public function getRules(): string
    {
        return $this->rules;
    }

    /**
     * @param string $rules
     * @return Table
     */
    public function setRules(string $rules): Table
    {
        if (!in_array($rules, static::$rulesValues)) {
            throw new \RuntimeException('Значение вне диапазона');
        }
        $this->rules = $rules;
        return $this;
    }

    /**
     * @return string
     */
    public function getSummary(): string
    {
        return $this->summary;
    }

    /**
     * @param string $summary
     * @return Table
     */
    public function setSummary(string $summary): Table
    {
        $this->summary = $summary;
        return $this;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     * @return Table
     */
    public function setWidth(int $width): Table
    {
        $this->width = $width;
        return $this;
    }
}