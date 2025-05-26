

@include('partial.header')

<div class="container">
  <h2> Bulk Email Campaign System  ---  <a href="{{route('campaign.index')}}" class="btn btn-primary">Campaign List</a></h2>
  <form method="post" action="{{route('campaign.save')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="email">Subject:</label>
       <input type="text" name="subject"  required class="form-control">
    </div>
    
    <div class="form-group">
      <label for="pwd">Message:</label>
      <textarea name="message"  rows="5" required class="form-control"></textarea>
    </div>


    <div class="form-group">
      <label for="pwd">Upload CSV:</label>
      <input type="file" name="csv_file" accept=".csv" class="w-full" required class="form-control">
    </div>



    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
</body>
</html>

