<?php
namespace Mixthe\Hasher;

use PHPUnit\Framework\TestCase;
use Mixthe\Hasher\MD5Hasher;

class MD5HaserTest extends TestCase
{
    protected $hasher;

    public function setUp()
    {
        $this->hasher = new MD5Hasher();
    }

    public function testMD5HaserTest()
    {
        $password = md5('password');
        $passwordTwo = $this->hasher->make('password');

        $this->assertEquals($password,$passwordTwo);
    }

    public function testMD5HaserTestWithouSalt()
    {
        $password = md5('passwordtest');
        $passwordTwo = $this->hasher->make('password',['salt'=>'test']);

        $this->assertEquals($password,$passwordTwo);
    }

    public function testMD5HaserCheck()
    {
        $password = md5('password');
        $passwordCheck = $this->hasher->check('password',$password);

        $this->assertTrue($passwordCheck);
    }
}

