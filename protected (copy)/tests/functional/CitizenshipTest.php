<?php

class CitizenshipTest extends WebTestCase
{
	public $fixtures=array(
		'citizenships'=>'Citizenship',
	);

	public function testShow()
	{
		$this->open('?r=citizenship/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=citizenship/create');
	}

	public function testUpdate()
	{
		$this->open('?r=citizenship/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=citizenship/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=citizenship/index');
	}

	public function testAdmin()
	{
		$this->open('?r=citizenship/admin');
	}
}
