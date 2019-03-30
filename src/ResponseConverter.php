<?php declare(strict_types=1);

namespace BM\SmartResponse;

use Symfony\Component\HttpFoundation\AcceptHeader;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ResponseConverter
{
    /**
     * @var ConvertStrategy[]
     */
    private $strategies;

    /**
     * @param ConvertStrategy ...$strategies
     */
    public function __construct(ConvertStrategy ...$strategies)
    {
        $this->strategies = $strategies;
    }


    /**
     * @param string $contentType
     * @param ConvertStrategy $strategy
     */
    public function addStrategy(string $contentType, ConvertStrategy $strategy)
    {
        $this->strategies[$contentType] = $strategy;
    }

    /**
     * @param Request $request
     * @param ControllerResult $result
     * @return Response
     */
    public function convert(Request $request, ControllerResult $result): Response
    {
        $acceptHeader = AcceptHeader::fromString($request->headers->get('Accept'));

        $strategy = $this->findBestStrategy($acceptHeader);

        return $strategy->convert($result, $request);
    }

    /**
     * @param AcceptHeader $acceptHeader
     * @return ConvertStrategy
     */
    protected function findBestStrategy(AcceptHeader $acceptHeader): ConvertStrategy
    {
        $contentType = $acceptHeader->first()['value'];

        foreach ($this->strategies as $strategy) {
            if ($strategy->supports($contentType)) {
                return $strategy;
            }
        }

        throw new \UnknownContentTypeException($contentType);
    }
}
