<?php declare(strict_types=1);

namespace BM\SmartResponse\Strategy;

use BM\SmartResponse\ControllerResult;
use BM\SmartResponse\ConvertStrategy;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class JsonStrategy implements ConvertStrategy
{
    /**
     * @param string $contentType
     * @return bool
     */
    public function supports(string $contentType): bool
    {
        return 'application/json' === $contentType;
    }

    /**
     * @param ControllerResult $result
     * @param Request|null $request
     * @return Response
     */
    public function convert(ControllerResult $result, Request $request): Response
    {
        // TODO: Implement convert() method.
    }
}
