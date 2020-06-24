<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Attendance</title>
  </head>
  <body>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"      aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         
      <form action="{{route('insertStudent')}}" method="POST">
        @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Student ID</label>
                    <input type="number" name="roll" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Roll">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Classs</label>
                    <input type="number" name="class" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Class">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Comment</label>
                    <textarea class="form-control" name="comments" id="" cols="15" rows="5" placeholder="Describe"></textarea>
                </div>
               
              
            <button type="submit" class="btn btn-primary float-right">Submit</button>
            
            </form>
            <button type="button" class="btn btn-secondary float-left" data-dismiss="modal">Close</button>
      </div>
      <!-- <div class="modal-footer">
       
      </div> -->
    </div>
  </div>
</div>







  <div class="container">
    <div class="row  p-5">
      <div class="col-sm-3"></div>
        <div class="col-sm-6">
        <a class="badge badge-primary text-center" href="{{route('attendance')}}"> 
        <h1 >Student Attendance System</h1>
      </a>
        @if (Session::get('message'))
        <p class="text-center text-success">{{Session::get('message')}}</p>
            
        @endif
        </div>
        <div class="col-sm-3"></div>
    </div>
    
    <div class="row">
        <div class="col-sm-3"></div>
            <div class="col-sm-6">
            <form action="{{route('viewStudents')}}" method="POST">
                @csrf
                <label class="badge badge-success" for="basic-url">Select Class</label>
                <div class="input-group mb-3">
                    <select class="form-control" name="class" id="">
                        <option value="0">--Select--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success float-left">View Student</button>
            </form>
            <button class="btn btn-info float-right" data-toggle="modal" data-target="#exampleModalCenter">Add Student</button>
            </div>
            <div class="col-sm-3"></div>
    
    </div>
          <form action="{{route('insertAttendance')}}" method="POST">
              @csrf
   <div class="row mt-4">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <label class="badge badge-success" for="basic-url">Select Date</label>
            <div class="input-group mb-3">
            <input type="date" name="date" required class="form-control" id="basic-url" aria-describedby="basic-addon3">
            </div>
        </div>
        <div class="col-sm-3"></div>

   </div>
   <div class="row p-5">
        
        <div class="col-sm-12">
        <label for="">Attentance Table</label> 
        @if ($clas){
        <span>For Class:  {{$clas}}</span>
        }
            
        @endif
        <table class="table table-hover">
           
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Student ID</th>
                <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $a=1;
                    $c=1;
                @endphp
              @if ($results)
                @foreach ($results as $result)

                <tr>
                <th scope="row">{{$a++}}</th>
                <td>{{$result->name}}</td>
                <td><input type="hidden" name="student_id[]" value="{{$result->roll}}"> {{$result->roll}}</td>
                <td>
                  <input type="radio" name="status[{{$result->roll}}]" value="2"> <span class="badge badge-success">Present</span>
                  <input type="radio" name="status[{{$result->roll}}]" value="1"> <span class="badge badge-warning">Late</span>
                  <input type="radio" name="status[{{$result->roll}}]" value="0"> <span class="badge badge-danger">Absent</span>
                </td>
                </tr>
            @php
                $c++;
            @endphp
                @endforeach   
                @endif
            </tbody>
        </table>
        <button type="submit" class="btn btn-success">Submit</button>
        </div>
        
    </div>
          </form>
  </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>