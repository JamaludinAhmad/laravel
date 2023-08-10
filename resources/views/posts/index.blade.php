<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
    <a class="btn btn-primary" href="/list/tambah-karyawan" role="button">Tambah karyawan</a>
    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
          <tr>
            <th>Name</th>
            <th>Title</th>
            <th>Status</th>
            <th>Position</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($employees as $employee)
                <tr>
                <td>
                    <div class="d-flex align-items-center">
                    <img
                        src="{{ Storage::url('public/pekerja/'.$employee->image)}}"
                        alt=""
                        style="width: 45px; height: 45px"
                        class="rounded-circle"
                        />
                    <div class="ms-3">
                        <p class="fw-bold mb-1">{{$employee->name}}</p>
                        <p class="text-muted mb-0">{{$employee->email}}</p>
                    </div>
                    </div>
                </td>
                <td>
                    <p class="fw-normal mb-1">{{$employee->title}}</p>
                    <p class="text-muted mb-0">IT department</p>
                </td>
                <td>
                    <span class="badge badge-success rounded-pill d-inline">Active</span>
                </td>
                <td>{{$employee->position}}</td>
                <td>
                    <button type="button" class="btn btn-link btn-sm btn-rounded">
                      <a href="list/edit/{{$employee->id}}"><p>Edit</p></a>
                    </button>
                </td>
                </tr>
            @empty
                <div>tidak ada data</div>
            @endforelse
        </tbody>
      </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>