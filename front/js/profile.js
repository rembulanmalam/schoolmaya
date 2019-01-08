$(document).ready(function(){
    var file, reader;
    
    $(function() {
        
        $('#profile').addClass('dragging').removeClass('dragging');
    });
    
    $('#profile').on('dragover', function() {
        $('#profile').addClass('dragging')
    }).on('dragleave', function() {
        $('#profile').removeClass('dragging')
    }).on('drop', function(e) {
        $('#profile').removeClass('dragging hasImage');
        
        if (e.originalEvent) {
            file = e.originalEvent.dataTransfer.files[0];
            
            reader = new FileReader();
            
            //attach event handlers here...
            
            reader.readAsDataURL(file);
            reader.onload = function(e) {
                $('#profile').css('background-image', 'url(' + reader.result + ')').addClass('hasImage');
                
            }
            
        }
    })
    $('#profile').on('click', function(e) {
        console.log('clicked')
        $('#mediaFile').click();
    });
    window.addEventListener("dragover", function(e) {
        e = e || event;
        e.preventDefault();
    }, false);
    window.addEventListener("drop", function(e) {
        e = e || event;
        e.preventDefault();
    }, false);
    $('#mediaFile').change(function(e) {
        
        var input = e.target;
        if (input.files && input.files[0]) {
            var file = input.files[0];
            
            var reader = new FileReader();
            
            reader.readAsDataURL(file);
            reader.onload = function(e) {
                $('#profile').css('background-image', 'url(' + reader.result + ')').addClass('hasImage');
            }
        }
    });

    $('#confirm-pp').click(function(){
        var upload = reader['result'];
        console.log(upload);
        $.ajax({
            url: baseURL+'index.php/profile/change_profile_picture',
            method: 'post',
            dataType: 'json',
            data: {img_upload:upload},

            success: function(response){
                $('#success-pp').show();
            },

            error: function(){
                console.log("fail");
            }
        });
    });
});
