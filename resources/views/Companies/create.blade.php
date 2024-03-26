<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12">
                <h2>Add Users Data</h2>
            </div>
            <div>
                <a href="{{ route('companies.index')}}" class="btn btn-primary">Back</a>
            </div>
            @if (Session('status'))
                <div class="alert alert-success">
                    {{ Session('status') }}
                </div>
            @endif
            <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                <div class="col-md-12">
                        <div class="form-group  my-3">
                        <strong>Title</strong>
                            <select name="title" >
	<option value="">เลือก</option>
	<option value="คุณ">คุณ</option>
</select>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    <div class="col-md-12">
                        <div class="form-group  my-3">
                            <strong>Name</strong>
                            <input type="text" name="name" class="form-control">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>Email</strong>
                            <input type="email" name="email" class="form-control">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>Password</strong>
                            <input type="text" name="address" class="form-control">
                            @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                        <strong>Avatar</strong>
                            
                            <form action="upload.php" method="post" enctype="multipart/form-data">
                                <input type="file" name="avatar" >
                            </form>
                    </div>
                    <div class="col-md-">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>