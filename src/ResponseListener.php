<?php declare(strict_types=1);

namespace BM\SmartResponse;

use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;

class ResponseListener
{
    /**
     * @var ResponseConverter
     */
    private $converter;

    /**
     * @param ResponseConverter $converter
     */
    public function __construct(ResponseConverter $converter)
    {
        $this->converter = $converter;
    }

    /**
     * @param GetResponseForControllerResultEvent $event
     */
    public function onKernelView(GetResponseForControllerResultEvent $event): void
    {
        $result = $event->getControllerResult();

        if (!$result instanceof ControllerResult) {
            $result = new ControllerResult($result);
        }

        $response = $this->converter->convert($event->getRequest(), $result);

        $event->setResponse($response);
    }
}
