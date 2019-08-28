<?php

namespace AwesomeNova\Features\Mixins;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class KeepOriginalNameMixin
 * @mixin \Laravel\Nova\Fields\File
 */
class KeepOriginalNameMixin
{
    /**
     * Make the field keep the original name and extension of the uploaded file.
     *
     * If a duplicate is found, an underscore separated number is added to the file name.
     * If both keepOriginalName and storeAs are set, the one set later in the chain takes priority.
     *
     * @return \Closure
     */
    public function keepOriginalName()
    {
        return function () {
            return $this->storeAs(function (Request $request) {
                $file = $request->file($this->attribute);
                $fullFileNameWithExtension = $file->getClientOriginalName();
                $originalName = pathinfo($fullFileNameWithExtension, PATHINFO_FILENAME);
                $originalExtension = pathinfo($fullFileNameWithExtension, PATHINFO_EXTENSION);
                $duplicateAppendedKey = 1;
                $fileName = $originalName . '.' . $originalExtension;
                while (Storage::disk($this->disk)->exists(trim($this->storagePath . '/' . $fileName, '/'))) {
                    $fileName = $originalName . '_' . $duplicateAppendedKey . '.' . $originalExtension;
                    $duplicateAppendedKey++;
                }
                return $fileName;
            });
        };
    }
}
