<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <title>{{ $title }} | Bibie Hadi Kusuma</title>

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="/css/dashboard.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Font Awesome JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    {{-- Select 2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    

    {{-- <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script> --}}

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        @include('layouts.sidebar')
        <!-- Page Content  -->
        <div id="content">
            {{-- header     --}}
            @include('layouts.header')
            
            <div class="container-fluid">
              <div class="row">
                {{-- <main class="col-md-9 ms-sm-auto col-lg-12 mx-4"> --}}
                  @yield('container')
                {{-- </main> --}}
              </div>
            </div> 
        </div>
    </div>
    <div class="overlay"></div>
    <div class="modal fade" id="changePassModal" tabindex="-1" aria-labelled aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" >Change Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="changePassForm" action="/dashboard/users/changepassword/{{ auth()->user()->id }}" method="POST">
                @method('put')
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="edt-id" name="id" class="form-control @error('name') is-invalid @enderror" placeholder="username" value="{{ auth()->user()->id }}">
                    <div class="mb-1">
                        <label class="col-form-label fw-bold" for="password">Current Password</label>
                        <input type="password" name="curr_pass" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label class="col-form-label fw-bold" for="password">New Password</label>
                        <input type="password" name="new_pass" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label class="col-form-label fw-bold" for="password">Password Confirmation</label>
                        <input type="password" name="pass_conf" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer mb-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit" onclick="return confirm('Are you sure want to change your password?')">Submit</button>
                        {{-- <button class="btn btn-warning" onclick="return confirm('Are you sure want to change status from {{ $pipeline->status }} to ?')" type="submit">Request</button> --}}
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Popper.JS -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script> --}}
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    {{-- datepicker --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    {{-- select2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
            // $("#sidebar").mCustomScrollbar({
            //     theme: "minimal"
            // });
            
            

            $('body').on('click', '#edit-brg', function () {
                var id = $(this).data('id');
                $.ajax({
                    type: 'GET',
                    url: '/barang/'+id+'/edit',
                    success: function(data){
                        $('#editBarang').modal('show');
                        $('#editBarangForm').attr('action','/barang/'+id+'')
                        $('#editBarangForm #edt-id').val(data.id);
                        $('#editBarang #edt-nama').val(data.nama_barang);
                        $('#editBarang #edt-harga').val(data.harga);
                        $('#editBarang #edt-jumlah').val(data.jumlah);
                    },
                    error: function(){
                        console.log(data);
                    }
                })
            })
        
        });
    </script>
</body>

</html>