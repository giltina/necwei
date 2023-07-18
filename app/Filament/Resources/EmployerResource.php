<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployerResource\Pages;
use App\Filament\Resources\EmployerResource\RelationManagers;
use App\Models\Employer;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Card;

class EmployerResource extends Resource
{
    protected static ?string $model = Employer::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?string $navigationGroup = 'Rocords Entry';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->columns(1)
                    ->schema([

                
                Forms\Components\Select::make('sector_id')->relationship('sector', 'name')->required(),
                Forms\Components\TextInput::make('registration_number')->disabled()->hiddenOn(Pages\CreateEmployer::class)
                    ->maxLength(255),
                Forms\Components\TextInput::make('institution')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('region')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('pobox_one')->label(__('Postal Box Address 1'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('pobox_two')->label(__('Postal Box Address 2'))
                    ->maxLength(255),
                Forms\Components\TextInput::make('city_one')->label(__('City/Town'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('physical_address_one')->label(__('Physical Address 1'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('physical_address_two')->label(__('Physical Address 2'))
                    ->maxLength(255),
                Forms\Components\TextInput::make('physical_address_three')->label(__('Physical Address 3'))
                    ->maxLength(255),
                Forms\Components\TextInput::make('city_two')->label(__('City/Town'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('manager_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('manager_phone')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('manager_cell')
                    ->maxLength(255),
                Forms\Components\TextInput::make('manager_email')
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('employee_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('employee_phone')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('employee_cell')
                    ->maxLength(255),
                Forms\Components\TextInput::make('employee_email')
                    ->email()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('effective_date')
                    ->required(),
                    Forms\Components\Select::make('status')
                    ->options([
                        'Active' => 'Active',
                        'Frozen' => 'Frozen',
                        'Exempted' => 'Exempted',
                    ])->required(),
                    Forms\Components\TextInput::make('created_by')->disabled()->hiddenOn(Pages\CreateEmployer::class)
                    ->maxLength(255),
                Forms\Components\TextInput::make('updated_by')->disabled()->hiddenOn(Pages\CreateEmployer::class)
                    ->maxLength(255),

                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('registration_number')->searchable(),
                Tables\Columns\TextColumn::make('institution')->searchable(),
                Tables\Columns\TextColumn::make('created_by'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmployers::route('/'),
            'create' => Pages\CreateEmployer::route('/create'),
            'view' => Pages\ViewEmployer::route('/{record}'),
            'edit' => Pages\EditEmployer::route('/{record}/edit'),
        ];
    }    
}
