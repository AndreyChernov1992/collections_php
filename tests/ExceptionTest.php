<?php
declare(strict_types=1);
namespace App\Test\Unit;

use App\App\UniqueCount;
use PHPUnit\Framework\TestCase;

class ExceptionTest extends TestCase {
    private UniqueCount $object;
    private $anInvalidArgument;

    protected function setUp() :void {
        $this->object = new UniqueCount();
        $this->anInvalidArgument = NULL;
    }

    /**
    * @covers UniqueCount::countUnique
    */

    public function testException() :void {
        $this->expectException(\TypeError::class);
        $this->object->countUnique($anInvalidArgument);
    }
}