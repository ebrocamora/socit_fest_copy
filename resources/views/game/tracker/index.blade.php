@extends('layouts.game')

@section('title')
    Rewards Tracker
@endsection

@section('content')
    <div class="relative grid md:grid-cols-2 mt-4">
        <!-- Events -->
        <div class="flex-1 mx-2">
            <div class="relative p-4" id="rewards-group">
                <div class="relative mb-4">
                    <span class="font-bold text-2xl">
                        Events
                    </span>
                </div>
                <div class="relative p-4 bg-gray-100 rounded-xl">
                    <div class="flex flex-col">
                        @for($i = 0; $i < 8; $i++)
                            <label for="id-{{$i}}">
                                <div class="relative w-full h-full @if($i < 7)mb-4 @endif rounded-xl transition bg-white flex items-center overflow-x-hidden cursor-pointer hover:ring-2 hover:ring-purple-500">
                                    <div class="flex-none h-full min-h-[6rem] p-4 flex items-center justify-center bg-purple-200">
                                        <img src="{{ asset('logos/APC-MSC.png') }}" class="w-8"/>
                                    </div>
                                    <div class="flex-1 p-4">
                                        <div class="font-bold">
                                            Event Title
                                        </div>
                                        <div class="">
                                            Event Subtitle
                                        </div>
                                    </div>
                                    <div class="flex-none h-full min-h-[6rem] p-6 flex items-center justify-center">
                                        <input type="checkbox" id="id-{{$i}}" class="w-6 h-6 rounded transition text-purple-500 focus:ring-purple-400 cursor-pointer">
                                    </div>
                                </div>
                            </label>
                        @endfor
                    </div>
                </div>
            </div>
        </div>

        <!-- Rewards -->
        <div class="flex-1 mx-2">
            <div class="relative p-4" id="rewards-group">
                <div class="relative mb-4">
                    <span class="font-bold text-2xl">
                        Rewards
                    </span>
                </div>
                <div class="relative p-4 bg-gray-100 rounded-xl">
                    <div class="flex flex-wrap">
                        @foreach($rewards as $reward)
                            @livewire('reward-card', ['reward' => $reward])
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
