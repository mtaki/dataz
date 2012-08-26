<?php

class OperatorTest extends WebTestCase
{
	public $fixtures=array(
		'operators'=>'Operator',
	);

	public function testShow()
	{
		$this->open('?r=operator/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=operator/create');
	}

	public function testUpdate()
	{
		$this->open('?r=operator/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=operator/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=operator/index');
	}

	public function testAdmin()
	{
		$this->open('?r=operator/admin');
	}
}
