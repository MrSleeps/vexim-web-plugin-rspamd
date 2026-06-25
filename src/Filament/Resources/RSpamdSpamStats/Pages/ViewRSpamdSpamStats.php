<?php

namespace VEximweb\Plugin\RSpamd\Filament\Resources\RSpamdSpamStats\Pages;

use VEximweb\Plugin\RSpamd\Filament\Resources\RSpamdSpamStats\RSpamdSpamStatsResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Actions;

class ViewRSpamdSpamStats extends ViewRecord
{
    protected static string $resource = RSpamdSpamStatsResource::class;
    
    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('back')
                ->label('Back')
                ->icon('heroicon-o-arrow-left')
                ->url(RSpamdSpamStatsResource::getUrl('index'))
                ->color('gray'),
        ];
    }
}