<?php

namespace App\Transformers;

use Illuminate\Support\Facades\Storage;
use Spatie\LaravelData\Support\DataProperty;
use Spatie\LaravelData\Transformers\Transformer;

class FilePathTransformer implements Transformer
{
    public function transform(DataProperty $property, mixed $value): ?string
    {
        if (is_null($value)) {
            return null;
        }

        return filter_var($value, FILTER_VALIDATE_URL)
            ? $value
            : Storage::url($value);
    }
}
