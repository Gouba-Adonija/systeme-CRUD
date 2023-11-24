<?php
class user{
    private $i;
    private $n;
    private $p;
    private $e;
    private $s;
    private $t;
    private $ex;
    function __construct($i,$n,$p,$e,$s,$t,$ex){
        $this->_n = $i;
        $this->_n = $n;
        $this->_p = $p;
        $this->_e = $e;
        $this->_s = $s;
        $this->_t = $t;
        $this->_ex = $ex;
    }
    function dataUser(){
        $this->_n = $i;
        $this->_n = $n;
        $this->_p = $p;
        $this->_e = $e;
        $this->_s = $s;
        $this->_t = $t;
        $this->_ex = $ex;
        return "$i,$n,$p,$e,$s,$t,$ex";
    }
}