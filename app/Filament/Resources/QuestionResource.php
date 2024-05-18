<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuestionResource\Pages;
use App\Filament\Resources\QuestionResource\RelationManagers;
use App\Models\Question;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class QuestionResource extends Resource
{
    protected static ?string $model = Question::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Exams & Questions';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
       return self::questionForm($form);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('question'),
                Tables\Columns\TextColumn::make('exam.name'),
                Tables\Columns\ToggleColumn::make('status'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQuestions::route('/'),
            'create' => Pages\CreateQuestion::route('/create'),
            'edit' => Pages\EditQuestion::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function questionForm(Form $form) :Form
    {
        return  $form->schema([ Forms\Components\Section::make('Manage Question')->
        schema([

            Forms\Components\TextInput::make('question')
                ->label('Question')
                ->required(),

            Forms\Components\Select::make('exam')
                ->relationship('exam','name')
                ->required(),

            Forms\Components\Toggle::make('status')
                ->label('Status'),



        ])->columnSpan(2)->columns(2),

           Forms\Components\Section::make('Manage Answers')->
                schema([
                    Forms\Components\Repeater::make('answers')
                        ->relationship()
                        ->schema([
                            Forms\Components\TextInput::make('answer')
                                ->required(),

                            Forms\Components\Checkbox::make('is_correct')
                                ->label('Is This Answer Correct')
                        ])->grid(2)
                        ->defaultItems(4)
                        ->addable(false)
                        ->deletable(false)
                        ->minItems(1)
                        ->maxItems(4)
                ])
          ]);
    }
}
