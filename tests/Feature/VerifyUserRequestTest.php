<?php

namespace Tests\Feature;
use App\Http\Requests\VerifyUserRequest;
use App\Http\Controllers\AuthController;
use Tests\TestCase;

class VerifyUserRequestTest extends TestCase
{
    protected $VerifyUser;

    public function setUp(): void
    {
        parent::setUp();
        $authController = new AuthController(); 
        $this->VerifyUser = new VerifyUserRequest($authController);
    }
    public function testAuthorizationAsUser()
    {
        $data = [
            'status ' => 200,
            "identity"=>"user"
        ];
        $jsonData = json_encode($data);
        $this->VerifyUser->setJson($jsonData);
        $authorized = $this->VerifyUser->isUser($jsonData); 
        $this->assertTrue($authorized);
    }

    public function testAuthorizationAsNonUser()
    {
        $data = [
            'status ' => 200,
            "identity"=>"admin"
        ];
        $jsonData = json_encode($data);
        $this->VerifyUser->setJson($jsonData);
        $authorized = $this->VerifyUser->isUser($jsonData); 
        $this->assertFalse($authorized);
    }
}
