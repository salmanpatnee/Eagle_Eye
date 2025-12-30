<?php

namespace App\Exports;

use App\Models\ControlMaster;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithDefaultStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Style;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

// class ControlsExport implements FromQuery, WithHeadings, ShouldAutoSize, WithColumnWidths, WithStyles, WithDefaultStyles, WithEvents
class ControlsExport implements FromView, ShouldAutoSize, WithEvents
{
    protected $controls;

    public function __construct($controls)
    {
        $this->controls = $controls;
    }


    public function registerEvents(): array
    {
        return [

            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getDelegate()->setRightToLeft(true);
            }
        ];
    }

    // public function defaultStyles(Style $defaultStyle): array
    // {
    //     return [
    //         'font' => [
    //             'name' => 'Arial',
    //             'size' => '11'
    //         ],
    //         'alignment' => [
    //             'wrapText' => true,
    //         ],

    //     ];
    // }

    // public function styles(Worksheet $sheet)
    // {
    //     // return [
    //     //     '1' => ['font' => ['bold' => true]]
    //     // ];

    //     $sheet->getStyle('A1')->getFont()->setBold(true);
    // }

    // public function columnWidths(): array
    // {
    //     return [
    //         'A' => 20,
    //         'B' => 20,
    //         'C' => 20,
    //     ];
    // }

    // public function headings(): array
    // {
    //     return [
    //         '#',
    //         'Control ID',
    //         'Control Name',
    //     ];
    // }

    // public function query()
    // {
    //     return ControlMaster::select('id', 'control_id', 'control_name')->where('control_level_title', 'Main Control');
    // }

    /**
     * @return \Illuminate\Support\Collection
     */
    // public function collection()
    // {
    //     return ControlMaster::all();
    // }

    public function view(): View
    {
        $data = ControlMaster::select('id', 'control_id', 'control_name')->where('control_level_title', 'Main Control')->get();

        return view('report-view', compact('data'));
    }



    // public function array(): array
    // {
    //     return $this->controls->toArray();
    // }


}
