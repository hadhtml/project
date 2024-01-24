@foreach($teams as $r)
<div class="col-md-12 memberprofile memberprofilecontroleight" onclick="selectteamforepic({{ $r->id }},{{ $update->id }})">
    <div class="row">
        <div class="col-md-2">
            <div class="memberprofileimage">
                <img class="gixie" data-item-id="{{ $r->id }}">
            </div>
        </div>
        <div class="col-md-8">
            <div class="membername">{{ $r->team_title }}</div>
            <div class="memberdetail">Lead:{{ DB::table('members')->where('id' , $r->lead_id)->first()->name }} {{ DB::table('members')->where('id' , $r->lead_id)->first()->last_name }}</div>
        </div>
        <div class="col-md-2 text-center mt-3">
            @if($update->team_id == $r->id)
                <span class="material-symbols-outlined">cancel</span>
            @endif
        </div>
    </div>
</div>
@endforeach
<script type="text/javascript">
    var elements = document.querySelectorAll('.gixie');
    elements.forEach(function(element) {
        var itemId = element.getAttribute('data-item-id');
        var imageData = new GIXI(300).getImage(); 
        element.setAttribute('src', imageData);
    });
    @if(!$update->team_id)
       $( document ).ready(function() {
            $('.epicheaderteambutton').html("<img src='{{ url('public/assets/svg/btnteamsvg.svg') }}'' width='20'> Team");
        }); 
    @else
        $( document ).ready(function() {
            $('.epicheaderteambutton').html("<img src='{{ url('public/assets/svg/btnteamsvg.svg') }}'' width='20'> 1");
            $('.epicheaderteambutton').css("width" , '90px');
        }); 
    @endif
</script>