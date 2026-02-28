<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Response;

class ApiController extends Controller
{
    protected function success($data = null, string $message = 'Success', int $statusCode = 200): Response
    {
        return Response::make()
            ->json([
                'success' => true,
                'message' => $message,
                'data' => $data
            ], $statusCode);
    }
    
    protected function error(string $message = 'Error', int $statusCode = 400, $errors = null): Response
    {
        $response = [
            'success' => false,
            'message' => $message
        ];
        
        if ($errors !== null) {
            $response['errors'] = $errors;
        }
        
        return Response::make()->json($response, $statusCode);
    }
    
    protected function notFound(string $message = 'Resource not found'): Response
    {
        return $this->error($message, 404);
    }
    
    protected function unauthorized(string $message = 'Unauthorized'): Response
    {
        return $this->error($message, 401);
    }
    
    protected function forbidden(string $message = 'Forbidden'): Response
    {
        return $this->error($message, 403);
    }
    
    protected function validationError(array $errors): Response
    {
        return $this->error('Validation failed', 422, $errors);
    }
}