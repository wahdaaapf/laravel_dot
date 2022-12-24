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
        <a href="{{route('admin.major.add')}}">Add Major</a>
        @if(Session::has('ok'))
            <div class="alert alert-success" role="alert">{{session::get('ok')}}</div>
        @endif

        <!-- Small boxes (Stat box) -->
        <table class="table">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Major</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = ($majors->currentPage() - 1) * $majors->perPage();
                @endphp
                @foreach($majors as $m)
                <tr>
                    <th scope="row">{{++$i}}</th>
                    <td>{{$m->class}}</td>
                    <td>
                        <a href="{{route('admin.major.edit',['major_id'=>$m->id])}}">Edit</a>
                        |
                        <a href="#" onclick="return confirm ('Do You Really Want To Delete This?') || event.stopImmediatePropagation()" wire:click.prevent="deleteMajor({{ $m->id }})">
                            Delete
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div Style="width:80%">
          {{$majors->links()}}
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</div>
