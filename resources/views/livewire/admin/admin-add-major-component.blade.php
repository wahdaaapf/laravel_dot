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

        <a href="{{route('admin.majors')}}">All Majors</a>

        @if(Session::has('ok'))
            <div class="alert alert-success" role="alert">{{session::get('ok')}}</div>
        @endif
        <!-- Small boxes (Stat box) -->
        <form action="" wire:submit="storeMajor">
          @method('POST')
            <div class="mb-3 mt-3">
                <label for="major">Name Major</label>
                <input type="text" id="major" name="major" class="form-control" wire:model="major">
                @error('major')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <button type="submit">Add Major</button>
        </form>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</div>
