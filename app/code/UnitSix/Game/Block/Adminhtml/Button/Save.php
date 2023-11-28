<?php

namespace UnitSix\Game\Block\Adminhtml\Button;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Magento\Ui\Component\Control\Container;

class Save extends Generic implements ButtonProviderInterface
{
    public function getButtonData()
    {
        return [
            'label' => __('Save & Close'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => [
                    'buttonAdapter' => [
                        'actions' => [
                            [
                                'targetName' => 'customadmin_create_form.customadmin_create_form',
                                'actionName' => 'save',
                                'params' => [
                                    true,
                                    [
                                        'back' => 'close',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            'class_name' => Container::SPLIT_BUTTON,
            // 'options' => $this->getOptions(),
        ];
    }
    // protected function getOptions()
    // {
    //     $options[] = [
    //         'id_hard' => 'save_and_new',
    //         'label' => __('Save & New'),
    //         'data_attribute' => [
    //             'mage-init' => [
    //                 'buttonAdapter' => [
    //                     'actions' => [
    //                         [
    //                             'targetName' => 'customadmin_create_form.customadmin_create_add',
    //                             'actionName' => 'save',
    //                             'params' => [
    //                                 true,
    //                                 [
    //                                     'back' => 'add',
    //                                 ],
    //                             ],
    //                         ],
    //                     ],
    //                 ],
    //             ],
    //         ],
    //     ];
    //     $options[] = [
    //         'id_hard' => 'save_and_close',
    //         'label' => __('Save & Close'),
    //         'data_attribute' => [
    //             'mage-init' => [
    //                 'buttonAdapter' => [
    //                     'actions' => [
    //                         [
    //                             'targetName' => 'customadmin_create_form.customadmin_create_add',
    //                             'actionName' => 'save',
    //                             'params' => [
    //                                 true,
    //                                 [
    //                                     'back' => 'close',
    //                                 ],
    //                             ],
    //                         ],
    //                     ],
    //                 ],
    //             ],
    //         ],
    //     ];
    //     return $options;
    // }
}