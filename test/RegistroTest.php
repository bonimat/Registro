<?php

use PHPUnit\Framework\TestCase;

class RegistroTest extends TestCase {

    public function testItWork(){
        $this->assertEquals("work","work");
    }

    public function testItNotWork(){
        $this->assertNotEquals("work","not work");
    }

}
