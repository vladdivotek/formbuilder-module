<?php

namespace Modules\FormBuilder\Admin\FormBuilderResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Modules\FormBuilder\Admin\FormBuilderResource;

class ListFormBuilders extends ListRecords
{
    protected static string $resource = FormBuilderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
