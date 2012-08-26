<?php

class MessageMovementTest extends WebTestCase
{
	public $fixtures=array(
		'messageMovements'=>'MessageMovement',
	);

	public function testShow()
	{
		$this->open('?r=messageMovement/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=messageMovement/create');
	}

	public function testUpdate()
	{
		$this->open('?r=messageMovement/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=messageMovement/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=messageMovement/index');
	}

	public function testAdmin()
	{
		$this->open('?r=messageMovement/admin');
	}
}
