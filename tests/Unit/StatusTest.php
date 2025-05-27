<?php

namespace Tests\Unit;

use App\Enums\StatusEnum;
use PHPUnit\Framework\TestCase;

class StatusTest extends TestCase
{
    public function testStatusEnum()
    {
        $new = StatusEnum::New;
        $done = StatusEnum::Done;
        $this->assertEquals(0, $new->value);
        $this->assertEquals('Новый', $new->label());
        $this->assertEquals(1, $done->value);
        $this->assertEquals('Выполнен', $done->label());
    }
}
