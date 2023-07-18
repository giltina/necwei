<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Filament\Resources\EmployeeResource\RelationManagers;
use App\Models\Employee;
use App\Models\Job;
use App\Models\Grade;
use App\Models\Wage;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Card;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->columns(1)
                    ->schema([
                
                Forms\Components\Select::make('employer_id')->relationship('employer', 'institution')->required(),
                /**Forms\Components\Select::make('job_id')->relationship('job', 'title')->required(),
                Forms\Components\Select::make('grade_id')->relationship('grade', 'name')->required(),
                Forms\Components\Select::make('wage_id')->relationship('wage', 'title')->required(),**/

                Forms\Components\Select::make('grade_id')
                 ->label('Grade')
                 ->options(Grade::all()->pluck('name', 'id')->toArray())
                 ->reactive()
                 ->afterStateUpdated(fn (callable $set) => $set('job_id', null)),

                Forms\Components\Select::make('job_id')
                 ->label('Job')
                 ->options(function (callable $get) {
                $grade = Grade::find($get('grade_id'));
                if (! $grade) {
                      return Job::all()->pluck('title', 'id');
                               }
                return $grade->jobs->pluck('title', 'id');
                 })
                 ->reactive()
                 ->afterStateUpdated(fn (callable $set) => $set('wage_id', null)),

                 Forms\Components\Select::make('wage_id')
                 ->label('Wage')
                 ->options(function (callable $get) {
                $grade = Grade::find($get('grade_id'));
                if (! $grade) {
                      return Wage::all()->pluck('title', 'id');
                               }
                return $grade->wages->pluck('title', 'id');
                 })
                 ->reactive(),

                Forms\Components\TextInput::make('employee_number')
                    ->maxLength(255),
                Forms\Components\TextInput::make('surname')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('first_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('dob')
                    ->required(),
                Forms\Components\TextInput::make('gender')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nationality')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('national_id')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('contribution')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('engagement')
                    ->required(),
                Forms\Components\TextInput::make('contract')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('duration')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('end_contract')
                    ->required(),
                Forms\Components\TextInput::make('employee_status')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('created_by')->disabled()->hiddenOn(Pages\CreateEmployee::class)
                    ->maxLength(255),
                Forms\Components\TextInput::make('updated_by')->disabled()->hiddenOn(Pages\CreateEmployee::class)
                    ->maxLength(255),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('employer_id'),
                Tables\Columns\TextColumn::make('job_id'),
                Tables\Columns\TextColumn::make('grade_id'),
                Tables\Columns\TextColumn::make('wage_id'),
                Tables\Columns\TextColumn::make('employee_number'),
                Tables\Columns\TextColumn::make('surname'),
                Tables\Columns\TextColumn::make('first_name'),
                Tables\Columns\TextColumn::make('dob')
                    ->date(),
                Tables\Columns\TextColumn::make('gender'),
                Tables\Columns\TextColumn::make('nationality'),
                Tables\Columns\TextColumn::make('national_id'),
                Tables\Columns\TextColumn::make('contribution'),
                Tables\Columns\TextColumn::make('engagement')
                    ->date(),
                Tables\Columns\TextColumn::make('contract'),
                Tables\Columns\TextColumn::make('duration'),
                Tables\Columns\TextColumn::make('end_contract')
                    ->date(),
                Tables\Columns\TextColumn::make('employee_status'),
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
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'view' => Pages\ViewEmployee::route('/{record}'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }    
}
