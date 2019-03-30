<?php declare(strict_types=1);

namespace BM\SmartResponse;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface ConvertStrategy
{
    /**
     * @param string $contentType
     * @return bool
     */
    public function supports(string $contentType): bool;

    /**
     * @param ControllerResult $result
     * @param Request $request
     * @return Response
     */
    public function convert(ControllerResult $result, Request $request): Response;
}