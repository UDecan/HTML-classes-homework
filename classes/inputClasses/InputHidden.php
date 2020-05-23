<?php


namespace App\classes;


use App\classes\interfaces\ViewInterface;

class InputHidden extends Input implements ViewInterface
{
    public  const TAG_NAME = 'InputHidden';

    /**
     * @var string
     */
    private $accept;

    /**
     * @var string
     */
    private $accesskey;

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
    private $autofocus;

    /**
     * @var int
     */
    private $border;

    /**
     * @var bool
     */
    private $checked;

    /**
     * @var bool
     */
    private $disabled;

    /**
     * @var string
     */
    private $form;

    /**
     * @var string
     */
    private $formaction;

    /**
     * @var string[]
     */
    static protected $formenctypeValues = ['application/x-www-form-urlencoded', 'multipart/form-data','text/plain', ''];

    /**
     * @var string
     */
    private $formenctype;

    /**
     * @var string[]
     */
    static protected $formmethodValues = ['get', 'post', ''];

    /**
     * @var string
     */
    private $formmethod;

    /**
     * @var bool
     */
    private $formnovalidate;

    /**
     * @var string[]
     */
    static protected $formtargetValues = ['_blank', '_self', '_parent', '_top', ''];

    /**
     * @var string
     */
    private $formtarget;

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
     * @var bool
     */
    private $multiple;

    /**
     * @var string
     */
    private $name;

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
     * @var string
     */
    private $placeholder;

    /**
     * @var bool
     */
    private $readonly;

    /**
     * @var bool
     */
    private $required;

    /**
     * @var int
     */
    private $size;

    /**
     * @var string
     */
    private $src;

    /**
     * @var float
     */
    private $step;

    /**
     * @var int
     */
    private $tabindex;

    /**
     * @var string[]
     */
    static protected $typeValues = ['button', 'checkbox', 'file', 'hidden', 'image', 'password', 'radio', 'reset',
        'submit', 'text', ''];

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
        $this->accept = $accept;
        $this->accesskey = $accesskey;
        $this->align = $align;
        $this->alt = $alt;
        $this->autocomplete = $autocomplete;
        $this->autofocus = $autofocus;
        $this->border = $border;
        $this->checked = $checked;
        $this->disabled = $disabled;
        $this->form = $form;
        $this->formaction = $formaction;
        $this->formenctype = $formenctype;
        $this->formmethod = $formmethod;
        $this->formnovalidate = $formnovalidate;
        $this->formtarget = $formtarget;
        $this->list = $list;
        $this->max = $max;
        $this->maxlength = $maxlength;
        $this->min = $min;
        $this->multiple = $multiple;
        $this->name = $name;
        $this->pattern = $pattern;
        $this->placeholder = $placeholder;
        $this->readonly = $readonly;
        $this->required = $required;
        $this->size = $size;
        $this->src = $src;
        $this->step = $step;
        $this->tabindex = $tabindex;
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

        $accept = $getParam->getParam($this->accept,'accept');
        $accesskey = $getParam->getParam($this->accesskey,'accesskey');
        $align = $getParam->getParam($this->align,'align');
        $alt = $getParam->getParam($this->alt,'alt');
        $autocomplete = $getParam->getParam($this->autocomplete,'autocomplete');
        $autofocus = $getParam->getParam($this->autofocus,'autofocus');
        $border = $getParam->getParam($this->border,'border');
        $checked = $getParam->getParam($this->checked,'checked');
        $disabled = $getParam->getParam($this->disabled,'disabled');
        $form = $getParam->getParam($this->form,'form');
        $formaction = $getParam->getParam($this->formaction,'formaction');
        $formenctype = $getParam->getParam($this->formenctype,'formenctype');
        $formmethod = $getParam->getParam($this->formmethod,'formmethod');
        $formnovalidate = $getParam->getParam($this->formnovalidate,'formnovalidate');
        $formtarget = $getParam->getParam($this->formtarget,'formtarget');
        $list = $getParam->getParam($this->list,'list');
        $max = $getParam->getParam($this->max,'max');
        $maxlength = $getParam->getParam($this->maxlength,'maxlength');
        $min = $getParam->getParam($this->min,'min');
        $multiple = $getParam->getParam($this->multiple,'multiple');
        $name = $getParam->getParam($this->name,'name');
        $pattern = $getParam->getParam($this->pattern,'pattern');
        $placeholder = $getParam->getParam($this->placeholder,'placeholder');
        $readonly = $getParam->getParam($this->readonly,'readonly');
        $required = $getParam->getParam($this->required,'required');
        $size = $getParam->getParam($this->size,'size');
        $src = $getParam->getParam($this->src,'src');
        $step = $getParam->getParam($this->step,'step');
        $tabindex = $getParam->getParam($this->tabindex,'tabindex');
        $type = $getParam->getParam($this->type,'type');
        $value = $getParam->getParam($this->value,'value');

        return \sprintf('<%s %s %s %s %s %s %s %s %s %s %s %s %s %s %s %s %s %s %s %s %s %s %s %s %s %s %s %s %s %s %s>%s</%s>',
            static::TAG_NAME, $accept,$accesskey,$align,$alt,$autocomplete,$autofocus,$border,$checked,$disabled,
            $form,$formaction,$formenctype,$formmethod,$formnovalidate,$formtarget,$list,$max,$maxlength,$min, $multiple,
            $name,$pattern,$placeholder,$readonly,$required,$size,$src,$step,$tabindex,$type,$value, static::TAG_NAME);
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
     * @return string
     */
    public function getAccesskey(): string
    {
        return $this->accesskey;
    }

    /**
     * @param string $accesskey
     * @return Input
     */
    public function setAccesskey(string $accesskey): Input
    {
        $this->accesskey = $accesskey;
        return $this;
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
    public function isAutofocus(): bool
    {
        return $this->autofocus;
    }

    /**
     * @param bool $autofocus
     * @return Input
     */
    public function setAutofocus(bool $autofocus): Input
    {
        $this->autofocus = $autofocus;
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

    /**
     * @return bool
     */
    public function isDisabled(): bool
    {
        return $this->disabled;
    }

    /**
     * @param bool $disabled
     * @return Input
     */
    public function setDisabled(bool $disabled): Input
    {
        $this->disabled = $disabled;
        return $this;
    }

    /**
     * @return string
     */
    public function getForm(): string
    {
        return $this->form;
    }

    /**
     * @param string $form
     * @return Input
     */
    public function setForm(string $form): Input
    {
        $this->form = $form;
        return $this;
    }

    /**
     * @return string
     */
    public function getFormaction(): string
    {
        return $this->formaction;
    }

    /**
     * @param string $formaction
     * @return Input
     */
    public function setFormaction(string $formaction): Input
    {
        $this->formaction = $formaction;
        return $this;
    }

    /**
     * @return string
     */
    public function getFormenctype(): string
    {
        return $this->formenctype;
    }

    /**
     * @param string $formenctype
     * @return Input
     */
    public function setFormenctype(string $formenctype): Input
    {
        if (!in_array($formenctype, static::$formenctypeValues)) {
            throw new \RuntimeException('Значение вне диапазона');
        }
        $this->formenctype = $formenctype;
        return $this;
    }

    /**
     * @return string
     */
    public function getFormmethod(): string
    {
        return $this->formmethod;
    }

    /**
     * @param string $formmethod
     * @return Input
     */
    public function setFormmethod(string $formmethod): Input
    {
        if (!in_array($formmethod, static::$formmethodValues)) {
            throw new \RuntimeException('Значение вне диапазона');
        }
        $this->formmethod = $formmethod;
        return $this;
    }

    /**
     * @return bool
     */
    public function isFormnovalidate(): bool
    {
        return $this->formnovalidate;
    }

    /**
     * @param bool $formnovalidate
     * @return Input
     */
    public function setFormnovalidate(bool $formnovalidate): Input
    {
        $this->formnovalidate = $formnovalidate;
        return $this;
    }

    /**
     * @return string
     */
    public function getFormtarget(): string
    {
        return $this->formtarget;
    }

    /**
     * @param string $formtarget
     * @return Input
     */
    public function setFormtarget(string $formtarget): Input
    {
        $this->formtarget = $formtarget;
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Input
     */
    public function setName(string $name): Input
    {
        $this->name = $name;
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

    /**
     * @return bool
     */
    public function isReadonly(): bool
    {
        return $this->readonly;
    }

    /**
     * @param bool $readonly
     * @return Input
     */
    public function setReadonly(bool $readonly): Input
    {
        $this->readonly = $readonly;
        return $this;
    }

    /**
     * @return bool
     */
    public function isRequired(): bool
    {
        return $this->required;
    }

    /**
     * @param bool $required
     * @return Input
     */
    public function setRequired(bool $required): Input
    {
        $this->required = $required;
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

    /**
     * @return float
     */
    public function getStep(): float
    {
        return $this->step;
    }

    /**
     * @param float $step
     * @return Input
     */
    public function setStep(float $step): Input
    {
        $this->step = $step;
        return $this;
    }

    /**
     * @return int
     */
    public function getTabindex(): int
    {
        return $this->tabindex;
    }

    /**
     * @param int $tabindex
     * @return Input
     */
    public function setTabindex(int $tabindex): Input
    {
        $this->tabindex = $tabindex;
        return $this;
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