<?php

class FrequencyTransTest extends WebTestCase
{
	public $fixtures=array(
		'frequencyTrans'=>'FrequencyTrans',
	);

	public function testShow()
	{
		$this->open('?r=frequencyTrans/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=frequencyTrans/create');
	}

	public function testUpdate()
	{
		$this->open('?r=frequencyTrans/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=frequencyTrans/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=frequencyTrans/index');
	}

	public function testAdmin()
	{
		$this->open('?r=frequencyTrans/admin');
	}
}
