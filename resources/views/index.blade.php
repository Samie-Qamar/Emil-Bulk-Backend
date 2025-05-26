@include('partial.header')


<div class="container">
<h1>Campaign List</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Campign Name</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Customer Email</th>
      <th scope="col">Email Status</th>
    </tr>
  </thead>
  <tbody>

  @foreach($CampaignContact as $index => $camcontact)
    <tr>
      <th scope="row">{{$index+1}}</th>
      <td>{{$camcontact->campignget->subject ?? ''}}</td>
      <td>{{$camcontact->name ?? ''}}</td>
      <td>{{$camcontact->email ?? ''}}</td>
       <td>{{$camcontact->status ?? ''}}</td>
    </tr>
    @endforeach
      </tbody>
</table>


</body>

</div>
</html>