<?php

class Package {

    protected $id;
    protected $buyer_info;
    protected $address;
    protected $price;
    protected $dateAndTime;
    protected $status;

    public function __construct($id, $buyer_info, $price, $address, $status, $dateAndTime)
    {
        $this->id = $id;
        $this->buyer_info = $buyer_info;
        $this->address = $address;
        $this->dateAndTime = $dateAndTime;
        $this->status = $status;

    }

    protected function getId () {

        return $this->id;
    }

    protected function getBuyerInfo () {

        return $this->buyer_info;
    }

    protected function getAddress () {

        return $this->address;
    }

    protected function getDateAndTime () {

        return $this->dateAndTime;
    }

    protected function getStatus () {

        return $this->status;
    }

    public function display(): string
    {
        $content = '';
        $content .= "<h1>{$this->getId()}</h1>";
        $content .= "<p>{$this->getAddress()}</p>";
        $content .= "<p> {$this->getDateAndTime()}р.</p>";
        $content .= "<p> {$this->getStatus()}</p>";
        return $content;
    }


    protected function changeStatus($status) {

        return  $this->status = $status;

    }



}

class VipPackage extends Package {

    protected $loyaltyNumber;

    public function __construct($id, $buyer_info, $price, $address, $status, $dateAndTime, $loyaltyNumber)
    {
        parent::__construct($id, $buyer_info, $price, $address, $status, $dateAndTime);

        $this->loyaltyNumber = $loyaltyNumber;
    }

    protected function getLoyaltyNumber () {

        return $this->loyaltyNumber;


    }

}

$package = new VipPackage(
    1,
    [3, "login", "name" ],
    550,
    "Kosmonavtov 65/2 753",
    "created",
    "12.11.2019 17:30",
    276

);

echo $package->display();

//class A {
//public function foo() {
//        static $x = 0;
//        echo ++$x . "<br>";
//    }
//}
//$a1 = new A();
//$a2 = new A();
//$a1->foo();
//$a2->foo();
//$a1->foo();
//$a2->foo();

// посклольку $x static  он инициализируется только при первом вызове и сохраняет значения и на каждом шаге
// увеличивается

class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A();
$b1 = new B();
$a1->foo();
$b1->foo();
$a1->foo();
$b1->foo();

// статичная переменная инициализируется при создании родительского класса, но переопределяется
//при создании дочернего класса она переопределяется



