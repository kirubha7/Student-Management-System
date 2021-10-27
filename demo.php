<?php 

abstract class InterfaceName {
  abstract public function someMethod1();

  public function someMethod2(){
		echo 1;
	}
}



class Name extends InterfaceName{

	public $title = "all";

	function __construct(){
		$this->title = "constructor ";
	}

	public function someMethod1(){
		echo 2;
	}


	public function someMethod21(){
		echo 1;
	}


}

$name = new Name();


echo $name->someMethod1();
echo "<br>";

