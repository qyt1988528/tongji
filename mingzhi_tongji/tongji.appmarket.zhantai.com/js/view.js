$(function() {
    var begin = $('#start_time').datepicker({
        "onRender": function(date){//添加onRender事件，控制用户只能选择小于当前日期的
            var current = new Date();//获得当前日期
            if(date.valueOf() >= current){//判断日期是否大于当前日期
                return "disabled";
            } 
            return "";
        }
    }).on('changeDate', function(ev) {
        begin.hide();
    }).data('datepicker');
    var end = $('#end_time').datepicker({
        "onRender": function(date){//添加onRender事件，控制用户只能选择小于当前日期的
            var current = new Date();//获得当前日期
            if(date.valueOf() >= current){//判断日期是否大于当前日期
                return "disabled";
            } 
            return "";
        }
    }).on('changeDate', function(ev) {
        end.hide();
    }).data('datepicker');

})
