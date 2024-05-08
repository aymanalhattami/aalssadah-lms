<?php

namespace App\Filament\Resources\LessonResource\Widgets;

use App\Models\Lesson;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;

class StatsLesson extends BaseWidget
{
    use HasWidgetShield;
    protected static ?int $sort=2;

   protected function getColumns(): int
   {
       return 1;
   }

    protected int | string | array $columnSpan=1;


    protected function getStats(): array
    {
        return [
                Stat::make('Active Lessons', self::ActiveCourse())
                ->description('32k increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([5, 2, 8, 3, 15, 7, 1])
                ->color('info')
        ];
    }

    private static function ActiveCourse() :int
    {
        return Lesson::active()->count();
    }
}
