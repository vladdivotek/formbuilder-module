<?php

namespace Modules\FormBuilder\Admin\FormBuilderResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\FormBuilder\Admin\FormBuilderResource;

class EditFormBuilder extends EditRecord
{
    protected static string $resource = FormBuilderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
