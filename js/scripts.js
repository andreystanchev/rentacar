$(function(){
    $('[data-toggle="datepicker"]').datepicker({
        format: 'yyyy.mm.dd'   
    });
    
    $('#make').change(function() {
        var selected = $("#make option:selected").text();
        var models = $('#model option');
        models.hide();

        models.each(function(index,value){
            
            if(selected == $(this).attr('class')){
                $(this).show();
            }
        });
        
    });
});