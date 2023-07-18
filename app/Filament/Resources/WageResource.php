<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WageResource\Pages;
use App\Filament\Resources\WageResource\RelationManagers;
use App\Models\Wage;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Card;

class WageResource extends Resource
{
    protected static ?string $model = Wage::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->columns(1)
                    ->schema([
                Forms\Components\Select::make('grade_id')->relationship('grade', 'name')->required(),
                Forms\Components\Select::make('sector_id')->relationship('sector', 'name')->required(),
                Forms\Components\TextInput::make('title')->label(__('Wage'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('effective_date')
                    ->required(),
                    Forms\Components\TextInput::make('created_by')->disabled()->hiddenOn(Pages\CreateWage::class)
                    ->maxLength(255),
                Forms\Components\TextInput::make('updated_by')->disabled()->hiddenOn(Pages\CreateWage::class)
                    ->maxLength(255),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('grade_id'),
                Tables\Columns\TextColumn::make('sector_id'),
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('effective_date')
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
            'index' => Pages\ListWages::route('/'),
            'create' => Pages\CreateWage::route('/create'),
            'view' => Pages\ViewWage::route('/{record}'),
            'edit' => Pages\EditWage::route('/{record}/edit'),
        ];
    }    
}
