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

    protected static ?string $navigationIcon = 'heroicon-o-collection';

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
                Forms\Components\TextInput::make('pobox_one')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('pobox_two')
                    ->maxLength(255),
                Forms\Components\TextInput::make('city_one')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('physical_address_one')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('physical_address_two')
                    ->maxLength(255),
                Forms\Components\TextInput::make('physical_address_three')
                    ->maxLength(255),
                Forms\Components\TextInput::make('city_two')
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
                Forms\Components\DatePicker::make('status')
                    ->required(),
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
                Tables\Columns\TextColumn::make('sector_id'),
                Tables\Columns\TextColumn::make('registration_number'),
                Tables\Columns\TextColumn::make('institution'),
                Tables\Columns\TextColumn::make('region'),
                Tables\Columns\TextColumn::make('pobox_one'),
                Tables\Columns\TextColumn::make('pobox_two'),
                Tables\Columns\TextColumn::make('city_one'),
                Tables\Columns\TextColumn::make('physical_address_one'),
                Tables\Columns\TextColumn::make('physical_address_two'),
                Tables\Columns\TextColumn::make('physical_address_three'),
                Tables\Columns\TextColumn::make('city_two'),
                Tables\Columns\TextColumn::make('manager_name'),
                Tables\Columns\TextColumn::make('manager_phone'),
                Tables\Columns\TextColumn::make('manager_cell'),
                Tables\Columns\TextColumn::make('manager_email'),
                Tables\Columns\TextColumn::make('employee_name'),
                Tables\Columns\TextColumn::make('employee_phone'),
                Tables\Columns\TextColumn::make('employee_cell'),
                Tables\Columns\TextColumn::make('employee_email'),
                Tables\Columns\TextColumn::make('effective_date')
                    ->date(),
                Tables\Columns\TextColumn::make('status')
                    ->date(),
                Tables\Columns\TextColumn::make('created_by'),
                Tables\Columns\TextColumn::make('updated_by'),
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
