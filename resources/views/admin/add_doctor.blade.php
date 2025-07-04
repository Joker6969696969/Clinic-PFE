<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->

    <style type="text/css">

        label 
        {
            display: inline-block;
            width: 200px;
        }
    </style>

    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
        
            <div class="container" align="center" style="padding-top: 100px">

            @if(session()->has('message'))

                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    {{session()->get('message')}}
                </div>

            @endif


                <form action="{{url('upload_doctor')}}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div style="padding:15px;">
                        <label for="">Doctor Name</label>
                        <input type="text" style="color:black;" name="name" placeholder="Write the Name" required="">
                    </div>

                    <div style="padding:15px;">
                        <label for="">Phone Number</label>
                        <input type="number" style="color:black;" name="number" placeholder="Write the Number" required="">
                    </div>

                    <div style="padding:15px;">
                        <label for="">Doctor Speciality</label>
                        <select name="speciality" id="" style="color:black; width: 200px;">
                            <option value="">--Select--</option>
                            <option value="Fisioterapeuta">Fisioterapeuta</option>
                            <option value="Nutricionista">Nutricionista</option>
                            <option value="Terapeuta">Terapeuta Ocupacional</option>
                            <option value="Fonoaudióloga">Fonoaudióloga</option>
                        </select>
                    </div>

                    <div style="padding:15px;">
                        <label for="">Doctor Address</label>
                        <input type="text" style="color:black;" name="address" id="address" autocomplete="street-address" placeholder="Write the Address"  required="">
                    </div>

                    <div style="padding:15px;">
                        <label for="">Doctor Image</label>
                        <input type="file" name="file" required="">
                    </div>  

                    <div style="padding:15px;">
                        <input type="submit" class="btn btn-success">
                    </div>
                </form>
            </div>

        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
        @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
