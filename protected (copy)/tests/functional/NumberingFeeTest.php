<?php

class NumberingFeeTest extends WebTestCase
{
	public $fixtures=array(
		'numberingFees'=>'NumberingFee',
	);

	public function testShow()
	{
		$this->open('?r=numberingFee/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=numberingFee/create');
	}

	public function testUpdate()
	{
		$this->open('?r=numberingFee/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=numberingFee/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=numberingFee/index');
	}

	public function testAdmin()
	{
		$this->open('?r=numberingFee/admin');
	}
}
