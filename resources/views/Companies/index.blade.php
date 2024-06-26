<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Users Data</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  <div class="container mt-2">
    <div class="row">
      <div class="col-lg-12">
        <h2>Users Data</h2>
      </div>
      <div>
        <a href="{{ route('companies.create')}}" class="btn btn-success" >Add User</a>
      </div>
      @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{ $message }}</p>
      </div>
      @endif
      <table class="table table-bordered">
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Name</th>
          <th>Email</th>
          <th>avatar</th>
          <th width="280px">Tools</th>
        </tr>
        @foreach ($companies as $company)
        <tr>
          <td>{{ $company->id }}</td>
          <td>{{ $company->title }}</td>
          <td>{{ $company->name }}</td>
          <td>{{ $company->email }}</td>
          <td>{{ $company->avatar }}</td>
          <td>
            <form id="delete-form-{{ $company->id }}" action="{{ route('companies.destroy', $company->id) }}" method="POST">
              <a href="{{ route('companies.edit', $company->id)}}" class="btn btn-warning">Edit</a>
              @csrf
              @method('DELETE')
              <button type="button" onclick="confirmDelete('{{ $company->id }}')" class="btn btn-danger">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </table>
      {!! $companies->links('pagination::bootstrap-5') !!}
    </div>
  </div>

  <script>
    function confirmDelete(companyId) {
      if (confirm("Are you sure you want to delete this company?")) {
        document.getElementById('delete-form-' + companyId).submit();
      }
    }
  </script>
</body>
</html>
