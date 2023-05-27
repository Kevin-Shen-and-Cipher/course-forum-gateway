<?php

namespace Tests\Feature;

use App\Http\Requests\VerifyAdminRequest;
use App\Http\Controllers\AuthController;
use Tests\TestCase;

class VerifyAdminRequestTest extends TestCase
{
    protected $VerifyUser;

    public function setUp(): void
    {
        parent::setUp();
        $authController = new AuthController(); 
        $this->VerifyUser = new VerifyAdminRequest($authController);
    }
    public function testAuthorizationAsUser()
    {
        $data = [
            'status ' => 200,
            "identity"=>"admin"
        ];
        $jsonData = json_encode($data);
        $this->VerifyUser->setJson($jsonData);
        $authorized = $this->VerifyUser->isAdmin($jsonData); 
        $this->assertTrue($authorized);
    }

    public function testAuthorizationAsNonUser()
    {
        $data = [
            'status ' => 200,
            "identity"=>"user"
        ];
        $jsonData = json_encode($data);
        $this->VerifyUser->setJson($jsonData);
        $authorized = $this->VerifyUser->isAdmin($jsonData); 
        $this->assertFalse($authorized);
    }
}
