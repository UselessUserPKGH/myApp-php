<?php

class ApiError extends RuntimeException
{
    public function __construct(int $status, string $msg)
    {
        parent::__construct($msg, $status);
    }

    public function getStatusCode(): int
    {
        return $this->code;
    }

    public function sendResponse(): void
    {
        http_response_code($this->getStatusCode());

        $message = $this->getMessage();
        $status = $this->getStatusCode();

        require __DIR__ . "/../public/pages/error.php";
    }

    public static function handle(Throwable $e): void
    {
        $error = $e instanceof self ? $e : new self(500, 'Неожиданная ошибка');

        if ($error->getStatusCode() >= 500) {
            error_log(sprintf(
                "%s: %s in %s:%d\n%s",
                get_class($e),
                $e->getMessage(),
                $e->getFile(),
                $e->getLine(),
                $e->getTraceAsString()
            ));
        }

        $error->sendResponse();
    }
}
