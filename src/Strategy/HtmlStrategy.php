<?php declare(strict_types=1);

namespace BM\SmartResponse\Strategy;

use BM\SmartResponse\ControllerResult;
use BM\SmartResponse\ConvertStrategy;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HtmlStrategy implements ConvertStrategy
{
    /**
     * @var \Twig_Environment
     */
    private $template;

    /**
     * @param \Twig_Environment $template
     */
    public function __construct(\Twig_Environment $template)
    {
        $this->template = $template;
    }

    /**
     * @param string $contentType
     * @return bool
     */
    public function supports(string $contentType): bool
    {
        return 'text/html' === $contentType;
    }

    /**
     * @param ControllerResult $result
     * @param Request $request
     * @return Response
     */
    public function convert(ControllerResult $result, Request $request): Response
    {
        // TODO: Implement convert() method.
    }
}
