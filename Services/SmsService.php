<?php
namespace Modules\Marketplace\Services;

use Modules\Marketplace\Entities\SmsService as SmsServiceModel;

// class SmsService{

//  //class attributes
//     public $user_id;
//     public $current_balance;
//     public $total_balance;

//     public function createSmsService()
//     {
//         return SmsServiceModel::create(
//             [
//                 'user_id'           =>$this->user_id,
//                 'total_balance'     =>$this->total_balance,
//                 'current_balance'   =>$this->current_balance,
//             ]
//         );
//     }

//     public function updateSmsService(SmsServiceModel $smsService)
//     {
//          $smsService->update(
//             [
//                 'user_id'           =>$this->user_id,
//                 'total_balance'     =>$this->total_balance,
//                 'current_balance'   =>$this->current_balance,
//             ]
//         );
//         return SmsServiceModel::find($smsService->id);

//     }

//     /**
//      * @param mixed $user_id
//      */
//     public function setUserID($user_id)
//     {
//         $this->user_id = $user_id;
//         return $this;
//     }

//     public function setCurrentBalance($current_balance)
//     {
//         $this->current_balance = $current_balance;
//         return $this;
//     }

//     public function setTotalBalance($total_balance)
//     {
//         $this->total_balance = $total_balance;
//         return $this;
//     }

// }
