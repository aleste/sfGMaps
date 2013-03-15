<?php

namespace Aleste\MapsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;



class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        
        /** @var Ivory\GoogleMapBundle\Model\Map */
		$map = $this->get('ivory_google_map.map');		
		
		//La Plata
		$map->setCenter(-34.919,-57.954, true);
		$map->setMapOption('zoom', 13);
		$map->setLanguage('es');
		$map->setStylesheetOptions(array(
    		'width' => '500px',
    		'height' => '500px'
		));

		$marker = $this->get('ivory_google_map.marker');		
		$marker->setPrefixJavascriptVariable('marker_');
		$marker->setPosition(-34.919,-57.954, true);
	
		$marker->setOption('clickable', false);
		$marker->setOption('flat', true);
		$marker->setOptions(array(
		    'clickable' => false,
		    'flat' => true
		));


		$marker1 = $this->get('ivory_google_map.marker');
		// Configure your marker options
		$marker1->setPrefixJavascriptVariable('marker_');
		$marker1->setPosition(-34.940,-57.954, true);
		//$marker->setAnimation(Animation::DROP);

		$marker1->setOption('clickable', false);
		$marker1->setOption('flat', true);
		$marker1->setOptions(array(
		    'clickable' => false,
		    'flat' => true
		));

		$map->addMarker($marker);
		$map->addMarker($marker1);

		
        return array('map'=>$map);
    }
}
