let tag_names = document.querySelectorAll('.tag-name b');
tag_names.forEach((tag_name)=>{
    tag_name.innerHTML = '<b>'+tag_name.innerText.slice(0, 8)+' ...</b>';
});