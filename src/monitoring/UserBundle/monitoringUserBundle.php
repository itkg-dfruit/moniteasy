<?php

namespace monitoring\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class monitoringUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
