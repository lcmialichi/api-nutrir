<?php

namespace App\Models;

trait Alias
{

    public function toAlias($object = false)
    {
        if (isset($this->alias)) {
            if (is_array($this->alias)) {
                $modelMap = $this->toArray();
                foreach ($this->alias as $mapKey => $mapValue) {
                    unset($modelMap[$mapKey]);
                    $modelMap[$mapValue] = $this->$mapKey;
                }
                if (!$object) {
                    return $modelMap ?? null;
                }
                return (object)$modelMap ?? null;
            }
        }

        return $this->toArray();
    }
}
