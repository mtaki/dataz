<?php

class CurrencyTest extends WebTestCase
{
	public $fixtures=array(
		'currencys'=>'Currency',
	);

	public function testShow()
	{
		$this->open('?r=currency/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=currency/create');
	}

	public function testUpdate()
	{
		$this->open('?r=currency/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=currency/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=currency/index');
	}

	public function testAdmin()
	{
		$this->open('?r=currency/admin');
	}
}
