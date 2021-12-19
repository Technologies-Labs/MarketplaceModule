<?php


namespace Modules\Marketplace\Enum;

use Modules\MarketplaceModule\Marketplace\GroupMarketplace;
use Modules\MarketplaceModule\Marketplace\SmsMarketplace;
use Modules\MarketplaceModule\Marketplace\SuggestedUsersMarketplace;

class MarketplaceEnum
{
    const SMS_SERVICE       = 'sms-service';
    const GROUP_SERVICE     = 'group-service';
    const SUGGESTED_USERS   = 'suggested-users';

    /**Types */
    const PERIOD            = 'Period';
    const MEASURE           = 'Measure';
    const FOREVER           = 'Forever';

    /**Name */
    const SUBSCRIPTED        = 'subscripted';
    const UNSUBSCRIBED       = 'unsubscribed';
    const UPGRADED           = 'upgraded';

    /**
     * Methods
     */
    const SUBSCRIPE         = 'subscripe';
    const UNSUBSCRIPE       = 'unSubscripe';
    const UPGRADE           = 'upgrade';


    const SERVICES =
    [
        self::SMS_SERVICE,
        self::GROUP_SERVICE,
        self::SUGGESTED_USERS,
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
            self::SMS_SERVICE       => new SmsMarketplace(),
            self::GROUP_SERVICE     => new GroupMarketplace(),
            self::SUGGESTED_USERS   => new SuggestedUsersMarketplace()
        ];

        return $services[$service];
    }
}
