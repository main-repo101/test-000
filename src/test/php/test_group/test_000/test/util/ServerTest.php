<?php

namespace test_group\test_000\test\util;

use PHPUnit\Framework\TestCase;
use test_group\test_000\util\ArrayType;
use test_group\test_000\util\Response;
use test_group\test_000\util\Server;

class ServerTest extends TestCase {

    /**
     * @override
     * @return void
     */
    protected function setUp(): void {
        $this->assertTrue(
            !isset($_SESSION[Server::SESSION_KEY_USERNAME])
        );
        $this->assertTrue(
            !isset($_SESSION[Server::SESSION_KEY_TIMEOUT])
        );
        $this->assertTrue(
            !isset($_SESSION[Server::SESSION_KEY_STATUS])
        );

        Server::startSession();
        $_SERVER = [];

        $_SESSION[Server::SESSION_KEY_USERNAME] = "123";

        $this->assertFalse(isset($_SESSION[Server::SESSION_KEY_TIMEOUT]));

        $_SESSION[Server::SESSION_KEY_STATUS] = Response::OK;
    }

    /**
     * @override
     * @return void
     */
    protected function tearDown(): void {
        Server::endSession();
        
        $this->assertTrue(
            !isset($_SESSION[Server::SESSION_KEY_USERNAME])
        );
        $this->assertTrue(
            !isset($_SESSION[Server::SESSION_KEY_TIMEOUT])
        );
        $this->assertTrue(
            !isset($_SESSION[Server::SESSION_KEY_STATUS])
        );
    }

    /**
     * 
     * @return void
     */
    public function testSessionKey(): void {
        $this->assertTrue(
            isset($_SESSION[Server::SESSION_KEY_USERNAME])
        );
        $this->assertEquals(
            "123", $_SESSION[Server::SESSION_KEY_USERNAME]
        );

        $this->assertTrue(
            !isset($_SESSION[Server::SESSION_KEY_TIMEOUT])
        );

        $this->assertTrue(
            isset($_SESSION[Server::SESSION_KEY_STATUS])
        );
        $this->assertEquals(
            Response::OK, $_SESSION[Server::SESSION_KEY_STATUS]
        );
    }

    /**
     * @return void
     */
    public function testGetRequestedURI(): void {

        $_SERVER["REQUEST_URI"] = "/home";
        $this->assertEquals(
            "/home",
            Server::getRequestedURI()
        );

        $otherURI = "/home/userz";
        $_SERVER["REQUEST_URI"] = "/home/user";
        $this->assertNotEquals(
            Server::getRequestedURI(),
            $otherURI
        );

        $_SERVER["REQUEST_URI"] = "/home/user?id=1";
        $this->assertEquals(
            "/home/user?id=1",
            Server::getRequestedURI()
        );
        
    }

    public function testGetRequestedPath(): void {
        $_SERVER["REQUEST_URI"] = "/home/user";
        $this->assertEquals(
            "/home/user",
            Server::getRequestedPath()
        );

        $_SERVER["REQUEST_URI"] = "/home/user?id=1";
        $this->assertNotEquals(
            "/home/user?id=1",
            Server::getRequestedPath()
        );
        $this->assertEquals(
            "/home/user",
            Server::getRequestedPath()
        );
    }

    public function testGetRequestedQuery(): void {

        $this->checkGetRequestedQuery();

        $_SERVER["REQUEST_URI"] = "/home/user?id=1";
        $this->assertNotEquals(
            "/home/user",
            Server::getRequestedQuery()
        );
        $this->assertEquals(
            ["id" => "1"],
            Server::getRequestedQuery()
        );
        $this->assertEquals(
            "1",
            Server::getRequestedQuery()["id"]
        );
        $this->assertEquals(
            [ 0 => "id=1" ],
            Server::getRequestedQuery(ArrayType::FLAT)
        );
        $this->assertEquals(
            "id=1",
            Server::getRequestedQuery(ArrayType::FLAT)[0]
        );

    }

    public function checkGetRequestedQuery(): void {

        $_SERVER["REQUEST_URI"] = "/home/user?id=1";

        $this->assertTrue(
            ArrayType::isAssociativeArray( Server::getRequestedQuery() )
        );

        $this->assertFalse(
            ArrayType::isIndexArray( Server::getRequestedQuery() )
        );
        
        $this->assertTrue(
            ArrayType::isIndexArray( 
                Server::getRequestedQuery( ArrayType::FLAT ) 
            )
        );

        $this->assertFalse(
            ArrayType::isAssociativeArray( 
                Server::getRequestedQuery( ArrayType::FLAT ) 
            )
        );
        
    }
}