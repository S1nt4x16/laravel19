<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BELAJAR CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    
    <a href="{{ url('/post/create') }}">CREATE</a>
<table class="table table-hover">
<thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Judul</th>
        <th>Isi</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    @php
    $no = 1;    
    @endphp
    @foreach ($dashboard as $d)
    <tr>
        <td>{{ $no++ }}</td>
        <td>{{ $d->name }}</td>
        <td>{{ $d->judul }}</td>
        <td>{{ $d->isi }}</td>
        <td>
            <a href="{{ url('/post/edit/'.$d->id) }}" class="btn btn-success">Edit</a>
            <button type="button" class="btn btn-danger" data-coreui-toggle="modal" data-coreui-target="#hapus" data-coreui-name="{{ $d->name }}" data-coreui-url="{{ url('post/delete/'.$d->id) }}">Delete</button>
        </td>
    </tr>
    @endforeach
</tbody>
</table>

<div class="modal fade" id="hapus" tabindex="-1" aria-labelledby="exampleModalLabel" 
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-coreui-dismiss="modal" 
            aria-label="Close"></button>
        </div>
        <form action="" method="post" id="form-hapus">
            @csrf
            @method('delete')
            <div class="modal-body">
                <p id="tanya"></p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" 
                    data-coreui-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Yes</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    const hapus = document.getElementById('hapus')
    hapus.addEventListener('show.coreui.modal', event => {
      const button = event.relatedTarget
      const name = button.getAttribute('data-coreui-name')
      const url = button.getAttribute('data-coreui-url')
      const title = hapus.querySelector('.modal-title')
      const tanya = hapus.querySelector('.modal-body #tanya')
      const formHapus = hapus.querySelector('#form-hapus')
      title.textContent = 'Hapus ' + name 
      tanya.textContent = 'Yakin Akan Menghapus ' + name + ' ?'
      formHapus.action = url
    })
    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>