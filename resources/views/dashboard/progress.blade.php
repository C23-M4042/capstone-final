@extends('dashboard.layouts.main')

@section('container')
<section class="section dashboard">
    <div class="row min-vh-100 p-4" style="margin-top: 60px;">
        <div class="col-12">
            <div class="d-flex w-full justify-content-center gap-3">
                @foreach ($routine as $item)
                    @php
                        $dateString = $item->start;
                        $date = new DateTime($dateString);
                        $dayName = $date->format('l');
                        $dateFormatted = $date->format('d F Y');
                    @endphp
                    <a href="{{ $item->id }}">
                        <div class="routine-card bg-white rounded" style="min-width: 200px">
                            <div class="title-routine p-2">
                                <p class="text-center mb-0" style="font-weight: 600; color:black;">{{ $item->name }}</p>
                                <div class="badge btn-info d-flex justify-content-center">{{"$dayName, $dateFormatted"}}</div>
                                <form class="mt-2" action="{{ route('dashboard.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data?')">
                                    @csrf
                                    @method('DELETE')
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="badge btn-danger">Delete</button>
                                    </div>
                                </form>                               
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            @php
            
                $now = new DateTime();
                $dayName = $now->format('l');
                $dateFormatted = $now->format('d F Y');
            @endphp

            <div class="d-flex w-full justify-content-center gap-3 mt-5">
                <div class="routine-card bg-white rounded p-3">
                    <div class="row">
                        <div class="col-12">
                            <p class="text-center mb-0" style="font-weight: 600">Today </p>
                            <div class="d-flex justify-content-center m-1">
                                <div class="badge btn-secondary">{{ $dayName }}, {{ $dateFormatted }}</div>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="activity">
                                <p class="text-center mb-0" style="font-weight: 600;">Routinity</p>
                               
                                @foreach ($activity as $item)
                                    <div class="activity-item d-flex mt-2 align-items-center justify-content-between" style="padding: 8px 6px; border-radius: 12px; border: 1px solid #F24E1E; ">
                                        <img class="activities" src="{{ asset('images/mdi_checkbox-blank-circle-outline.svg') }}" alt="SVG Image">
                                        <span class="activity-name">{{$item[0]['activity']}}</span>
                                        <img src="{{ asset('images/bi_three-dots-vertical.svg') }}" alt="SVG Image">
                                        <input type="hidden" class="activity-id" value="{{$item[0]['id']}}">
                                        <input type="hidden" class="routine-id" value="{{$routine[0]->id}}">
                                    </div>
                                @endforeach
                            </div>

                            <div class="complated">
                                <p class="text-center mb-0 mt-4" style="font-weight: 600;">Complete</p>
                                @foreach ($completed as $item)
                                <div class="d-flex mt-2 align-items-center justify-content-between" style="padding: 8px 6px; border-radius: 12px; border: 1px solid #B9AEAE; color: #B9AEAE; display: none;">
                                        <img src="{{ asset('images/eva_checkmark-circle-2-fill.svg') }}" alt="SVG Image">
                                        <span class="activity-name">{{$item[0]['activity']}}</span>
                                        <img src="{{ asset('images/bi_three-dots-verticala.svg') }}" alt="SVG Image">
                                    </div>
                                @endforeach     
                            </div>                           
                            
                        </div>
                    </div>
                </div>
                <div class="routine-card bg-white rounded p-3">
                    <div class="row">
                        <div class="col-12">
                            <p class="text-center mb-0" style="font-weight: 600">Progress</p>
                            <div class="d-flex justify-content-center m-1">
                                <div class="badge btn-secondary">{{ $dayName }}, {{ $dateFormatted }}</div>
                            </div>
                        </div>
                        <div class="progre mt-4" >
                            @foreach ($routine[0]->activities as $index => $item)
                                @php
                                    $jumlahHariDicari = $item->progress;
                                    $totalHari = $routine[0]->hari;

                                    $persentase = ($jumlahHariDicari / $totalHari) * 100;
                                    $persentase = round($persentase, 0);
                                    $persen = $persentase . "%"
                                @endphp
                                <p class="text-start mb-0 mt-2" style="font-weight: 500;">{{$item->activity}}</p>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-{{$index+1}}" role="progressbar" style="width: {{$persen}};" aria-valuenow="{{$persentase}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection