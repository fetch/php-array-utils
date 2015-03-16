<?php

class ArrayTest extends PHPUnit_Framework_TestCase {

  public function test_array_delete(){
    $ar = array('key1' => 'Foo', 'key2' => 'bar');
    $this->assertEquals('Foo', array_delete($ar, 'key1'));
    $this->assertEquals(array('key2' => 'bar'), $ar);

    $this->assertNull(array_delete($ar, 'not_existing'));
    $this->assertEquals(array('key2' => 'bar'), $ar);
  }

  public function test_array_get(){
    $ref = array('key1' => 'Foo', 'key2' => 'bar');
    $ar1 = $ref;
    $this->assertEquals('Foo', array_get($ar1, 'key1'));
    $this->assertEquals($ref, $ar1);
    $this->assertFalse(array_get($ar1, 'not_existing'));
    $this->assertEquals($ref, $ar1);
  }

  public function test_array_flatten(){
    $this->assertEquals(array(), array_flatten(array()));
    $this->assertEquals(array(1), array_flatten(array(1)));
    $this->assertEquals(array(1), array_flatten(array(array(1))));
    $this->assertEquals(array(1, 2), array_flatten(array(array(1, 2))));
    $this->assertEquals(array(1, 2), array_flatten(array(array(1), 2)));
    $this->assertEquals(array(1, 2), array_flatten(array(1, array(2))));
    $this->assertEquals(array(1, 2, 3), array_flatten(array(1, array(2), 3)));
    $this->assertEquals(array(1, 2, 3, 4), array_flatten(array(1, array(2, 3), 4)));
    $this->assertEquals(array(1, 2, 3, 4, 5, 6), array_flatten(array(1, array(2, 3), 4, array(5, 6))));
  }

  public function test_array_pick(){
    $this->assertEquals(array(), array_pick(array(), array('foo', 'bar', 'baz')));
    $this->assertEquals(array(), array_pick(array('bzz' => 'bar'), array('foo', 'bar', 'baz')));
    $this->assertEquals(array('foo' => 'bar'), array_pick(array('foo' => 'bar'), array('foo', 'bar', 'baz')));
    $this->assertEquals(array('foo' => 'bar'), array_pick(array('foo' => 'bar'), 'foo', 'bar'));
    $this->assertEquals(array('foo' => 'bar'), array_pick(array('foo' => 'bar'), 'foo'));
  }

  public function test_array_reject(){
    $this->assertEquals(array(), array_reject(array(), array('foo', 'bar', 'baz')));
    $this->assertEquals(array('bzz' => 'bar'), array_reject(array('bzz' => 'bar'), array('foo', 'bar', 'baz')));
    $this->assertEquals(array(), array_reject(array('foo' => 'bar'), array('foo', 'bar', 'baz')));
    $this->assertEquals(array(), array_reject(array('foo' => 'bar'), 'foo', 'bar'));
    $this->assertEquals(array('foo' => 'bar'), array_reject(array('foo' => 'bar'), 'bar'));
  }

}
