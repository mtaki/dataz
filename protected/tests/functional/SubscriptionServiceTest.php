<?php

class SubscriptionServiceTest extends WebTestCase
{
	public $fixtures=array(
		'subscriptionServices'=>'SubscriptionService',
	);

	public function testShow()
	{
		$this->open('?r=subscriptionService/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=subscriptionService/create');
	}

	public function testUpdate()
	{
		$this->open('?r=subscriptionService/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=subscriptionService/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=subscriptionService/index');
	}

	public function testAdmin()
	{
		$this->open('?r=subscriptionService/admin');
	}
}
