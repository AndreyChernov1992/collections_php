<?php
declare(strict_types=1);
namespace App\Test\Unit;

use App\App\UniqueCount;
use PHPUnit\Framework\TestCase;

/**
 * @uses UniqueCount 
 */

class UniquecountTest extends TestCase {
    private UniqueCount $object;
    private $anInvalidArgument;

    protected function setUp() :void {
        $this->object = new UniqueCount;
        $this->anInvalidArgument = NULL;
    }

    public function addDataProvider() {
        return array(
            array("asdfg", 5),
            array("aabbccdf", 2),
        );
    }

    /**
    * @dataProvider addDataProvider
    * @covers UniqueCount::countUnique
    */

    public function testString($a, $b) :void {
        $result = $this->object->countUnique($a);
        $this->assertEquals($result, $b);
    }

    public function testException() :void {
        $this->expectException(\TypeError::class);
        $this->object->countUnique($anInvalidArgument);
    }
}