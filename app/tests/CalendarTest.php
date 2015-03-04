<?php

use \Mockery as m;

class CalendarTest extends TestCase {

    public function testSimpleMock() {
        $mock = m::mock('sample');
        $mock->shouldReceive('foo')->with(5, m::any())->once()->andReturn(10);

        $this->assertEquals(10, $mock->foo(5));
    }

    public function tearDown() {
        m::close();
    }
}