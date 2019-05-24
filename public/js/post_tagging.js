
function check(){
    clear();
    let key = $('#tags').val().replace(/\s+/g,' ').trim();
    if(!key == ''){
        $.get("/admin/tags/return/key/"+key, function(data, status){
            display(data)
        })
    }else{
        $('.tags-container div').html('');
    }
}

function display(data){
    let tags = '';
    for(let i = 0; i< data.length;i++){
        curr_data = data[i];


        tags += '<div onclick="addToIncluded('+curr_data.id+', \''+curr_data.name+'\')" class="col-lg-6 mb-3">';
        tags += '<div class="text-primary card tag-card b-none pad-small c-pointer shadowed b-radius-1000 card-body">';
        tags += '<small class="text-center mb-0 text-primary tag-name">';
        tags += '<i class="fas fa-tag"></i><b> '+curr_data.name+'</b>';
        tags += '</small>';
        tags += '</div>';
        tags += '</div>';


    }
    $('.tags-container div').html(tags);
}

function clear(){
    $('.tags-container div').html('');
}

let included_ids = [];
let included_names = [];

function addToIncluded(id, name) {
    if(!included_ids.includes(id)){
        included_ids.push(id);
        included_names.push(name);

        refreshIncluded();
    }
}

function removeFromIncluded(id, name){
    let id_index = included_ids.indexOf(id);
    let name_index = included_names.indexOf(name);

    if(id_index>-1 && name_index>-1){
        included_ids.splice(id_index, 1);
        included_names.splice(name_index, 1);
    }
    refreshIncluded();
}

function refreshIncluded(){
    let content = '';
    for(let i = 0; i< included_names.length; i++){

        content += '<div onclick="removeFromIncluded('+included_ids[i]+', \''+included_names[i]+'\')" class="col-lg-6 mb-3">';
        content += '<div class="text-primary card tag-card b-none pad-small c-pointer shadowed b-radius-1000 card-body">';
        content += '<small class="text-center mb-0 text-primary tag-name">';
        content += '<i class="fas fa-tag"></i><b> '+included_names[i]+'</b>';
        content += "<input type='hidden' name='tags[]' value='"+included_ids[i]+"'>";
        content += '</small>';
        content += '</div>';
        content += '</div>';
    }
    $('#included-tags div').html(content);
}