<?php

class ApiError {
    private $status;
    private $msg;
    public function __construct(int $status, string $msg)
    {
        $this->status = $status;
        $this->msg = $msg;
    }
}