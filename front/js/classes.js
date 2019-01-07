

$(document).ready(function(){
    $('#sel2').hide();

    $('#sel1').change(function(){
        //reset selection box 2
        $('#sel2').html('');
        classid = $(this).val();
        
        $.ajax({
            url: baseURL+'index.php/classes/show_class',
            method: 'post',
            dataType: 'json',
            
            success: function(response){
                chapter = response;
                //show selection 2
                $('#sel2').show();
                $('#sel2').append( "<option id='class' value='' disabled selected hidden>--Select Class--</option>" );
                for(var i = 0 ; i < response.length ; i++){
                    $('#sel2').append(
                        "<option value=" + response[i]["ChapterID"] + ">" +
                        response[i]["ChapterID"] +
                        "</option>"
                    );
                }
            }
        });
    });

    $('#sel2').change(function(){
        chapterid = $(this).val();
        for	(var i = 0 ; i < chapter.length ; i++){
            if(chapter[i]['ChapterID'] == chapterid){
                selected = i;
                break;
            }
        }	
        
        show_student();
    });

    $('body').on('click','.change', function(){
        $('#modalTitle').html("");
        $('#new-score').val("");
        
        clicked_id = $(this).val();
        $('#modalTitle').html(student_list[clicked_id]['Name']);

        if(student_list[clicked_id]['Score'] != null){
            $('#new-score').attr('placeholder', student_list[clicked_id]['Score']);
        }      
    });

    $(".close").click( function (){
        $("#failed").hide();
    });

    $('#change-exam').click(function(){
        
        $.ajax({
            url: baseURL+'index.php/classes/show_available_schedule',
            method: 'post',
            dataType: 'json',
            data: { select_subject: chapter[selected]['SubjectID'], select_class: classid},

            success: function(response){
                var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                for(var i = 0; i < response.length ; i++){
                    date_list[i] = new Date(1000*response[i]);
                    iso_date[i] = new Date(date_list[i].getTime() - (date_list[i].getTimezoneOffset() * 60000)).toISOString();
                }
                console.log(iso_date);
                for(var i = 0; i < response.length; i++){
                    $('#sel3').append(
                        "<option value=" + iso_date[i] + ">" +
                        date_list[i].toLocaleDateString('en-GB', options) + "</option>"
                    );
                }
            },
        });
        $('#changeExam').modal("show");
    });
});

function save_exam(){
    var date_selected = $('#sel3').val();
    console.log(date_selected);
    $.ajax({
        url: baseURL+'index.php/classes/change_exam',
        method: 'post',
        dataType: 'json',
        data: {select_date: date_selected, select_chapter: chapterid, select_class:classid},

        success: function(){
            console.log("suskes save");
            $('#change-exam').modal("hide");
            show_student(); 
        },
        error: function(){
            console.log("gagal save");
        }
    });
}

function save(){
    var new_score = $('#new-score').val();
   
    if($.isNumeric(new_score) && new_score >= 0 && new_score <= 100){
        $.ajax({
            url: baseURL+'index.php/classes/change_score',
            method: 'post',
            dataType: 'json',
            data: {student_id: student_list[clicked_id]['ID'], chapter_id: chapterid, old_score:student_list[clicked_id]['Score'] ,score: new_score},

            success: function(){
                $('#changeScore').modal("hide");
                console.log("success");
                show_student();              
            },

            error: function(){
                $('#failed').show();
            }
        });
        return false;
    }
    $('#failed').show();
    console.log("wrong");
    return;
}

function show_student(){
    //reset yang perlu direset
    $('#student_container').html('');
    $('#detail').html('');
    $('#exam-alert-text').html('');
    $('#exam-alert').show();

    //ajax for exam schedule alert
    $.ajax({
        url: baseURL+'index.php/classes/show_exam',
        method: 'post',
        data: {select_chapter: chapterid, select_class:classid},
        dataType: 'json',

        success: function(response){
            console.log(response);
            if(response == null){
                $('#exam-alert-text').html('Exam schedule for this chapter has not been selected!');
            }
            else{
                $('#exam-alert-text').html("This chapter exam schedule is <strong>" +
                                        response['ExamSchedule'] + "</strong>"
                );
            }
        },

        error: function(){
           console.log("fail");
        }
    });

    //ajax for student scorelist
    $.ajax({
        url: baseURL+'index.php/classes/show_student',
        method: 'post',
        data: {select_class: classid, select_chapter: chapterid},
        dataType: 'json',
            
        success: function(response){
            student_list = response;
            for	(var i = 0 ; i < response.length ; i++){
                    if(response[i]['Score'] == null)
                        response[i]['Score'] = 'N/A';
            }

            $('#detail').append(
                "<h1 class='display-3'>" + classid + "</h1>" +
                "<strong><h3>" + chapter[selected]['SubjectName'] + "</h3></strong>" +
                "<h5>" + chapter[selected]['ChapterID'] + " - " + chapter[selected]['ChapterName']+ "</h5>"
            )
                 
            for(var i = 0 ; i < response.length ; i++){						
                $('#student_container').append(
                    "<div class='col-auto mb-3'>" +
                         "<div class='card text-center' style='width: 18rem;'>" +
                             "<div class='card-body'>" +
                                 "<img class='card-img-top img-16rem mb-4' src='http://localhost/schoolmaya/"
                                + response[i]['ProfilePicture'] + "' alt='Card image cap'>" +
                                "<h5 class='card-title'>" + response[i]['Name'] + "</h5>" +
                                "<h4 class='card-title mb-2'> Score : " + response[i]['Score'] + "</h4>" +
                                "<button type='button' class='btn btn-outline-secondary ml-auto change'data-toggle='modal' data-target='#changeScore' value='" + [i] + "'>Change</button>" +
                            "</div>" +
                        "</div>" +
                    "</div>"
                );	
            }
        }
    });
}