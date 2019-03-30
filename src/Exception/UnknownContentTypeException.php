<?php declare(strict_types=1);

namespace BM\SmartResponse;

class UnknownContentTypeException extends \UnexpectedValueException
{
    /**
     * @param string $contentType
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(string $contentType, int $code = 0, Throwable $previous = null)
    {
        parent::__construct('Unknown content type: ' . $contentType, $code, $previous);
    }
}
