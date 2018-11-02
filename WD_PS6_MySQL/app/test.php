<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 31.10.2018
 * Time: 13:50
 */

class test
{
private $testPrivat = 'testPrivat';
public $testpublic = 'testPublic';
protected $testprotected = 'testProtected';
static $testStatic = 'testStatic';


    private function testPrivateMethod () {
        echo $this->testPrivat.'<br>';
        echo $this->testpublic.'<br>';
        echo $this->testprotected.'<br>';
        echo $this->testStatic.'<br>';
    }

    public function testPublicMethod () {
        echo $this->testPrivat.'<br>';
        echo $this->testpublic.'<br>';
        echo $this->testprotected.'<br>';
        echo $this->testStatic.'<br>';
    }

    protected function testProtectedMethod () {
        echo $this->testPrivat . '<br>';
        echo $this->testpublic . '<br>';
        echo $this->testprotected . '<br>';
        echo $this->testStatic . '<br>';
    }
   /* static function testStaticMethod() {
        echo $this->testPrivat . '<br>';
        echo $this->testpublic . '<br>';
        echo $this->testprotected . '<br>';
        echo $this->testStatic . '<br>';
    }*/



}