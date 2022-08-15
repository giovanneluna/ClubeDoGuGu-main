<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'block_id',
        'client_id',
        'time',
        'endTime',
        'date',
        'total_price',
        'paid_out',
        'schedule_status_id',
    ];
    protected $casts = [
        'start_time' => 'date:hh:mm',
        'end_time' => 'date:hh:mm'
    ];

    public function block()
    {
        return $this->belongsTo(Block::class);
    }
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
    public function schedule_status()
    {
        return $this->belongsTo(ScheduleStatus::class, 'schedule_status_id');
    }
    public function scopeFilterByClient(Builder $builder, $id)
    {
        isset($id) && $builder->where('client_id', $id);
    }
    public function scopeFilterByBlock(Builder $builder, $id)
    {
        isset($id) && $builder->where('block_id', $id);
    }
    public function scopeFilterByDate(Builder $builder, $id)
    {
        isset($id) && $builder->where('date', $id);
    }
    public function scopeFilterByTime(Builder $builder, $id)
    {
        isset($id) && $builder->where('time', $id);
    }
    public function scopeFilterByEndTime(Builder $builder, $id)
    {
        isset($id) && $builder->where('endTime', $id);
    }
    public function scopeFilterByTotalPrice(Builder $builder, $id)
    {
        isset($id) && $builder->where('total_price', $id);
    }
    public function scopeFilterByPaidOut(Builder $builder, $id)
    {
        isset($id) && $builder->where('paid_out', $id);
    }
}