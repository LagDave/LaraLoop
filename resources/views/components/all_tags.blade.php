<div class="card-header">
    <span class="text-primary"><i class="fas fa-tags"></i> Tags</span>
</div>

<div class="card-body">
    @foreach($tags as $tag)
        <span style="display: inline-block; margin-right: 5px;">
            <a  class='text-primary card tag-card b-none pad-small c-pointer shadowed b-radius-1000 card-body' href="">
                <small style="font-size:.7em" class="ml-1 text-center mb-0 text-primary tag-name">
                    <b>{{$tag->name}}</b>
                </small>
            </a>
        </span>
    @endforeach
</div>


<script>
    let tag_names = document.querySelectorAll('.tag-name b');
    tag_names.forEach((e)=>{
        e.innerText = e.innerText.substr(0, 3)+' ...';
    })
</script>

