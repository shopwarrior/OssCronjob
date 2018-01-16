<?php

namespace OssCronjob\Subscriber;
use \OssCronjob\Components\SomeHendler as SomeHendler;

class Cronjob implements \Enlight\Event\SubscriberInterface
{
    /**
     * @var null|SomeHendler
     */
    private $hendler = null;

    public static function getSubscribedEvents() {
        return [
            'Shopware_CronJob_OssMyAction' => 'onRunOssMyAction'
        ];
    }

    /**
     * @param \Shopware_Components_Cron_CronJob $job
     * @return bool
     * @throws \Exception
     */
    public function onRunOssMyAction(\Shopware_Components_Cron_CronJob $job)
    {
        $this->xmlProcessor = new SomeHendler();
        echo '<br/><br/>There we can show some content:<br/>';
        $results = $this->hendler->doSync();

        return true;
    }
}
?>