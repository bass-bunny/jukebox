<?php

require_once 'JukeboxTestClass.php';

use Lib\StringUtils;

class StringUtilsTest extends JukeboxTestClass
{
    public function testCleanString1()
    {
        $string = '[Created_By_Stefano!]';
        $check = 'Created_By_Stefano';
        $this->assertEquals(StringUtils::cleanString($string), $check);
    }

    public function testCleanString2()
    {
        $string = '[Created By Stefano##\'/][;][;/#\']';
        $check = 'Created_By_Stefano';
        $this->assertEquals(StringUtils::cleanString($string), $check);
    }

    public function testContains1()
    {
        $content = 'This is a test string';
        $check = 'test';

        $this->assertTrue(StringUtils::contains($content, $check));
    }

    public function testContains2()
    {
        $content = 'This is a test string';
        $check = 'this should fail';

        $this->assertFalse(StringUtils::contains($content, $check));
    }

    public function testContains3()
    {
        $content = '';
        $check = 'test';

        $this->assertFalse(StringUtils::contains($content, $check));
    }

    public function testContains4()
    {
        $this->expectException(Exception::class);

        $content = '';
        $check = '';
        StringUtils::contains($content, $check);
    }

    public function testArrayContains1()
    {
        $content = ['string' => 'This is a test string'];
        $check = 'test';

        $this->assertTrue(StringUtils::arrayContains($content, $check));
    }

    public function testArrayContains2()
    {
        $content = ['string' => 'This is a test string'];
        $check = 'nope';
        $this->assertFalse(StringUtils::arrayContains($content, $check));
    }

    public function testArrayContains3()
    {
        $this->expectException(Exception::class);

        $content = ['string' => 'This is a test string'];
        $check = '';
        StringUtils::arrayContains($content, $check);
    }

    /**
     * Exceptional case. Result?
     */
    public function testArrayContains4()
    {
        $content = [];
        $check = '';
        $this->assertFalse(StringUtils::arrayContains($content, $check));
    }
}