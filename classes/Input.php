<?php
declare(strict_types=1);
namespace App\classes;
use App\classes\interfaces\ViewInterface;

/**
 * Class Input
 */
class Input implements ViewInterface
{
    public  const TAG_NAME = 'Input';

    /**
     * @var string
     */
    private $accesskey;

    /**
     * @var bool
     */
    private $autofocus;

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
    private $name;

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
     * @param string $accesskey
     * @param bool $autofocus
     * @param bool $disabled
     * @param string $form
     * @param string $formaction
     * @param string $formenctype
     * @param string $formmethod
     * @param bool $formnovalidate
     * @param string $formtarget
     * @param string $name
     * @param string $placeholder
     * @param bool $readonly
     * @param bool $required
     * @param double $step
     * @param int $tabindex
     * @param string $type
     * @param string $value
     */
    public function __construct(string $accesskey = null, bool $autofocus = null, bool $disabled = null, string $form = null,
                                string $formaction = null, string $formenctype = 'application/x-www-form-urlencoded', string $formmethod = null,
                                bool $formnovalidate = null, string $formtarget = null, string $name = null, string $placeholder = null, bool $readonly = null,
                                bool $required = null, float $step = 1, int $tabindex = null, string $type = 'text', string $value = null)
    {
        $this->accesskey = $accesskey;
        $this->autofocus = $autofocus;
        $this->disabled = $disabled;
        $this->form = $form;
        $this->formaction = $formaction;
        $this->formenctype = $formenctype;
        $this->formmethod = $formmethod;
        $this->formnovalidate = $formnovalidate;
        $this->formtarget = $formtarget;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->readonly = $readonly;
        $this->required = $required;
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

        $accesskey = $getParam->getParam($this->accesskey,'accesskey');
        $autocomplete = $getParam->getParam($this->autocomplete,'autocomplete');
        $autofocus = $getParam->getParam($this->autofocus,'autofocus');
        $checked = $getParam->getParam($this->checked,'checked');
        $disabled = $getParam->getParam($this->disabled,'disabled');
        $form = $getParam->getParam($this->form,'form');
        $formaction = $getParam->getParam($this->formaction,'formaction');
        $formenctype = $getParam->getParam($this->formenctype,'formenctype');
        $formmethod = $getParam->getParam($this->formmethod,'formmethod');
        $formnovalidate = $getParam->getParam($this->formnovalidate,'formnovalidate');
        $formtarget = $getParam->getParam($this->formtarget,'formtarget');
        $name = $getParam->getParam($this->name,'name');
        $placeholder = $getParam->getParam($this->placeholder,'placeholder');
        $readonly = $getParam->getParam($this->readonly,'readonly');
        $required = $getParam->getParam($this->required,'required');
        $step = $getParam->getParam($this->step,'step');
        $tabindex = $getParam->getParam($this->tabindex,'tabindex');
        $type = $getParam->getParam($this->type,'type');
        $value = $getParam->getParam($this->value,'value');

        return \sprintf('<%s %s %s %s %s %s %s %s %s %s %s %s %s %s %s %s %s %s %s>%s</%s>',
            static::TAG_NAME,$accesskey,$autocomplete,$autofocus,$checked,$disabled,
            $form,$formaction,$formenctype,$formmethod,$formnovalidate,$formtarget,
            $name,$placeholder,$readonly,$required,$step,$tabindex,$type,$value, static::TAG_NAME);
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