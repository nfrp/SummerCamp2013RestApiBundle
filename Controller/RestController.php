<?php
/**
 * File containing the RestController class.
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace EzSystems\SummerCamp2013RestApiBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use eZ\Bundle\EzPublishCoreBundle\Controller;

class RestController extends Controller
{
    public function test()
    {

        return $this->render(
            'EzSystemsSummerCamp2013RestApiBundle::rest.html.twig',
            array(
                'site_uri' => $this->getRequest()->getUriForPath( '/' ),
                'rest_root' => $this->container->getParameter( 'ezpublish_rest.path_prefix' )
            )
        );

    }
}
