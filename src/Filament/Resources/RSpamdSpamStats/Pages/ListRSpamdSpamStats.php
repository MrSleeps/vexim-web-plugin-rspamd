<?php

namespace VEximweb\Plugin\RSpamd\Filament\Resources\RSpamdSpamStats\Pages;

use VEximweb\Plugin\RSpamd\Filament\Resources\RSpamdSpamStats\RSpamdSpamStatsResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;

class ListRSpamdSpamStats extends ListRecords
{
    protected static string $resource = RSpamdSpamStatsResource::class;
    
    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('refresh')
                ->label('Refresh')
                ->icon('heroicon-o-arrow-path')
                ->action('$this->resetTable()')
                ->color('gray'),
        ];
    }

    public function getTableRecordKey($record): string
    {
        if (is_array($record) || is_object($record)) {
            $domain = is_array($record) ? $record['domain'] : $record->domain;
            $date = is_array($record) ? $record['date'] : $record->date;
            return $domain . '_' . $date;
        }
        return (string) $record;
    }
}