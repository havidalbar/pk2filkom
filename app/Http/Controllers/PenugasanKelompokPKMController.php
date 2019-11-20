<?php

namespace App\Http\Controllers;

use App\KelompokPKM;
use App\PenugasanBeta;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class PenugasanKelompokPKMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penugasans = PenugasanBeta::whereIn('jenis', [8, 9])->withCount(['soal'])->get();
        return view('panel-admin.tugas-kelompok.index', compact('penugasans'));
    }

    public function viewJawaban($slug)
    {
        $penugasan = PenugasanBeta::where('slug', $slug)->with('soal')
            ->whereIn('jenis', [8, 9])
            ->withCount(['soal'])->first();

        if ($penugasan) {
            $kelompoks = KelompokPKM::all();
            switch ($penugasan->jenis) {
                case 8:
                case 9:
                    return view('panel-admin.tugas-kelompok.jawaban.multitext', compact('penugasan', 'kelompoks'));
                default:
                    abort(400);
            }
        } else {
            abort(404);
        }
    }

    public function exportJawaban(Request $request, $slug)
    {
        $penugasan = PenugasanBeta::where('slug', $slug)->with('soal')->withCount(['soal'])->first();

        if ($penugasan) {
            $kelompoks = KelompokPKM::with(['jawaban' => function ($query) use ($penugasan) {
                return $query->whereHas('soal', function ($innerQuery) use ($penugasan) {
                    return $innerQuery->where('id_penugasan', $penugasan->id);
                });
            }])->get();

            switch ($penugasan->jenis) {
                case 8:
                case 9:
                    $spreadsheet = new Spreadsheet();
                    $sheet = $spreadsheet->getActiveSheet();
                    $sheet->setCellValue('A1', 'Kelompok');
                    $sheet->setCellValue('B1', 'Bidang');
                    $sheet->setCellValue('C1', 'NIM');
                    $sheet->setCellValue('D1', 'Nama');

                    $charStart = 'E';
                    foreach ($penugasan->soal as $soal) {
                        $sheet->setCellValue($charStart . '1', $soal->soal);
                        $charStart++;
                    }

                    $kelompok_index = 2;
                    foreach ($kelompoks as $kelompok) {
                        $current_index = $kelompok_index;

                        $sheet->setCellValue('A' . $kelompok_index, $kelompok->nomor);
                        $sheet->setCellValue('B' . $kelompok_index, $kelompok->bidang);
                        if ($kelompok->ketua) {
                            $sheet->setCellValueExplicit('C' . $current_index, $kelompok->ketua->nim, DataType::TYPE_STRING);
                            $sheet->setCellValue('D' . $current_index, $kelompok->ketua->nama);
                            $current_index++;
                        }
                        if ($kelompok->anggota1) {
                            $sheet->setCellValueExplicit('C' . $current_index, $kelompok->anggota1->nim, DataType::TYPE_STRING);
                            $sheet->setCellValue('D' . $current_index, $kelompok->anggota1->nama);
                            $current_index++;
                        }
                        if ($kelompok->anggota2) {
                            $sheet->setCellValueExplicit('C' . $current_index, $kelompok->anggota2->nim, DataType::TYPE_STRING);
                            $sheet->setCellValue('D' . $current_index, $kelompok->anggota2->nama);
                            $current_index++;
                        }

                        $sheet->mergeCells('A' . $kelompok_index . ':A' . ($current_index - 1));
                        $sheet->mergeCells('B' . $kelompok_index . ':B' . ($current_index - 1));

                        $charStart = 'E';
                        foreach ($penugasan->soal as $soal) {
                            $currentJawaban = '-';
                            foreach ($kelompok->jawaban as $jawaban) {
                                if ($jawaban->id_soal == $soal->id) {
                                    $currentJawaban = $jawaban->jawaban;
                                    break;
                                }
                            }
                            $sheet->setCellValue($charStart . $kelompok_index, $currentJawaban);
                            $sheet->mergeCells($charStart . $kelompok_index . ':' . $charStart . ($current_index - 1));
                            $charStart++;
                        }
                        $kelompok_index = $current_index + 1;
                    }

                    $filename = 'jawaban_penugasan_' . $penugasan->slug;

                    $writer = new Xlsx($spreadsheet);
                    // Set the content-type:
                    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                    header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');

                    return $writer->save('php://output'); // download file
                default:
                    abort(400);
            }
        } else {
            abort(404);
        }
    }
}
