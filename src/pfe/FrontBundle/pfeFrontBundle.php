<?php

namespace pfe\FrontBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class pfeFrontBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
