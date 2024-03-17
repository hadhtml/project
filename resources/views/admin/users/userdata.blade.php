<!-- Modal Header -->
<div class="modal-header">
  <h1 class="modal-title">From {{ DB::table('users')->where('id' , $from)->first()->name }} {{ DB::table('users')->where('id' , $from)->first()->last_name }} To {{ DB::table('users')->where('id' , $to)->first()->name }} {{ DB::table('users')->where('id' , $to)->first()->last_name }}</h1>
  <button type="button" class="close" data-dismiss="modal">×</button>
</div>

<!-- Modal body -->
<div class="modal-body">
  <table class="table table-bordered">
      <thead>
        <tr>
          <th><input type="checkbox"></th>
          
          <th>No of Rows</th>
          <th>Name</th>
        </tr>
      </thead>
      <tbody>
          <tr>
            <td><input type="checkbox"></td>
            <td>{{ Cmf::getuserdatabytable('activities' , $from) }}</td>
            <td>Activities</td>
          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td>{{ Cmf::getuserdatabytable('attachments' , $from) }}</td>
            <td>attachments</td>
          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td>{{ Cmf::getuserdatabytable('business_units' , $from) }}</td>
            <td>business_units</td>
          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td>{{ Cmf::getuserdatabytable('backlog' , $from) }}</td>
            <td>attachments</td>
          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td>{{ Cmf::getuserdatabytable('backlog' , $from) }}</td>
            <td>attachments</td>
          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td>{{ Cmf::getuserdatabytable('backlog' , $from) }}</td>
            <td>attachments</td>
          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td>{{ Cmf::getuserdatabytable('backlog' , $from) }}</td>
            <td>attachments</td>
          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td>{{ Cmf::getuserdatabytable('backlog' , $from) }}</td>
            <td>attachments</td>
          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td>{{ Cmf::getuserdatabytable('backlog' , $from) }}</td>
            <td>attachments</td>
          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td>{{ Cmf::getuserdatabytable('backlog' , $from) }}</td>
            <td>attachments</td>
          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td>{{ Cmf::getuserdatabytable('backlog' , $from) }}</td>
            <td>attachments</td>
          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td>{{ Cmf::getuserdatabytable('backlog' , $from) }}</td>
            <td>attachments</td>
          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td>{{ Cmf::getuserdatabytable('backlog' , $from) }}</td>
            <td>attachments</td>
          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td>{{ Cmf::getuserdatabytable('backlog' , $from) }}</td>
            <td>attachments</td>
          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td>{{ Cmf::getuserdatabytable('backlog' , $from) }}</td>
            <td>attachments</td>
          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td>{{ Cmf::getuserdatabytable('backlog' , $from) }}</td>
            <td>attachments</td>
          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td>{{ Cmf::getuserdatabytable('backlog' , $from) }}</td>
            <td>attachments</td>
          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td>{{ Cmf::getuserdatabytable('backlog' , $from) }}</td>
            <td>attachments</td>
          </tr>

          
      </tbody>
  </table>
</div>