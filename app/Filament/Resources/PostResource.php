<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-list-bullet';

    protected static ?string $navigationGroup = 'BLOG';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('published_at'),
                    
                Wizard::make([
                    Wizard\Step::make('Title Details')
                        ->schema([
                            Forms\Components\TextInput::make('title')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\Select::make('category_id')
                                ->relationship('category', 'title')
                                ->required(),
                            Forms\Components\Textarea::make('description')
                                ->required()
                                ->rows(10)
                                ->maxLength(65535),
                            Forms\Components\SpatieMediaLibraryFileUpload::make('thumbnail')
                                ->directory('thumbnails')
                                ->collection('thumbnail')
                                ->panelAspectRatio('16:9'),
                        ])
                        ->icon('heroicon-o-adjustments-horizontal')
                        ->columns(2),
                    Wizard\Step::make('Content')
                        ->schema([
                            Forms\Components\MarkdownEditor::make('body')
                                ->hiddenLabel()
                                ->fileAttachmentsDirectory('post-images')
                                ->required(),
                        ])
                        ->icon('heroicon-o-newspaper'),
                    Wizard\Step::make('Meta Info')
                        ->schema([
                            Forms\Components\TagsInput::make('keywords')
                                ->placeholder('New Keyword'),
                            Forms\Components\Select::make('tags')
                                ->relationship('tags', 'name')
                                ->preload()
                                ->multiple()
                                ->required(),
                        ])
                        ->icon('heroicon-o-globe-alt'),
                ])
                    ->skippable()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('thumbnail')
                    ->collection('thumbnail'),
                Tables\Columns\TextColumn::make('title')
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.title')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('read_time')
                    ->icon('heroicon-o-clock')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Status')
                    ->getStateUsing(fn (Post $post) => $post->published_at == null ? 'draft' : 'published')
                    ->color(fn (Post $post) => $post->published_at == null ? 'warning' : 'success')
                    ->badge()
                    ->sortable(),
                Tables\Columns\TextColumn::make('published_at')
                    ->dateTime('D, F j, Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('D, F j, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('D, F j, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('Preview')
                    ->hiddenLabel()
                    ->icon('heroicon-o-eye')
                    ->url(fn (Post $record) => route('post.show', $record))
                    ->openUrlInNewTab(),
                Tables\Actions\EditAction::make()->hiddenLabel(),
                Tables\Actions\DeleteAction::make()->hiddenLabel(),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
