<?php declare(strict_types=1);

namespace BM\SmartResponse;

use Symfony\Component\HttpFoundation\Response;

class ControllerResult
{
    /**
     * @var mixed
     */
    private $content;

    /**
     * @var int
     */
    private $status;

    /**
     * @param mixed $content
     * @param int $status
     */
    public function __construct($content = '', int $status = Response::HTTP_OK)
    {
        $this->content = $content;
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }
}