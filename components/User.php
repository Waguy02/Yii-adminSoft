<?php

namespace yii\components;
use yii\base\Event;
use yii\base\Component;

class User extends Component
{
    public $number;
    public $name;
    public $email;

    public function __construct($param1, $param2, $param3, $config = [])
    {
        $this->number = $param1;
        $this->name = $param2;
        $this->email = $param3;

        parent::__construct($config);
    }

    public function init()
    {
        parent::init();

        // ... initialization après l'application de la configuration
    }

    public function valid($param1, $param2, $param3)
    {
        $event = new MessageEvent;
        $event->number = $param1;
        $event->name = $param2;
        $event->email = $param3;
        
        $this->trigger(self::VALID_DATA, $event);
    }
}

class ValidEvent extends Event
{
    public $number;
    public $name;
    public $email;
}
