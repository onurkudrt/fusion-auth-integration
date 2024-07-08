<?php

// src/FusionAuthIntegrationBundle/Controller/AuthController.php

namespace FusionAuthIntegrationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FusionAuthIntegrationBundle\Service\FusionAuthService;

class AuthController extends AbstractController
{
    public function login(Request $request, FusionAuthService $fusionAuth): Response
    {
        // Implement login logic using FusionAuth SDK
        // Example:
        $token = $fusionAuth->login($request->get('email'), $request->get('password'));

        // Return appropriate response (e.g., JSON response)
        return $this->json(['token' => $token]);
    }

    public function logout(Request $request): Response
    {
        // Implement logout logic
        // Example:
        // $this->get('security.token_storage')->setToken(null);
        return $this->json(['message' => 'Logged out successfully']);
    }
}
