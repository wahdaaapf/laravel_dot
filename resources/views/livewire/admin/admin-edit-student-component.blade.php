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

        <a href="{{route('admin.students')}}">All Students</a>

        @if(Session::has('ok'))
            <div class="alert alert-success" role="alert">{{session::get('ok')}}</div>
        @endif
        <!-- Small boxes (Stat box) -->
        <form action="" wire:submit="editStudent">
            <div class="mb-3 mt-3">
                <label for="student">Name Student</label>
                <input type="text" id="student" name="student" class="form-control" wire:model="student">
                @error('student')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="major">Name Major</label>
                <select name="major" id="major" class="form-control" wire:model="major">
                    @foreach($clss as $c)
                        <option value="{{$c->id}}">{{$c->class}}</option>
                    @endforeach
                </select>
                @error('major')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="major">Gender Student</label> <br>
                <input type="radio" name="gender" id="gender" value="male" wire:model="gender"> Male
                <input type="radio" name="gender" id="gender" value="female" wire:model="gender"> Female
                @error('gender')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="img">Gender Student</label> <br>
                <input type="file" name="img" id="img" wire:model="nwimg"> <br>
                @if($nwimg)
                    <img src="{{$nwimg->temporaryUrl()}}" width="120">
                @else
                    <img src="{{asset('assets/siswa')}}/{{$img}}" width="120">
                @endif
                @error('img')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <button type="submit">Edit Student</button>
        </form>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</div>

