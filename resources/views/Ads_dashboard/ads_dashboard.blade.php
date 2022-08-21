<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Dashboard Table</title>
  <link rel="stylesheet" href="{{Url('css/ads_style.css')}}">

</head>
<body>
<!-- partial:index.partial.html -->
<head>
  <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="https://unpkg.com/feather-icons"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.19.0/feather.min.js"></script>

</head>

<div class="table-container">
    <div class="div">
        <button class="btn"><a href="{{route('properities.create')}}"></a>add</button>
        <button class="btn"><a href=""></a>Back</button>
    </div>
    <table>
      <thead>
        <tr>
          <th>property name</th>
          <th>property address</th>
          <th>property price</th>
          <th>image</th>
          <th>property type</th>
          <th>number of  beds</th>
          <th>number of rooms</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr class="table-row">
            @foreach ($data as $value)

            <td>{{$value['name']}}</td>
            <td>{{$value['address']}}</td>
            <td>{{$value['price']}}</td>
           <td><img src="/storage/{{$value['image']}}" height="50px"></td>
           <td>{{$value['properity_type']}}</td>
           <td>{{$value['number_of_beds']}}</td>
           <td>{{$value['number_of_rooms']}}</td>
            <div class="dashboard-table-action-icon-container">
              <i class="material-icons dashboard-table-action-icon ">send</i>
              <td><a href="{{route('properities.edit',['properity'=>$value])}}"> <i class="material-icons dashboard-table-action-icon"></i>Edit</a></td>
              <td><form method="POST" action="{{route('properities.destroy',['properity'=>$value])}}">
                @csrf
                @method('DELETE')
                <i class="material-icons dashboard-table-action-icon">delete</i>
                </form>
            </div>
          </td>
        </tr>
        @endforeach
        {{-- <tr class="table-row">
          <td>
            <div class="dashboard-table-flex-container">
              <img src="https://images.unsplash.com/photo-1510798831971-661eb04b3739?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=934&q=80" class="dashboard-table-image" >
              <div class="dashboard-table-name-location-container">
                <div>Alabama Rock Climbing Gym</div>
                <div class="dashboard-table-property-location">Montgomery, AL</div>
              </div>
            </div>
          </td>
          <td>$635,000</td>
          <td>Opportunity Alabama</td>
          <td><div class="project-status-pill pill-green">Published</div></td>
          <td>
            <div class="dashboard-table-action-icon-container">
              <i class="material-icons dashboard-table-action-icon ">send</i>
              <i class="material-icons dashboard-table-action-icon">edit</i>
              <i class="material-icons dashboard-table-action-icon">delete</i>
            </div>
          </td>
        </tr> --}}
        
      </tbody>
      </table>
    </div>
    <!-- partial -->
      
</body>
</html>
    