<?php

namespace VEximweb\Plugin\RSpamd\Filament\Resources\RSpamdSpamStats;

use VEximweb\Plugin\RSpamd\Core\Models\DomainStatsAggregated;
use VEximweb\Plugin\RSpamd\Filament\Resources\RSpamdSpamStats\Pages\ListRSpamdSpamStats;
use VEximweb\Plugin\RSpamd\Filament\Resources\RSpamdSpamStats\Tables\RSpamdSpamStatsTable;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use BackedEnum;
use UnitEnum;

class RSpamdSpamStatsResource extends Resource
{
    protected static ?string $model = DomainStatsAggregated::class;
    
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-chart-bar';
    protected static string|UnitEnum|null $navigationGroup = 'Reports & Analytics';
    
    protected static ?string $navigationLabel = 'Spam Statistics';
    protected static ?int $navigationSort = 1;
    protected static ?string $slug = 'rspamd-spam-stats';
    
    public static function table(Table $table): Table
    {
        $tableBuilder = new RSpamdSpamStatsTable();
        return $tableBuilder->table($table);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => ListRSpamdSpamStats::route('/'),
        ];
    }
    
    public static function getPluralLabel(): string
    {
        return 'Spam Statistics';
    }
    
    public static function getLabel(): string
    {
        return 'Spam Statistics';
    }
}