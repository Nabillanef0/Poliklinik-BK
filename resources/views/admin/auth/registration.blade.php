
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrasi Akun</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/vendor/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="/vendor/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/vendor/admin/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="/vendor/admin/index2.html" class="h1"><b>Poli</b>Klinik</a>
    </div>
    <div class="card-body">
    <p class="login-box-msg">Registrasi Akun</p>

      @if (session()->has('loginError'))
        <div class="alert alert-danger">
            {{ session('loginError') }}
        </div>
      @endif
      <form action="{{ route('register.post') }}" method="post">
        @csrf
        <div class="form-group mb-2">
          <label class="form-label" for="nama">Nama</label>
          <div class="input-group">
              <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" id="" placeholder="Enter Nama" autocomplete="nama" autofocus>
              @error('nama')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
          </div>
      </div>

      <div class="form-group mb-2">
          <label class="form-label" for="alamat">Alamat</label>
          <div class="input-group">
              <input name="alamat" type="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}" id="" placeholder="Enter Alamat" autocomplete="alamat" autofocus>
              @error('alamat')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
          </div>
      </div>

      <div class="form-group mb-2">
          <label class="form-label" for="no_ktp">No KTP</label>
          <div class="input-group">
              <input name="no_ktp" type="no_ktp" class="form-control @error('no_ktp') is-invalid @enderror" value="{{ old('no_ktp') }}" id="" placeholder="Enter No KTP" autocomplete="no_ktp" autofocus>
              @error('no_ktp')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
          </div>
      </div>

      <div class="form-group mb-2">
          <label class="form-label" for="no_hp">No HP</label>
          <div class="input-group">
              <input name="no_hp" type="no_hp" class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp') }}" id="" placeholder="Enter No HP" autocomplete="no_hp" autofocus>
              @error('no_hp')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
          </div>
      </div>
        
        <button type="submit" class="btn btn-primary btn-block">Login</button>
      </form>

      <!-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> -->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="/vendor/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/vendor/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/vendor/admin/dist/js/adminlte.min.js"></script>
</body>
</html>
