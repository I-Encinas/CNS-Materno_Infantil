<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SupplyResource\Pages;
use App\Filament\Resources\SupplyResource\RelationManagers;
use App\Models\Supply;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Database\Eloquent\SoftDeletingScope;
use PhpParser\Node\Expr\PostDec;
use PhpParser\Node\Expr\PostInc;

class SupplyResource extends Resource
{
    protected static ?string $model = Supply::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('category_id')
                    ->relationship(name:'category',titleAttribute:'name')
                    ->required()
                    ->preload()
                    // ->options(User::all()->pluck('name', 'id'))
                    ->searchable('name'),
                Forms\Components\Select::make('management_unit_id')
                    ->relationship(name:'management_unit',titleAttribute:'name')
                    ->required()
                    ->preload()
                    //  ->options(User::all()->pluck('name', 'id'))
                    ->searchable('name'),
                Forms\Components\TextInput::make('code')
                    ->required()
                    ->maxLength(20),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(30),
                Forms\Components\TextInput::make('unit_price')
                    ->required()
                    ->numeric()
                    ->default(1.00),
                    Forms\Components\TextInput::make('image')
                    ->prefix('https')
                    ->suffix('png/jpg')
                    ->required()
                    ->default(1.00),
                // Group::make()
                // ->schema([
                //     // Forms\Components\Section::make('image')
                //     // ->schema([
                //         FileUpload::make('image')
                //         ->image()
                //         // ->imageEditor()
                //         // ->avatar()
                //         ->imageEditor()    
                //         // ->removeUploadedFileButtonPosition('right')
                //         // ->uploadButtonPosition('left')
                //         // ->uploadProgressIndicatorPosition('left')

                //     ])
                    
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('management_unit.name')
                    // ->getValue(fn ($record) => $record->managementUnit->name) // Obtener el nombre de la gestión de unidades
                    // ->relationship('managementunit', 'name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('unit_price')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('image')
                // ->defaultImageUrl(url('/images/placeholder.png'))
                    ->visibility('private')
                    ->width('80%')
                    ->height('auto')
                ,
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // SelectFilter::make('category_id')
                // ->relationship('category', 'name', fn (Builder $query) => $query->withTrashed())                    
                
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListSupplies::route('/'),
            'create' => Pages\CreateSupply::route('/create'),
            // 'view' => Pages\ViewSupply::route('/{record}'),
            'edit' => Pages\EditSupply::route('/{record}/edit'),
        ];
    }    
}
