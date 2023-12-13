<div class="col-md-12 col-lg-12 col-xl-12">
    <div class="d-flex flex-row align-items-center justify-content-between">
          <div>
            Linking
          </div>
        
    </div>
    <hr>
</div>
<table id="example" class="table table-sm" style="width: 120%">
    <thead>
        <tr>
          
            <td>Business Unit</td>
            <td>Key</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
       @foreach($KeyLink as $link)
        <tr id="del-obj-link{{$link->ID}}"> 
            @if($type == 'stream')
            <td>{{$link->business_name}}</td>
            @endif
            <td>{{$link->obj_name}}</td>
            <td>


                  
                <button class="btn-circle btn-tolbar" type="button" onclick="deletelinkvalueObj({{$link->ID}})">
                    <img src="{{ url('public/assets/images/icons/delete.svg') }}">
                </button>
            </td>

        </tr>
     @endforeach   
       
    </tbody>     
</table>
