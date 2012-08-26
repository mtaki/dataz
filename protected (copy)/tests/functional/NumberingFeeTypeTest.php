<?php

class NumberingFeeTypeTest extends WebTestCase
{
	public $fixtures=array(
		'numberingFeeTypes'=>'NumberingFeeType',
	);

	public function testShow()
	{
		$this->open('?r=numberingFeeType/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=numberingFeeType/create');
	}

	public function testUpdate()
	{
		$this->open('?r=numberingFeeType/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=numberingFeeType/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=numberingFeeType/index');
	}

	public function testAdmin()
	{
		$this->open('?r=numberingFeeType/admin');
	}
}
