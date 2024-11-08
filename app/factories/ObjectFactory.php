<?php

namespace App\factories;

class ObjectFactory
{
    public static function generateObject(array $data, string $modelClass): object
    {
        $modelClass = "App\Models\\" . $modelClass;
        $model = new $modelClass();
        $modelMethods = get_class_methods($model);
        //echo"<pre>";var_dump($modelMethods);echo"</pre>";die;
        foreach ($data as $key => $value) {
            $setterMethod = 'set' . ucfirst($key);
            if (method_exists($model, $setterMethod)) {
                $model->$setterMethod($value);
            }
        }

        return $model;
    }

    public static function generateObjectsArray(array $data, string $modelClass): array
    {
        $objects = [];
        foreach ($data as $item) {
            $objects[] = self::generateObject($item, $modelClass);
        }
        return $objects;
    }
}