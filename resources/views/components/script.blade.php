


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
<script src="https://unpkg.com/bootstrap-multiselect@0.9.13/dist/js/bootstrap-multiselect.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.js"></script>
<script type="text/javascript" src="{{asset('public/assets/dist/jkanban.js')}}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/dragula@3.7.3/dist/dragula.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-zoom@1.0.1"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/hammerjs@2.0.8/hammer.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.13.0/Sortable.min.js"></script>
<script src="{{ asset('public/assets/js/custom.js') }}"></script>
<link rel="stylesheet" href="{{ url('public/assets/flowchart/jquery.flowchart.css') }}">
<script src="{{ url('public/assets/flowchart/jquery.flowchart.js') }}"></script>
<!-- Zoom -->
@yield('linking')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const panelLink = document.querySelector('.nav-link[href="#panel"]');
    const sidePanel = document.getElementById('panel');
    const closeBtn = document.getElementById('closeBtn');

    panelLink.addEventListener('click', function(event) {
        event.preventDefault();
        sidePanel.classList.add('open');
    });

    closeBtn.addEventListener('click', function(event) {
        event.preventDefault();
        sidePanel.classList.remove('open');
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const panelLink = document.querySelector('.nav-link[href="#panel-new"]');
    const sidePanel = document.getElementById('panel-new');
    const closeBtn = document.getElementById('closeBtn');

    panelLink.addEventListener('click', function(event) {
        event.preventDefault();
        sidePanel.classList.add('open');
    });

    closeBtn.addEventListener('click', function(event) {
        event.preventDefault();
        sidePanel.classList.remove('open');
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const panelLink = document.querySelector('.nav-link[href="#panel-unit"]');
    const sidePanel = document.getElementById('panel-unit');
    const closeBtn = document.getElementById('closeBtn');

    panelLink.addEventListener('click', function(event) {
        event.preventDefault();
        sidePanel.classList.add('open');
    });

    closeBtn.addEventListener('click', function(event) {
        event.preventDefault();
        sidePanel.classList.remove('open');
    });
});
</script>

<script type="text/javascript">
    var zoom = 1;

    function zoom_in(id) {
        
        zoom += 0.1;
        $('.board-cards' +id).css('transform', 'scale(' + zoom + ')');
    }
    function zoom_init(id) {
        zoom = 1;
        $('.board-cards'+id).css('transform', 'scale(' + zoom + ')');
    }
    function zoom_out(id) {
        zoom -= 0.1;
        $('.board-cards'+id).css('transform', 'scale(' + zoom + ')');
    }
</script>
<!-- Scrolable -->
<script>


var currentSectionIndices = {};
var sectionWidth = sections[0].offsetWidth;



function shiftLeft(x) {
    var container = document.querySelector("#container-scroll-" + x);
    var sections = Array.from(document.querySelectorAll("#section-" + x));
    
    if (!currentSectionIndices[x]) {
        currentSectionIndices[x] = 0;
    }

    if (currentSectionIndices[x] > 0) {
        currentSectionIndices[x]--;
        var sectionWidth = sections[0].offsetWidth;
        container.style.transform = `translateX(-${sectionWidth * currentSectionIndices[x]}px)`;
    }
}

function shiftRight(x) {
    var container = document.querySelector("#container-scroll-" + x);
    var sections = Array.from(document.querySelectorAll("#section-" + x));
    
    if (!currentSectionIndices[x]) {
        currentSectionIndices[x] = 0;
    }

    if (currentSectionIndices[x] < sections.length - 1) {
        currentSectionIndices[x]++;
        var sectionWidth = sections[0].offsetWidth;
        container.style.transform = `translateX(-${sectionWidth * currentSectionIndices[x]}px)`;

        
    }
    

}

function shift(x) {
    
const currentDate = new Date();
const currentMonthNumber = currentDate.getMonth() + 1;


if(currentMonthNumber > 9)
{
 currentSectionIndex = 2;
    
}


if(currentMonthNumber > 6  && currentMonthNumber < 10)
{
 currentSectionIndex = 1;
    
}

if(currentMonthNumber > 3 && currentMonthNumber < 7)
{
 currentSectionIndex = 0;
    
}    
 
var container = document.querySelector("#container-scroll-" + x);
var sections = Array.from(document.querySelectorAll("#section-"+x));
    
    if (currentSectionIndex < sections.length - 1) {
        currentSectionIndex++;
        
        var sectionWidth = sections[0].offsetWidth;
        container.style.transform = `translateX(-${sectionWidth * currentSectionIndex}px)`;

    }
    
}


function handleDivClick(x)
{
         $.ajax({
         type: "GET",
        url: "{{ url('get-month') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
        x:x,

        },
        success: function(response) {
            
            // $("#initiative"+x).collapse('toggle');  
            if(response.loop_index)
            {
            currentSectionIndices[x] = response.loop_index;
 
            }else
            {
            currentSectionIndices[x] = 0;
            }
            var container = document.querySelector("#container-scroll-" + x);
            var sections = Array.from(document.querySelectorAll("#section-"+x));
    

               var sectionWidth = sections[0].offsetWidth;
               container.style.transform = `translateX(-${sectionWidth * currentSectionIndices[x]}px)`;

    
        }
        
    });  
    

}


</script>
<!-- Kanban -->

<script>
    // Initialize Dragula
    
      

    
// var containers = Array.from(document.getElementsByClassName("board"));
// var drake = dragula(containers);

// // Save position on drop
// drake.on("drop", function (el, target, source, sibling) {
//     var parentElId = target.id;
//     var droppedElId = el.id;

//     // Perform additional operations or AJAX request here
//     // Example: Update the position of the card using AJAX
//     $.ajax({
//         type: "POST",
//         url: "{{ url('change-epic-month') }}",
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         },
//         data: {
//         parentElId:parentElId,
//         droppedElId:droppedElId,
        
      

//         },
//         success: function(response) {
//             console.log('Card position updated successfully.');
//         },
//         error: function(error) {
//             console.log('Error updating card position:', error);
//         }
//     });
// });



    var containers = Array.from(document.getElementsByClassName("boards"));
    var drake = dragula(containers);

    // Save position on drop
    drake.on("drop", function (el, target, source, sibling) {
        var backlogId = el.id.split("-")[1];
        var newPosition = Array.from(target.children).indexOf(el) + 1;
      
     
        $.ajax({
        type: "POST",
        url: "{{ url('change-backlog-pos') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
        backlogId:backlogId,
        newPosition:newPosition,
        
      

        },
        success: function(response) {
            console.log('Card position updated successfully.');
        },
        error: function(error) {
            console.log('Error updating card position:', error);
        }
    });
    });


    var containers = Array.from(document.getElementsByClassName("boardI"));
    var drake = dragula(containers);

    // Save position on drop
    drake.on("drop", function (el, target, source, sibling) {
        var droppedElId = el.id.split("-")[1];
        var dropped = el.id.split("-")[0];
   
        var taskOrder = [];
        var newPosition = Array.from(target.children).indexOf(el) + 1;
        var Target = Array.from(target.children);
        for (var i = 0; i < Target.length; i++) {
            taskOrder.push(Target[i].id.split('-')[1]);
                    }

        var parentElId = target.id;
     
        var type = el.id.split("-")[2];
        var slug = el.id.split("-")[3];
        var Init = el.id.split("-")[6];

    
        $.ajax({
        type: "POST",
        url: "{{ url('change-init-pos') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
        droppedElId:droppedElId,
        newPosition:newPosition,
        parentElId:parentElId,
        dropped:dropped,
        taskOrder:taskOrder,
        type:type,
        slug:slug,
        Init:Init

      

        
      

        },
        success: function(response) {
         
            if(response.message == 1)
            {
        

            $('#proginit'+response.initiative.id).attr('aria-valuenow',response.initiative.initiative_prog);
            $('#proginit'+response.initiative.id).css('--value',response.initiative.initiative_prog);
            $('#qcomp'+response.initiative.id).attr('aria-valuenow',response.initiative.q_initiative_prog);
            $('#qcomp'+response.initiative.id).css('--value',response.initiative.q_initiative_prog);



            }else
            {
            console.log('Card position updated successfully.');
            $('#parentCollapsible').html(response);
            $("#nestedCollapsible" + el.id.split("-")[4]).collapse('toggle');
            $("#key-result" + el.id.split("-")[5]).collapse('toggle');
            $("#initiative" + el.id.split("-")[6]).collapse('toggle');
            }
           
                },
        error: function(error) {
            console.log('Error updating card position:', error);
        }
    });
    });


  </script>

  <!-- Tooltip -->

  <script type="text/javascript">
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
</script>

<!-- Datatable -->

<script>
    // $(document).ready(function() {
    //     // Initialize DataTable
    //     $('.data-table').DataTable({
    //         "ordering": false
    //     });
    // });
    $(document).ready(function() {
    $('.search-team').select2({
      width: '100%',
    });
  });
  
  $(function() {

 $('.chkveg').val('');
  $('.chkveg').multiselect({
    includeSelectAllOption:true,
    numberDisplayed: 0
  });


});

$(function() {

$('.flag-search').val('');
 $('.flag-search').multiselect({
   includeSelectAllOption:true,
   numberDisplayed: 0
 });


});

    $(".js-select2").select2({
            closeOnSelect : false,
            placeholder : "Placeholder",
            // allowHtml: true,
            allowClear: true,
            tags: true // создает новые опции на лету
        });
  

</script>


<!-- Shahzad's Added for preventing the Add epics button to not dragable -->

<script>
// Initialize dragula
var drake = dragula([document.querySelector('.board')]);

drake.on('drop', function(el, target, source, sibling) {
    // Check if the dragged element has a specific class (e.g., 'unmovable')
    if (el.classList.contains('no-drag')) {
        // Prevent the element from moving to another column
        drake.cancel();
    } else {
        // Handle the normal drag-and-drop logic
        // You may want to update the element's position in your data structure
    }
});


</script>

  


<!-- Summernote -->

<script>
    $(document).ready(function() {
        $('#editor').summernote({
            height: 300,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['view', ['fullscreen', 'codeview']],
            ],
        });
    });
</script>


<script>
    $(document).ready(function(){
      // Toggle expanded sidebar
      $('.icon').on('click', function(){
        // $('.aside').toggleClass('expanded-sidebar');
        $('.content').toggleClass('content-expanded');
      });
    });
  </script>


  <script type="text/javascript">
      document.addEventListener('DOMContentLoaded', function() {
        const panelLink = document.querySelector('.buttonClick');
        const sidePanel = document.getElementById('panel');
        const closeBtn = document.getElementById('closeBtn');

        panelLink.addEventListener('click', function(event) {
            event.preventDefault();
            sidePanel.classList.add('open');
        });

        closeBtn.addEventListener('click', function(event) {
            event.preventDefault();
            sidePanel.classList.remove('open');
        });
    });

  </script>
  