<?php

namespace tests\SubjectBundle\Controller;

use AppBundle\Service\PartsGenerator;
use PHPUnit\Framework\TestCase;

class AlgoTest extends TestCase
{
    /**
     * @var PartsGenerator
     */
    private $controller;

    public function setUp()
    {
        $this->partsGenerator = new PartsGenerator();
    }

    public function testParts() {
        $parts = $this->partsGenerator->generate(3);
        $this->assertTrue(is_array($parts));
        $this->assertTrue(is_array($parts[0]));
        $this->assertTrue(is_array($parts[1]));
        $this->assertTrue(is_array($parts[2]));
        $this->assertTrue(is_int($parts[0][0]));
        $this->assertTrue(is_int($parts[1][0]));
        $this->assertTrue(is_int($parts[2][0]));
        $this->assertCount(3, $parts);
        $this->assertLessThanOrEqual(10, count($parts[1]));
        $this->assertLessThan(1000000, $parts[1][0]);
        $this->assertGreaterThan(99999, $parts[1][0]);
    }

}
