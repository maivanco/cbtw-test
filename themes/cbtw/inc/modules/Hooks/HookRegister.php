<?php
namespace MyTheme\Hooks;

use MyTheme\Hooks\ElementorHook\WidgetRegister;

class HookRegister{

    public static function registerAllHooks(){
        $available_hooks = [
            WidgetRegister::class,
        ];

        foreach($available_hooks as $hook){
            $hook_instance = new $hook();
            $hook_instance->init();
        }
    }

}