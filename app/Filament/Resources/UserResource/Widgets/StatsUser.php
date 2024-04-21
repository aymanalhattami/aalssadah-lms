<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsUser extends BaseWidget
{

    protected static ?int $sort=3;

    protected int | string | array $columnSpan='full';

    protected function getColumns(): int
    {
        return 1;
    }

    protected function getStats(): array
    {
        return [
        Stat::make('Active Users', self::ActiveCourse())
            ->description('32k increase')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([5, 2, 8, 18, 1, 4, 14])
            ->color('primary'),
    ];

    }

    private static function ActiveCourse() :int
    {
        return User::active()->count();
    }
}
