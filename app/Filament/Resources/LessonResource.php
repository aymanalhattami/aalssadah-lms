<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LessonResource\Pages;
use App\Models\Lesson;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;


class LessonResource extends Resource
{
    protected static ?string $model = Lesson::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard';

    protected static ?string $navigationGroup = 'Courses';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
       return self::lessonForm($form);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('course.name'),
                Tables\Columns\IconColumn::make('is_free')->boolean()
                ->trueIcon('heroicon-s-tv')
                    ->trueColor('success')
                ->falseIcon('heroicon-o-currency-dollar')
                ->falseColor('danger'),
                Tables\Columns\IconColumn::make('status')->boolean(),
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
            'index' => Pages\ListLessons::route('/'),
            'create' => Pages\CreateLesson::route('/create'),
            'edit' => Pages\EditLesson::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function lessonForm(Form $form) :Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Manage Lesson')->
                schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ,

                Forms\Components\Select::make('course_id')
                    ->relationship('course','name')
                    ->required(),

                Forms\Components\Toggle::make('is_free')
                    ->label('Is Free')
                    ->helperText('Enable if the Course is Free'),

                Forms\Components\Toggle::make('status')
                    ->label('Status')
                    ->helperText('Enable if the Course is Active'),

                Forms\Components\MarkdownEditor::make('content')
                    ->columnSpanFull(),

                Forms\Components\Select::make('user_id')
                    ->multiple()
                    ->relationship('users','name')
                ->columnSpan(1),



                Forms\Components\FileUpload::make('video')
                    ->directory('Lesson-attachment')
                    ->required(),


                ])->columnSpan(2)->columns(2),
            ]);
    }
}
