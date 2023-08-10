<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <form action="/list/tambah-karyawan" enctype="multipart/form-data" method="POST">
        @csrf
        {{-- @method('PUT') --}}
        <div class="form-group">
            <label for="exampleFormControlInput1">Nama</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="Nijika Ijichi">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Email address</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="nijika@example.com">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Title</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="Backend-Developer">
        </div>
        
        {{-- <div class="col-auto my-1">
            <label class="mr-sm-2" for="inlineFormCustomSelect">Status</label>
            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="status">
              <option value="1">Junior</option>
              <option value="2">Senior</option>
            </select>
        </div> --}}

        <div class="col-auto my-1">
            <label class="mr-sm-2" for="inlineFormCustomSelect">Position</label>
            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="position">
              <option selected>Junior</option>
              <option value="Junior">Junior</option>
              <option value="Senior">Senior</option>
              <option value="Sepuh">Sepuh</option>
            </select>
        </div>

        <div class="form-group">
            <label for="exampleFormControlFile1">Masukan poto</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>