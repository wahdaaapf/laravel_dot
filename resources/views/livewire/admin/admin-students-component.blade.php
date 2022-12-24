<div>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <a href="{{route('admin.student.add')}}">Add Student</a>
        @if(Session::has('ok'))
            <div class="alert alert-success" role="alert">{{session::get('ok')}}</div>
        @endif

        <!-- Small boxes (Stat box) -->
        <table class="table">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Class</th>
                <th scope="col">Gender</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = ($students->currentPage() - 1) * $students->perPage();
                @endphp
                @foreach($students as $s)
                <tr>
                    <th scope="row">{{++$i}}</th>
                    <td>{{$s->name}}</td>
                    <td>{{$s->major->class}}</td>
                    <td>{{$s->gender}}</td>
                    <td><img src="{{asset('assets/siswa')}}/{{$s->image}}" width="120"></td>
                    <td>
                        <a href="{{route('admin.student.edit',['student_id'=>$s->id])}}">Edit</a>
                        |
                        <a href="#" onclick="return confirm ('Do You Really Want To Delete This?') || event.stopImmediatePropagation()" wire:click.prevent="deleteStudent({{ $s->id }})">
                            Delete
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div Style="width:80%">
          {{$students->links()}}
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</div>