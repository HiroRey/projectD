<?php


namespace App\Models\traits;


use Illuminate\Support\Facades\App;

trait Translatable
{
    private $defaultLang = 'ru';


    public function __($fileName)
    {
       $lang = App::getLocale() ?? $this->defaultLang;

       if($lang === 'en') {
           $fieldName = $fileName . '_en';
       } else {
           $fieldName = $fileName;
       }

       $attributes = array_keys($this->getAttributes());
       if (!in_array($fieldName, $attributes)) {
           throw new \LogicException('no such attribute for model ' . get_class($this));
       }

        if ($lang === 'en' && (is_null($this->$fieldName) || empty($this->$fieldName))) {
            return $this->$fileName;
        }

       return $this->$fieldName;
    }
}
