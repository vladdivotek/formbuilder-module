<?php

namespace Modules\FormBuilder\Admin;

use App\Filament\Resources\TranslateResource\RelationManagers\TranslatableRelationManager;
use App\Services\Schema;
use App\Services\TableSchema;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationGroup;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Modules\FormBuilder\Admin\FormBuilderResource\Pages;
use Modules\FormBuilder\Models\FormBuilder;

class FormBuilderResource extends Resource
{
    protected static ?string $model = FormBuilder::class;

    public static function getNavigationGroup(): ?string
    {
        return __('Design/Template');
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getModelLabel(): string
    {
        return __('Form builder');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Form builders');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('tabs')
                    ->columnSpanFull()
                    ->schema([
                        Tabs\Tab::make('general')
                            ->label(__('General'))
                            ->schema([
                                Schema::getName(),
                                TextInput::make('listener')
                                    ->label(__('Listener')),
                                Schema::getToggle('is_modal')
                                    ->label(__('Is modal')),
                                Schema::getStatus()
                            ]),
                        Tabs\Tab::make('form')
                            ->label(__('Form'))
                            ->schema([
                                Schema::getRepeater('data')
                                    ->schema([
                                        Schema::getSelect('type', FormBuilder::TYPES)
                                            ->label(__('Type'))
                                            ->required(),
                                        TextInput::make('label')
                                            ->label(__('Label'))
                                            ->required(),
                                        TextInput::make('placeholder')
                                            ->label(__('Placeholder')),
                                        Schema::getToggle('required')
                                            ->label(__('Required')),
                                    ])
                                    ->formatStateUsing(function ($record) {
                                        return $record->data ?? [];
                                    }),
                                TextInput::make('button')
                                    ->label(__('Button text'))
                            ])
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TableSchema::getName(),
                TableSchema::getStatus(),
                TableSchema::getUpdatedAt()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationGroup::make('Seo and translates', [TranslatableRelationManager::class,]),
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFormBuilders::route('/'),
            'create' => Pages\CreateFormBuilder::route('/create'),
            'edit' => Pages\EditFormBuilder::route('/{record}/edit'),
        ];
    }
}
