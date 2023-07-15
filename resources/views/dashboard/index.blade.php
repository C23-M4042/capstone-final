@extends('dashboard.layouts.main')

@section('container')

<section class="section dashboard">
  <div class="row">

   <!-- Begin Page Content -->
   <div class="container-fluid">

    <!-- Page Heading -->
    <div class="text-center" style="padding-top: 200px;">
      @if (empty($routine[0]))
          <p class="text-gray-500 mb-0">No Routine</p>
          <p class="text-gray-500 mb-0">Get started by creating a new routine.</p>
          <button type="button" class="btn btn-sm mt-4" style="background-color: #5E63AA; color:#fff;" data-toggle="modal" data-target="#popup">
              + Add New Routine
          </button>
      @else
          <div class="d-flex justify-content-center mb-4">
            @foreach ($routine as $item)
                @php
                    $dateString = $item->start;
                    $date = new DateTime($dateString);
                    $dayName = $date->format('l');
                    $dateFormatted = $date->format('d F Y');
                @endphp
                <div class="routine-card bg-white rounded" style="min-width: 200px;">
                  <div class="title-routine p-2">
                      <p class="text-center mb-0" style="font-weight: 600">{{ $item->name }}</p>
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
              
                
            @endforeach
        </div>
      @endif

        
        <!-- <a  class="btn btn-sm mt-4" style="background-color: #5E63AA; color:#fff;" href="popup.html">+ Add New Routine</a> -->
    </div>
</div>


<!-- Modal Login -->
<div class="modal fade" id="popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
      <form action="/dashboard" method="POST">
      <div class="modal-header">
      <h5 class="modal-title" style="font-weight: 600; color: #5f5c5c;" id="exampleModalLabel">Start Consistency in <span id="consistent">7</span> Day: 
        <input type="date" id="date" name="date" required>
      </h5>
      
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
      </div>
      <div class="modal-body">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
          <input type="hidden" id="hari" name="hari" value="7">

          <div class="form-group">
            <input type="text" class="form-control" name="name" aria-describedby="title" placeholder="Nama Rutinitas">
        </div>
          <div class="form-group">
              <input type="text" class="form-control" name="activity[]" aria-describedby="title" placeholder="Wake up before 8 AM">
          </div>
          <div class="form-group">

              <input type="text" class="form-control" name="activity[]"  aria-describedby="title" placeholder="Add New Routine">
          </div>
          <div class="form-group">

              <input type="text" class="form-control" name="activity[]" aria-describedby="title" placeholder="Add New Routine">
          </div>
          <div class="form-group">
              <input type="text" class="form-control" name="activity[]" aria-describedby="title" placeholder="Add New Routine">
          </div>
          <button type="submit" class="btn btn-warning mt-3">Save</button>
      </form>
  </div>
  </div>
</div>
<!-- End Modal Login -->
</div>

  </div>
</section>
@endsection