<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>SRMS | Student Result Management System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('backend/assets/images/favicon.ico')}}">
       
        <!-- Bootstrap Css -->
        <link href="{{asset('backend/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset('backend/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

        <!-- jquery cdn  -->
        <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        
    </head>

    <style>
        body {
            background-image: url("{{asset('uploads/bg1.jpg')}}");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .overlay {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-color: rgba(0, 0, 0, .6);
        }

        .form {
            width: 400px;
            margin: 80px auto;

        }

        .form h2, p {
            text-align: center;
        }
    </style>

    <body data-topbar="dark">
        <div class="overlay"></div>
        <!-- Begin page -->
        <div class="card form">
            <div class="card-body">

                <h2>Student Result Management System (SRMS)</h2>
                <p class="card-title-desc">Find your result by simply providing the inputs below</p>

                <form method="POST" action="">
                    <div class="mb-3">
                        <label>Student Roll ID</label>
                        <div>
                            <input type="text" class="form-control" name="roll_id" required=""  placeholder="Enter Your Roll ID">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Student Class</label>
                        <div>
                            <select name="class_id" class="form-select" aria-label="Default select example">
                                <option selected="">Select Class</option>
                                @foreach($classes as $class)
                                    <option value="{{$class->id}}">{{$class->class_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    

                    <div class="mb-0" style="float: right">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                Find My Result
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <p class="text-light">Copyright © 2024 SRMS </p>
       
        <script src="{{asset('backend/assets/js/app.js')}}"></script>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            @if(Session::has('message'))
            var type = "{{ Session::get('alert-type','info') }}"
            switch(type){
                case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;
        
                case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;
        
                case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;
        
                case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break; 
            }
            @endif 
            </script>
    </body>
</html>