<?php
 
namespace App\Filament\Widgets;
 
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;
 
class CalendarWidget extends FullCalendarWidget
{
 
    public function getViewData(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Ya sirve!',
                'start' => now()
            ],
        ];
    }
}