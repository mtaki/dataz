<?php

class LicenceFeeTest extends WebTestCase
{
	public $fixtures=array(
		'licenceFees'=>'LicenceFee',
	);

	public function testShow()
	{
		$this->open('?r=licenceFee/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=licenceFee/create');
	}

	public function testUpdate()
	{
		$this->open('?r=licenceFee/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=licenceFee/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=licenceFee/index');
	}

	public function testAdmin()
	{
		$this->open('?r=licenceFee/admin');
	}
}
