<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FrontendDetailsResource\Pages;
use App\Filament\Resources\FrontendDetailsResource\RelationManagers;
use App\Models\FrontendDetails;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FrontendDetailsResource extends Resource
{
    protected static ?string $model = FrontendDetails::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $group = 'frontend';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('key')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image'),
                Forms\Components\TextInput::make('title')
                    ->maxLength(255),
                Forms\Components\Textarea::make('content'),
                Forms\Components\Toggle::make('active')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('key'),
                Tables\Columns\TextColumn::make('image'),
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('content'),
                Tables\Columns\IconColumn::make('active')
                    ->boolean(),
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
            'index' => Pages\ListFrontendDetails::route('/'),
            'create' => Pages\CreateFrontendDetails::route('/create'),
            'view' => Pages\ViewFrontendDetails::route('/{record}'),
            'edit' => Pages\EditFrontendDetails::route('/{record}/edit'),
        ];
    }
}
