<?php
class ProductCommand extends CConsoleCommand{
	public function run($args){
		echo "Test quering from SQL Server...\n";
		$products=Product::model()->findAll();
		foreach($products as $product)
			print("Product ID: $product->ProductID Name: $product->ProductName \n");
	}
	
}
?>
