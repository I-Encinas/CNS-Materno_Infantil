<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderIResource\Pages;
use App\Filament\Resources\OrderIResource\RelationManagers;
use App\Models\Order;
use App\Models\OrderI;
use Filament\Forms;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class OrderIResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $label = 'Internal Orders';
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', Auth::user()->id)->where('order_type_id', 2);
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\Select::make('user_id')
                //     ->relationship(name:'user',titleAttribute:'name')
                //     ->required()
                //     ->searchable()
                //     ->preload(),
                // Forms\Components\Select::make('order_type_id')
                //     ->relationship(name:'ordertypes',titleAttribute:'name')
                //     ->required()
                //     ->searchable()
                //     ->preload(),
                // Forms\Components\Toggle::make('status')
                //     ->required(),
                Forms\Components\DateTimePicker::make('date_o')
                    ->label('Date')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order_type_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
                Tables\Columns\TextColumn::make('date_o')
                    ->label('Date')
                    ->dateTime()
                    ->sortable(),
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
                //
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
            'index' => Pages\ListOrderIS::route('/'),
            'create' => Pages\CreateOrderI::route('/create'),
            'view' => Pages\ViewOrderI::route('/{record}'),
            'edit' => Pages\EditOrderI::route('/{record}/edit'),
        ];
    }    
}
