<?php
// app/Traits/CompletenessTrait.php

namespace App\Traits;

trait CompletenessTrait
{
    private function calculateCompleteness(...$models)
    {
        $filledFields = 0;
        $totalFields = 0;

        foreach ($models as $model) {
            // Check if $model is not null before proceeding
            if ($model !== null) {
                if (is_array($model)) {
                    foreach ($model as $item) {
                        // Check if $item is not null before proceeding
                        if ($item !== null && is_array($item)) {
                            $filledFields += count(array_filter($item));
                            $totalFields += count($item);
                        }
                    }
                } else {
                    // Handle case where $model is not an array but an Eloquent model
                    $filledFields += count(array_filter($model->getAttributes()));
                    $totalFields += count($model->getAttributes());
                }
            }
        }

        // Calculate percentage
        $completeness = ($totalFields > 0) ? round(($filledFields / $totalFields) * 100) : 0;

        return $completeness;
    }
}
