$('#abort_process').on('click', function(){
    $('#ripper_status_message').html('Aborting...');
    stopTracker();
    modal.openPage('assets/modals/rip/abort.php');
});


function stopTracker(){
    clearInterval(handleTracker);
}

function tracker() {
    $.ajax({
        url: 'assets/modals/rip/ajax_handler.php',
        cache: false,
        success: function(json){
         var json = $.parseJSON(json);
         var status = json['status'];
         var processed_tracks = json['processed_tracks'];
         var cd_title = json['cd_title'];
         var total_tracks = json['total_tracks'];
         var percentage = json['percentage'];

            if (cd_title !== '') {
                $('.modalHeader').html('Ripping your disc: ' + cd_title);
            }

            if(status == 'completing the process'){
             $('#percentage').width('100%');
             $('#percentage').html('100%');
             $('#ripper_status').html('Almost ready');
             $('#ripper_status_message').hide();
             $('.progressBar').hide();
                modal.openPage('assets/modals/add_album_rip/2.fix_titles.php');
             stopTracker();

            }

            if(percentage == 100){
                $('#ripper_status').html('finalizing ' + status);

                $('#percentage').width('99%');
                $('#percentage').html('99%');
                $('#ripper_status_message').html('Tracks: ' + processed_tracks + ' of ' + total_tracks );
            } else {
                $('#percentage').width(percentage+'%');
                $('#percentage').html(percentage+'%');

                $('#ripper_status').html('Now ' + status);
                $('#ripper_status_message').html('Tracks: ' + processed_tracks + ' of ' + total_tracks );
            }
      
        }
    })
}

$(document).ready(function () {
    // Check the tracker every 10 seconds.
    handleTracker = setInterval(tracker, 10000);
});