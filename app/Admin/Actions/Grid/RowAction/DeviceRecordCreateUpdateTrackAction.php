<?php

namespace App\Admin\Actions\Grid\RowAction;

use App\Admin\Forms\DeviceTrackCreateUpdateForm;
use Dcat\Admin\Admin;
use Dcat\Admin\Grid\RowAction;
use Dcat\Admin\Widgets\Modal;

class DeviceRecordCreateUpdateTrackAction extends RowAction
{

    public function __construct($title = null)
    {
        parent::__construct($title);
        $this->title = '👨‍💼 ' . admin_trans_label('Track Create Update');
    }

    /**
     * 渲染模态框
     * @return Modal|string
     */
    public function render()
    {
        if (!Admin::user()->can('device.track.create_update')) {
            return trans('main.unauthorized');
        }

        // 实例化表单类并传递自定义参数
        $form = DeviceTrackCreateUpdateForm::make()->payload(['id' => $this->getKey()]);

        return Modal::make()
            ->lg()
            ->title(admin_trans_label('Track Create Update'))
            ->body($form)
            ->button($this->title);
    }
}