@extends('layout.admin')

@section('title')
Data Metode Layanan
@endsection
@section('content')
    <h1 class="mt-4">Data Metode Layanan</h1>
    <a class="btn btn-primary" href="{{ route('metode_layanan.create') }}">tambah</a>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Nama Metode Layanan</th>
      <th scope="col">Harga</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $item)
<tr>
 
    <td>
        {{ $item->nama_metode_layanan}}
    </td>
    <td>
        {{ $item->harga}}
    </td>
   
    
    <td>
        <a href="{{route('metode_layanan.edit',[$item->id]) }}" class="btn btn-success">edit</a>
        <a href="#" onclick="confirmDelete(event, {{ $item->id }})" class="btn btn-danger m-t-5 m-r-5">Hapus</a>

    </td>
    @endforeach
</tr>
  </tbody>
 

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
            url: '/metode_layanan/' + id,
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