@extends('layout.admin')

@section('title')
Data Karyawan
@endsection
@section('content')
    <h1 class="mt-4">Data Karyawan</h1>
    <a class="btn btn-primary" href="{{ route('karyawan.create') }}">tambah</a>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Nama Karyawan</th>
      <th scope="col">Alamat</th>
      <th scope="col">No Hp</th>
      <th scope="col">Aksi</th>


    </tr>
  </thead>
  <tbody>
    @foreach ($data as $item)
<tr>
 
    <td>
        {{ $item->nama_karyawan}}
    </td>
    <td>
        {{ $item->alamat}}
    </td>
    <td>
        {{ $item->no_hp}}
    </td>
    
    <td>
        <a href="{{route('karyawan.edit',[$item->id]) }}" class="btn btn-success">edit</a>
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
            url: '/karyawan/' + id,
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