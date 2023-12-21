@extends('layouts.app')

@section('title')
    Departure Schedule
@endsection

@section('content')
    
    <header class="bg-[#1c8f36] font-semibold text-white">
    <img src="{{ asset('img/logo.png') }}" class=" w-96  absolute -top-28 -left-44 opacity-60" alt="">

    <div class="flex py-8 pl-24 pr-14 items-center font-medium">
        <h1 class="mr-auto text-5xl z-20">Departure Flight</h1>
        <h3 class="mr-10 text-xl z-20">{{ $date }}</h3>
        <h2 class="text-5xl z-20 ">{{ $time }}</h2>
    </div>

    <img src="{{ asset('img/logo.png') }}" class=" w-72  absolute top-10 right-0 opacity-60" alt="">
</header>

<section class="relative overflow-x-auto">
    <table class="w-full text-left rtl:text-right text-black font-medium">
        <thead class=" text-gray-100 capitalize text-xl bg-[#0a4580]">
            <tr>
                <th scope="col" class="pl-24">
                    Airline
                </th>
                <th scope="col" class="py-4">
                    Flight
                </th>
                <th scope="col" class="py-4">
                    Destination
                </th>
                <th scope="col" class="py-4 pr-44">
                    Time
                </th>
            </tr>
        </thead>
        

        <tbody class="text-xl  uppercase">
            @foreach ($departures as $data)

                <tr class="bg-white border-b

                    @if ($data->id_penerbangan == 'GA-291')
                        @php
                            $currentDay = date('N'); 
                            $allowedDays = [1, 3, 5, 6, 7]; 
                        @endphp

                        @if (!in_array($currentDay, $allowedDays)) 

                            {{ 'hidden '}}

                        @endif
                        
                    @endif ">
                    <th scope="row" class="pl-20 font-medium text-gray-900 whitespace-nowrap">
                        <img src="
                            @if ($data->nama_maskapai == 'Citilink') 
                                {{asset('img/QG.png')}}
                            @elseif ($data->nama_maskapai == 'Garuda Indonesia')
                                {{asset('img/GA.png')}}
                            @else 
                                {{asset('img/ID.png')}}
                            @endif
                            " class="w-[12rem]">
                    </th>
                    <td class="">
                        {{ $data->id_penerbangan }}
                    </td>
                    <td class="text-blue-800">
                        {{ $data->tujuan }}
                    </td>
                    <td class="text-blue-800">
                        @php
                        $formattedTime = date('H:i', strtotime($data->waktu));
                        echo $formattedTime;
                        @endphp
                    </td>
                </tr>   

            @endforeach
        </tbody>
    </table>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection