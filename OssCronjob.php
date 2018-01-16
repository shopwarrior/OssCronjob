<?php
namespace OssCronjob;

use Shopware\Components\Plugin\Context\InstallContext;
use Shopware\Components\Plugin\Context\UninstallContext;
use Shopware\Components\Plugin;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Doctrine\ORM\Tools\SchemaTool;
use Shopware\Components\Plugin\Context\ActivateContext;
use Shopware\Components\Plugin\Context\DeactivateContext;

/**
 * Shopware-Plugin OssCronjob.
 */
class OssCronjob extends Plugin
{    
    public static function getSubscribedEvents()
    {
        return array(
            'Enlight_Controller_Front_StartDispatch' => 'onEnlightControllerFrontStartDispatch',
        );
    }

    public function install(InstallContext $context){
        parent::install($context);
    }

    public function uninstall(UninstallContext $context){
        parent::uninstall($context);
    }

    public function activate(ActivateContext $context)
    {
        $context->scheduleClearCache( InstallContext::CACHE_LIST_ALL );
    }

    public function deactivate(DeactivateContext $context)
    {
        $context->scheduleClearCache( InstallContext::CACHE_LIST_ALL );
    }

    public function onEnlightControllerFrontStartDispatch()
    {
        $this->container->get('loader')->registerNamespace('OssCronjob\Components', $this->getPath() . '/Components/');
    }
}
