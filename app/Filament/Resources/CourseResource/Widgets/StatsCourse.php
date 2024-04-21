<?php

namespace App\Filament\Resources\CourseResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Course;
use Illuminate\Support\Facades\Log;

class StatsCourse extends BaseWidget
{

    protected static ?int $sort=1;

    public function getColumns(): int
    {
        return 1;
    }
    protected int | string | array $columnSpan=1;

    protected function getStats(): array
    {
        return [
            Stat::make('Active Courses', self::ActiveCourse())
                ->description('32k increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([1, 13, 8, 18, 1, 4, 17])
                ->color('success'),


        ];

    }

    private static function ActiveCourse() :int
    {
        return Course::active()->count();
    }
}
