@extends('layouts.game')

@section('title')
    Rewards Tracker
@endsection

@section('content')
    <div class="relative p-4" id="rewards-group">
        <div class="">
        </div>
        <div class="relative p-4 bg-gray-100 rounded">
            <div class="flex flex-wrap">
                @foreach($rewards as $reward)
                    @livewire('reward-card', ['reward' => $reward])
                @endforeach
            </div>
        </div>
    </div>
@endsection
