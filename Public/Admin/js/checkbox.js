$(document).ready(function(){
    var checkbox = $("#main_table tbody input[type='checkbox']");
    $('#check_all').click(function(){
        checkbox.attr('checked', $(this).is(':checked'));
        if($(this).is(':checked')){
            $("#main_table tbody tr").addClass('check');
        }else{
            $("#main_table tbody tr").removeClass('check');
        }
    });
    checkbox.click(function(e){
        if($(this).is(':checked')){
            $(this).parents('tr').addClass('check');
        }else{
            $(this).parents('tr').removeClass('check');
        }
        if($("#main_table tbody input[type='checkbox']:not(:checked)").size()>0){
            $('#check_all').attr('checked', false);
        }else{
            $('#check_all').attr('checked', true);
        }
        e.stopPropagation();//停止事件的传播，阻止它被分派到其他 Document 节点
    });

    $('#main_table tbody tr').click(function(){
        var cb = $(this).find(":checkbox");
        if(cb.size()>0)
            cb[0].click();
    });

});

function checksubmit(form,action){
    if($("#main_table tbody input[type='checkbox']:checked").size()<1){
        alert('请选择记录');
        return false;
    }
    index = document.getElementById(action).selectedIndex;
    str = document.getElementById(action).options[index].text.substr(3);
    if(confirm('确定要执行'+str+'吗?')){
        document.getElementById(form).submit();
    }
    return false;
}