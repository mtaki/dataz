<?php

class LicenceApplicationTest extends WebTestCase
{
	public $fixtures=array(
		'licenceApplications'=>'LicenceApplication',
	);

	public function testShow()
	{
		$this->open('?r=licenceApplication/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=licenceApplication/create');
	}

	public function testUpdate()
	{
		$this->open('?r=licenceApplication/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=licenceApplication/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=licenceApplication/index');
	}

	public function testAdmin()
	{
		$this->open('?r=licenceApplication/admin');
	}
}
