<?php

namespace App\DTOs;

class ApiResponseDTO
{
    public int $code;
    public string $message;
    public mixed $data;

    public function __construct(
        int $code,
        string $message,
        mixed $data = null
    ) {
        $this->code = $code;
        $this->message = $message;
        $this->data = $data;
    }

    public function toArray(): array
    {
        return [
            'code' => $this->code,
            'message' => $this->message,
            'data' => $this->data
        ];
    }
}