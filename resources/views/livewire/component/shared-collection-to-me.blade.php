<div>
    <table class="align-items-center mb-0 w-100" id='all-course-table'>
        <thead>
            <tr>
                <th
                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                    {{ translate('ID')}}
                </th>
                <th
                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">
                    {{ translate('User Name')}}
                </th>
                <th
                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">
                    {{ translate('Collection Name')}}
                </th>
                <th
                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    {{ translate('Number of Files')}}
                </th>
                <th
                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    {{ translate('Added Date')}}
                </th>
                <th
                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    {{ translate('Action')}}
                </th>
            </tr>
        </thead>
        <tbody>
            @if(count($pagination)<=0)
            <tr>
                <td colspan="20" class="text-xs ps-3 pt-2 text-center">
                    {{ translate('no collections shared for me.') }}
                </td>
            </tr>
            @endif @foreach($pagination as $row)
            <tr>
                <td class="text-center">
                    <p class="text-xs font-weight-bold mb-0 ">{{$row->id}}</p>
                </td>
                <td>
                    <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">{{$row->coll->owner->name}}</p>
                    </div>
                </td>
                <td>
                    <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">{{$row->coll->collection_name}}</p>
                    </div>
                </td>
                <td class="text-center">
                    <p class="text-xs font-weight-bold mb-0">
                        {{ $row->coll->course!=null ? count($row->coll->course) : 0}}</p>
                </td>
                <td class="text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ $row->created_at }}</span>
                </td>
                <?php $skey = $row->publish_key ? $row->publish_key : str_replace('/', '', str_replace('$', '', Illuminate\Support\Facades\Hash::make($row->id))); ?>
                <td class="text-center">
                    <span
                        data-bs-toggle="tooltip"
                        wire:click="$emit('share_url', '{{$row->id}}', '{{$skey}}')"
                        onclick="shareme( '{{route('collection-shares', $skey )}}' )"
                        data-bs-original-title="{{translate('copy shared url')}}"
                        class="mx-1">
                        <i class="cursor-pointer fa fa-copy text-secondary"></i>
                    </span>

                    <a
                        data-bs-toggle="tooltip"
                        href="{{route('send-message', $row->coll->owner->email)}}"
                        data-bs-original-title="{{translate('send message to this user.')}}"
                        class="mx-1">
                        <i class="cursor-pointer fa fa-envelope text-secondary"></i>
                    </a>

                    <a
                        href="{{route('collection-files', $row->coll->id)}}"
                        class="mx-1"
                        data-bs-toggle="tooltip"
                        data-bs-original-title="collection files">
                        <i class="cursor-pointer fas fa-list-ul text-secondary"></i>
                    </a>
                    @if( !empty(Auth::id()) && Auth::user()->role=='admin' )
                    <span
                        data-bs-toggle="tooltip"
                        data-bs-original-title="{{translate('delete this collection share')}}"
                        class="mx-1"
                        data-id='{{$row->id}}'
                        onclick="ConfirmFunction('{{ translate('Are you sure to delete this collection?')}}', stopShareCollection, '{{$row->id}}')">
                        <i class="cursor-pointer fas fa-trash text-secondary"></i>
                    </span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div
        class="align-items-center justify-content-center mt-5 mb-0 w-100 text-center">
        <button
            type="button"
            class="btn btn-primary"
            onclick="location.href='{{ route('send-message') }}'">
            {{ translate("Send Message") }}
        </button>
    </div>
</div>
<script>
    function shareme(share_url)
    {
        document.getElementById("copy_sharekey").value=share_url;
        document.getElementById("copy_sharekey").select();
        document.execCommand('copy');
        alert("you can share this collection as following url: \r\n" + document.getElementById("copy_sharekey").value);
    }

</script>    
