@extends('layout.admin')

@section('title')
Data layanan
@endsection
@section('content')
<h1 class="mt-4">Data layanan</h1>
<a class="btn btn-primary" href="{{ route('layanan.create') }}">tambah</a>

   
<div class="row">     
  @foreach ($data as $item)
  <div class="col-md-6 mb-4"> <!-- Menggunakan grid system -->
      <div class="card shadow-sm h-100"> <!-- Menambahkan shadow dan height 100% agar card memiliki tinggi penuh -->
          <div class="card-body d-flex align-items-start justify-content-between"> <!-- Flexbox untuk menata layout -->
              <!-- Menampilkan thumbnail gambar -->
              <div class="me-3"> <!-- Menambahkan margin kanan untuk gambar -->
                  <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="" width="80" class="rounded"> <!-- Menambahkan kelas rounded -->
              </div>

              <!-- Menampilkan informasi layanan -->
              <div class="flex-grow-1">
                  <h5 class="card-title">{{ $item->nama_layanan }}</h5>
                  <p class="card-text mb-2">
                      Jenis Layanan: <strong>{{ $item->jenis_layanan }}</strong><br>
                      Harga: <strong>{{ $item->harga }}</strong> / 
                      @if ($item->unit == 1)
                          Kg       
                      @else
                          Pcs
                      @endif
                  </p>
              </div>

              <!-- Tombol Pilih -->
              <div>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Pilih
                  </button>
              </div>
          </div>

          <!-- Tombol Edit dan Hapus di bawah -->
          <div class="card-footer text-end"> <!-- Footer untuk tombol Edit dan Hapus -->
              <a href="{{ route('layanan.edit', [$item->id]) }}" class="btn btn-sm btn-success" >Edit</a>
              <a href="#" onclick="confirmDelete(event, {{ $item->id }})" class="btn btn-sm btn-danger">Hapus</a>
          </div>
      </div>
  </div>
  @endforeach
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
            <label class="form-check-label" for="inlineRadio1">Cuci Kering</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
            <label class="form-check-label" for="inlineRadio2">Setrika</label>
        </div>
        <div class="font-900">Tipe Layanan : Reguler</div>
        <div class="font-900">Quantity : </div>

        <div class="font-900">Harga : 9000/kg</div>
        <div class="font-900">Total Harga : 19000</div> 
        total harga quantity*harga 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    function confirmDelete(event, id) {
      event.preventDefault();
      Swal.fire({
        title: 'Are you sure?',
        text: 'You will not be able to recover this record!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          var postForm = {
            '_token': '{{ csrf_token() }}',
            '_method': 'DELETE',
          };
          $.ajax({
              url: '/layanan/' + id,
              type: 'POST',
              data: postForm,
              dataType: 'json',
            })
            .done(function(data) {
              Swal.fire('Deleted!', data['message'], 'success');
              location.reload();
            })
            .fail(function() {
              Swal.fire('Error!', 'An error occurred while deleting the record.', 'error');
            });
        }
      });
    }
  </script>
</table>

@endsection