<?php

namespace Modules\FormBuilder\Admin\FormBuilderResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\FormBuilder\Admin\FormBuilderResource;

class CreateFormBuilder extends CreateRecord
{
    protected static string $resource = FormBuilderResource::class;
}
