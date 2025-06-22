<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
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
        <div align="center" style="padding-top: 100px;">
            <table>
                <tr style="background-color:#415a77;">
                    <th style="padding:10px">Doctor Name</th>
                    <th style="padding:10px">Phone</th>
                    <th style="padding:10px">Speciality</th>
                    <th style="padding:10px">Address</th>
                    <th style="padding:10px">Image</th>
                    <th style="padding:10px">Delete</th>
                    <th style="padding:10px">Edit</th>
                </tr>
                @foreach($data as $doctor)
                <tr align="center" style="background-color:#1b263b;">
                    <td style="padding:5px">{{$doctor->name}}</td>
                    <td style="padding:5px">{{$doctor->phone}}</td>
                    <td style="padding:5px">{{$doctor->speciality}}</td>
                    <td style="padding:5px">{{$doctor->address}}</td>
                    <td style="padding:5px"><img height="200" width="200" src="doctorimage/{{$doctor->image}}" alt=""></td>
                    <td style="padding:5px"><a onclick="return confirm('Are you sure you want to delete Doctor?');" class="btn btn-danger" href="{{url('deletedoctor',$doctor->id)}}">Delete</a></td>
                    <td style="padding:5px"><a class="btn btn-primary" href="{{url('updatedoctor',$doctor->id)}}">Edit</a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
        @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
