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
                    <th style="padding:10px">Pasient Name</th>
                    <th style="padding:10px">Email</th>
                    <th style="padding:10px">Phone</th>
                    <th style="padding:10px">Doctor Name</th>
                    <th style="padding:10px">Date</th>
                    <th style="padding:10px">Message</th>
                    <th style="padding:10px">Status</th>
                    <th style="padding:10px">Approv</th>
                    <th style="padding:10px">Cancel</th>
                </tr>
                @foreach($data as $appoint)
                <tr align="center" style="background-color:#1b263b;">
                    <td style="padding:5px">{{$appoint->name}}</td>
                    <td style="padding:5px">{{$appoint->email}}</td>
                    <td style="padding:5px">{{$appoint->phone}}</td>
                    <td style="padding:5px">{{$appoint->doctor}}</td>
                    <td style="padding:5px">{{$appoint->date}}</td>
                    <td style="padding:5px">{{$appoint->message}}</td>
                    <td style="padding:5px">{{$appoint->status}}</td>
                    <td style="padding:5px"><a class="btn btn-success" href="{{url('approved',$appoint->id)}}">Approv</a></td>
                    <td style="padding:5px"><a class="btn btn-danger" href="{{url('canceled',$appoint->id)}}">Cancel</a></td>
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
