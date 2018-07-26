function resetHidden() {
  $('#divNoiDung .itemABC').each(function () {
     $(this).fadeOut();
 });
  $('#TabMenu .item').each(function () {
     $(this).removeClass('active');
 });
        //mobile
        $('#divNoiDung .TieuDe').each(function () {
        	$(this).removeClass('active');
        });
    }
    function readContent() {
    	var id = $('#TabMenu .item.active a').attr('data-id');
        // var id = $('#divNoiDung .TieuDe.active').attr('data-id');
        $('#divNoiDung .item' + id).fadeIn();
    }
    function init() {
    	resetHidden();
    	$('#TabMenu .item:nth-child(1)').addClass('active');
        //mobile
        $('#divNoiDung .TieuDe:nth-child(1)').addClass('active');
        readContent();
    }
    function Tabclick() {
    	$('#TabMenu .item').click(function () {
    		resetHidden();
    		$(this).addClass('active');
            //update mobile
            var id = $('#TabMenu .item.active a').attr('data-id');
            $('#divNoiDung .TieuDe' + id).addClass('active');
            readContent();
        });
    	$('#divNoiDung .TieuDe').click(function () {
    		resetHidden();
    		$(this).addClass('active');
            //update pc
            var id = $('#divNoiDung .TieuDe.active').attr('data-id');
            $('#TabMenu .item' + id).addClass('active');
            readContent();
        });
    }
    init();
    Tabclick();
    $('#divNoiDung  img').addClass('img-responsive');