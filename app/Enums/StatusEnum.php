<?php

namespace App\Enums;

enum StatusEnum: int
{
    case New = 0;
    case Done = 1;

    public function label(): string
    {
        return match ($this) {
            self::New => "Новый",
            self::Done => "Выполнен"
        };
    }
}
