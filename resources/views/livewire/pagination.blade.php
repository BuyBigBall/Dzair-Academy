
<div class="d-flex align-items-end d-none d-sm-flex justify-content-between py-1">
    <div class="d-flex align-items-center ps-3">
        <label class="d-inline me-0 me-sm-1 me-md-2 me-lg-3">Views</label>
        <select class="form-control me-1 me-sm-2 me-md-3" wire:model="perPage" >
            <option wire:key="2"   @if($perPage===2)   selected @endif >2</option>
            <option wire:key="5"   @if($perPage===5)   selected @endif >5</option>
            <option wire:key="10"  @if($perPage===10)  selected @endif >10</option>
            <option wire:key="20"  @if($perPage===20)  selected @endif >20</option>
            <option wire:key="50"  @if($perPage===50)  selected @endif >50</option>
            <option wire:key="100" @if($perPage===100) selected @endif >100</option>
        </select>
    </div>
    <!-- <select wire:model="curPage" class="form-control" 
            onchange="location.href='{{route($current_route).'?page='}}' + this.value;">
        @for($i=0; $i< $pagination->lastPage(); $i++)
        <option value="{{ $i+1 }}" @if($i==$pagination->currentPage()-1) selected @endif>{{$i+1}} {{translate('page')}}</option>
        @endfor
    </select> -->

</div>

@if( $pagination->lastPage()>1)
    <nav aria-label="Page navigation example" class="align-items-center pe-4">
    <ul class="pagination justify-content-end m-0">
        <li class="page-item px-3  d-none d-sm-block">
            <!-- {{ translate('go to : ') }} -->
            <select wire:model="curPage" class="form-control" onchange="location.href='{{route($current_route).'?page='}}' + this.value;">
                @for($i=0; $i< $pagination->lastPage(); $i++)
                <option value="{{ $i+1 }}" @if($i==$pagination->currentPage()-1) selected @endif>{{$i+1}} {{translate('page')}}</option>
                @endfor
            </select>
        </li>

        <li class="page-item @if($pagination->currentPage()==1) disabled @endif">
        <a class="page-link" href="{{ route($current_route).'?page='.( ($pagination->currentPage() - $pagination->perPage())<=0 ? 1 :  ($pagination->currentPage() - $pagination->perPage()) )}}" tabindex="-1">
            <i class="fa fa-angle-left"></i>
            <span class="sr-only">Previous</span>
        </a>
        </li>
        <?php if($pagination->currentPage()<=3) $i=0;
              else $i=$pagination->currentPage()-3;  ?>
        @for(; $i< $pagination->lastPage(); $i++)
            @if($i<$pagination->currentPage()+2)
            <li class="page-item 
                @if($i==$pagination->currentPage()-1)  
                active 
                @endif
                "><a class="page-link" href="{{route($current_route).'?page='.($i+1)}}">{{($i+1)}}</a></li>
            @endif
        @endfor
        <li class="page-item  @if($pagination->currentPage()==$pagination->lastPage()) disabled @endif">
        <a class="page-link px-2 px-md-3" href="{{route($current_route).'?page='.(   ($pagination->currentPage() + $pagination->perPage())>$pagination->lastPage() ? $pagination->lastPage() : ($pagination->currentPage() + $pagination->perPage())    )}}">
            <i class="fa fa-angle-right"></i>
            <span class="sr-only">Next</span>
        </a>
        </li>
    </ul>
    
        
    </nav>
    @endif