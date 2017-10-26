<?php
include 'src.php';

class TestSrc extends \PHPUnit_Framework_TestCase
{
    function testThat1IsI()
    {
        $this->assertEquals('I', arabicToRoman(1));
    }

    function test2IsII()
    {
        $this->assertEquals('II', arabicToRoman(2));
    }

    function test4IsIV()
    {
        $this->assertEquals('IV', arabicToRoman(4));
    }

    function test5IsV()
    {
        $this->assertEquals('V', arabicToRoman(5));
    }

    function test6IsVI()
    {
        $this->assertEquals('VI', arabicToRoman(6));
    }

    function test9IsIX()
    {
        $this->assertEquals('IX', arabicToRoman(9));
    }

    function test10IsX()
    {
        $this->assertEquals('X', arabicToRoman(10));
    }

    function test20IsXX()
    {
        $this->assertEquals('XX', arabicToRoman(20));
    }

    function test50IsL()
    {
        $this->assertEquals('L', arabicToRoman(50));
    }

    function test90IsXC()
    {
        $this->assertEquals('XC', arabicToRoman(90));
    }

    function test100IsC()
    {
        $this->assertEquals('C', arabicToRoman(100));
    }

    function test1000IsM()
    {
        $this->assertEquals('M', arabicToRoman(1000));
    }

    function test2017IsMMXVII()
    {
        $this->assertEquals('MMXVII', arabicToRoman(2017));
    }

    function test3999IsMMMCMXCIX()
    {
        $this->assertEquals('MMMCMXCIX', arabicToRoman(3999));
    }

    function test0ReturnsEmptyString()
    {
        $this->assertEquals('', arabicToRoman(0));
    }
}
