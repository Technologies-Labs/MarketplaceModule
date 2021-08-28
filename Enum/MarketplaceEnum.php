<?php


namespace Modules\MarketPlaceModule\Enum;

use Modules\MarketplaceModule\Marketplace\GroupMarketplace;
use Modules\MarketplaceModule\Marketplace\SmsMarketplace;

class MarketplaceEnum
{
    const SMS_SERVICE       = 'sms-service';
    const GROUP_SERVICE     = 'group-service';

    /**
     * Methods
     */
    const SUBSCRIPE         = 'subscripe';
    const UNSUBSCRIPE       = 'unSubscripe';
    const UPGRADE           = 'upgrade';


    const SERVICES =
    [
        self::SMS_SERVICE,
        self::GROUP_SERVICE
    ];

    const METHODS =
    [
        self::SUBSCRIPE,
        self::UNSUBSCRIPE,
        self::UPGRADE,
    ];

    public static function getServiceClass($service)
    {
        if(!in_array($service, self::SERVICES))
        {
            return null;
        }

        $services =[
            self::SMS_SERVICE   => new SmsMarketplace(),
            self::GROUP_SERVICE => new GroupMarketplace(),
        ];

        return $services[$service];
    }
}
