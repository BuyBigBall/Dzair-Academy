<div class="form-group d-flex align-items-center">
    <label class="d-inline me-3">Views</label>
    <select class="form-control">
        <option value="20"  @if($perPage==20)  selected @endif >20</option>
        <option value="50"  @if($perPage==50)  selected @endif >50</option>
        <option value="100" @if($perPage==100) selected @endif >100</option>

    </select>
</div>

@if( $pagination->lastPage()>1)
    <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-end">
        <li class="page-item @if($pagination->currentPage()==1) disabled @endif">
        <a class="page-link" href="{{$pagination->path().'?page='.( ($pagination->currentPage() - $pagination->perPage())<=0 ? 1 :  ($pagination->currentPage() - $pagination->perPage()) )}}" tabindex="-1">
            <i class="fa fa-angle-left"></i>
            <span class="sr-only">Previous</span>
        </a>
        </li>

        @for($i=0; $i< $pagination->lastPage(); $i++)
        <li class="page-item 
            @if($i==$pagination->currentPage()-1)  
            active 
            @endif
            "><a class="page-link" href="{{$pagination->path().'?page='.($i+1)}}">{{($i+1)}}</a></li>
        @endfor
        <li class="page-item  @if($pagination->currentPage()==$pagination->lastPage()) disabled @endif">
        <a class="page-link" href="{{$pagination->path().'?page='.(   ($pagination->currentPage() + $pagination->perPage())>$pagination->lastPage() ? $pagination->lastPage() : ($pagination->currentPage() + $pagination->perPage())    )}}">
            <i class="fa fa-angle-right"></i>
            <span class="sr-only">Next</span>
        </a>
        </li>
    </ul>
    </nav>
    @endif