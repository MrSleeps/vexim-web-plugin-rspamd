<?php

namespace VEximweb\Plugin\RSpamd;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Illuminate\Support\Facades\File;
use VEximweb\Plugin\RSpamd\Filament\Resources\RSpamdSpamStats\RSpamdSpamStatsResource;

class RSpamdPlugin implements Plugin
{
    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());
        return $plugin;
    }       
    
    public function getId(): string
    {
        return 'rspamd-plugin';
    }

    public function register(Panel $panel): void
    {
        // Register the Group resource
        $panel->resources([
            RSpamdSpamStatsResource::class,
        ]);
        
        $widgetPath = __DIR__ . '/Filament/Widgets';
        if (is_dir($widgetPath)) {
            $widgetClasses = $this->discoverWidgets($widgetPath);
            $panel->widgets($widgetClasses);
        }        
    }

    public function boot(Panel $panel): void
    {
        // Any boot logic
    }
    
    
    protected function discoverWidgets(string $path): array
    {
        $widgets = [];
        $files = File::allFiles($path);
        
        foreach ($files as $file) {
            $class = 'VEximweb\\Plugin\\RSpamd\\Filament\\Widgets\\' . $file->getFilenameWithoutExtension();
            if (class_exists($class)) {
                $widgets[] = $class;
            }
        }
        
        return $widgets;
    }    
}
