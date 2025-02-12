<?php

namespace Keytactic\RadioGroup;

use Composer\InstalledVersions;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Facades\FilamentIcon;
use OutOfBoundsException;

class RadioGroupServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-radio-group';

    public static string $version = 'dev';

    public function configurePackage(Package $package): void
    {
        try {
            static::$version = InstalledVersions::getPrettyVersion('keytactic/filament-radio-group');
        } catch (OutOfBoundsException $e) {
        }

        $package
            ->name(static::$name)
            ->hasViews();
    }

    public function packageBooted(): void
    {
        // Register your views directory
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'filament-radio-group');
    }
}