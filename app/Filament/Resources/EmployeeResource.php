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
use Filament\Forms\Components\Select;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Rocords Entry';

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

                Forms\Components\TextInput::make('employee_number')->disabled()->hiddenOn(Pages\CreateEmployee::class)
                    ->maxLength(255),
                Forms\Components\TextInput::make('surname')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('first_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('dob')->label(__('Date of Birth'))
                    ->required(),
                Forms\Components\Select::make('gender')
                ->options([
                    'Male' => 'Male',
                    'Female' => 'Female',
                ])->required(),
                Forms\Components\TextInput::make('nationality')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('national_id')->label(__('I.D Number'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('contribution')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('engagement')
                    ->required(),
                Forms\Components\Select::make('contract')
                ->options([
                    'Permanent' => 'Permanent',
                    'Fixed term' => 'Fixed term',
                    'Casual' => 'Casual',
                    'Short Time' => 'Short Time',
                    'Part Time' => 'Part Time',
                ])->required(),
                Forms\Components\TextInput::make('duration')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('end_contract')
                    ->required(),
                Forms\Components\Select::make('employee_status')
                ->options([
                    'Active' => 'Active',
                    'Resigned' => 'Resigned',
                    'Dismissed' => 'Dismissed',
                    'Retired' => 'Retired',
                    'Deceased' => 'Deceased',
                    'Retrenched' => 'Retrenched',
                ])->required(),
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
                Tables\Columns\TextColumn::make('employee_number')->searchable(),
                Tables\Columns\TextColumn::make('surname')->searchable(),
                Tables\Columns\TextColumn::make('first_name')->searchable(),
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
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'view' => Pages\ViewEmployee::route('/{record}'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }    
}
