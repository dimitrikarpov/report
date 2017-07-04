<?php
declare(strict_types = 1);

namespace App;

class UserObjectFactory extends DomainObjectFactory
{
    public function createObject(array $row): DomainObject
    {
        $old = $this->getFromMap(User::class, $row['id']);

        if ($old) {
            return $old;
        }

        $obj = new User((int)$row['id'], $row['name']);
        $this->addToMap($obj);

        return $obj;
    }
}