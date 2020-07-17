 $(document).ready(function(){
   
    //returns the no of mins ahead or behind green which meridian
    var offset = new Date().getTimezoneOffset();
    //return the no of milliseonds since 1970/01/01
    var timestamp = new Date().getTime();

    //convert our time to : Universal time coordinated/Universal coordinated time
    var utc_timestamp = timestamp + (60000 * offset);

    $('#time_zone_offset').val(offset);
    $('#auto_timestamp').val(utc_timestamp);
    
 });