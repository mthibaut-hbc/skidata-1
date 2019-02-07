<?php

declare(strict_types=1);

namespace Skidata\Dta;

use LogicException;
use Skidata\Dta\Feature\RequestInterface;

final class MissingEndpointException extends LogicException
{
    public function __construct(RequestInterface $request)
    {
        parent::__construct(
            sprintf('For the request class %s is missing endpoint.', get_class($request))
        );
    }
}
