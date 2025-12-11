<?php

namespace App\Exports;

use App\Models\ImportMapping;
use Maatwebsite\Excel\Concerns\FromArray;

class MappingTemplateExport implements FromArray
{
    public function __construct(private ImportMapping $mapping)
    {
    }

    public function array(): array
    {
        return [
            [
                $this->mapping->left_entity_label,
                $this->mapping->right_entity_label,
            ],
        ];
    }
}
