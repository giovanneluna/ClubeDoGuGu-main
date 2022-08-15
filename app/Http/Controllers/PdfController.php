<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\Client;
use App\Models\Equipment;
use App\Models\Schedule;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use PDF;


class PdfController extends Controller
{
    public function geraPdf(Request $request)
    {

        $schedules = Schedule::filterByClient($request->client_id)
            ->filterByBlock($request->block_id)
            ->filterByDate($request->date)
            ->filterByTime($request->time)
            ->filterByEndTime($request->endTime)
            ->filterByTotalPrice($request->total_price)
            ->filterByPaidOut($request->paid_out)
            ->get();


        $pdf = FacadePdf::loadView('pdf', compact('schedules',));

        return $pdf->setPaper('a4')->stream('Agendamentos.pdf');
    }

    public function onlySchedulePdf($id)
    {
        $schedule = Schedule::find($id);

        $pdf = FacadePdf::loadView('onlypdf', compact('schedule'));

        return $pdf->setPaper('a4')->stream('Agendamento.pdf');
    }
}