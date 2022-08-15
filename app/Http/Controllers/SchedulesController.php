<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchedulesStoreRequest;
use App\Http\Requests\SchedulesUpdateRequest;
use App\Http\Requests\ScheduleUpdateRequest;
use App\Models\Block;
use App\Models\Client;
use App\Models\Equipment;
use App\Models\EquipmentUse;
use App\Models\Schedule;
use App\Models\ScheduleStatus;
use App\Services\AddEquipmentInStockService;
use App\Services\RemoveEquipmentInStockService;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class SchedulesController extends Controller
{

    public function index()
    {
        $client = Client::get();
        $schedules = Schedule::get();
        return view('schedule.index', compact('schedules', 'client'));
    }

    public function create(Block $block)
    {
        $schedule = Schedule::all();
        $equipments = Equipment::all();
        $clients = Client::all();
        $blocks = Block::all();

        return view('schedule.create', compact('blocks', 'clients', 'block', 'equipments', 'schedule'));
    }

    public function store(SchedulesStoreRequest $request)
    {
        $formdata = $request->validated();
        $formdata['schedule_status_id'] = ScheduleStatus::first()->id;

        $equipmentsRemoved = app(RemoveEquipmentInStockService::class)->run($formdata['equipments_id'], $formdata['equipment_quantity']);

        if ($equipmentsRemoved == false) {
            return redirect()->back()->withErrors('Você não possui equipamentos disponiveis.');
        }

        Schedule::create($formdata);

        return redirect()->route('schedules.index');
    }

    public function edit($id)
    {
        $schedulesStatus = ScheduleStatus::all();
        $clients = Client::all();
        $blocks = Block::all();

        if (!$schedule = Schedule::find($id))
            return redirect()->route('schedules.index');

        return view('schedule.edit', compact('schedule', 'blocks', 'clients', 'schedulesStatus'));
    }

    public function update(ScheduleUpdateRequest $request, Schedule $schedule)
    {
        $formdata = $request->validated();

        if ($formdata['schedule_status_id'] == 2 || $formdata['schedule_status_id'] == 3) {
            app(AddEquipmentInStockService::class)->run($schedule->equipment_id, $schedule->equipment_quantity);
        }

        $schedule->update($request->validated());

        return redirect()->route('schedules.index');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return redirect()->route('schedules.index');
    }
}