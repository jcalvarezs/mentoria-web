<?php
namespace app\core\widgets;
use app\core\Model;
class field
{
    public const TYPE_TEXT = 'text';
    public const TYPE_MAIL = 'email';
    public const TYPE_PASSWORD = 'password';
    public Model $model;
    public string $attribute;
    public string $type;
    public  function __construct(Model $model, string $attribute)
    {
        
        $this->model = $model;
        $this->attribute = $attribute;
        $this->type = self::TYPE_TEXT;

    }
            
    
    public function __toString()
    {
        return sprintf('
        <div class="mb-3">
            <label class="form-label">FirstName</label>
            <input type="%s" name ="%s" value="%s" class="form-control %s">
    
            <div class="invlaid-feedback">
                %s
            </div>
        </div>
        ' ,
        $this->model,
        $this->type,
        $this->attribute,
        $this->model->{$this->attribute},
        $this->model->hasError($this->attribute)? 'is-invalid' : ' ',
        $this->model->getFirsterror($this->attribute),
        );
    }
    
    public function passwordField()
    {
        $this->type = self::TYPE_PASSWORD;
        return $this;    
    }

    public function textField()
    {
        $this->type = self::TYPE_TEXT;
        return $this;    
    }

    public function emailField()
    {
        $this->type = self::TYPE_MAIL;
        return $this;    
    }

}