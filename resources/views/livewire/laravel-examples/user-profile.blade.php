<div class="body-content">
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="mb-0">{{ translate('Profile Information') }}</h6>
                    </div>
                    <div class="col-md-8 col-sm-12 d-none d-md-block">
                        <div style='min-height:60px;'>
                        <a href="{{ env('ADVERTISE1_LINK') }}">
                                <img src="{{ asset('uploads/' . env('ADVERTISE1_URL'))}}"
                                    class="w-100"
                                    />
                                </a>   
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body pt-4 p-3">
                @if ($showSuccesNotification)
                <div wire:model="showSuccesNotification" class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
                    <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
                    <span class="alert-text text-white">{{ translate('Your profile information have been successfuly saved!') }}</span>
                    <button wire:click="$set('showSuccesNotification', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
                @endif
                <div class="row">
                    <div class="col-md-9">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link {{$tabs_id == 1 ? 'active' : ''}}" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" 
                                    aria-selected="true">{{ translate('My Profile')}}</button>
                                @if($user->id==Auth::id())
                                <button class="nav-link {{$tabs_id == 2 ? 'active' : ''}}" id="share-tab" data-bs-toggle="tab" data-bs-target="#share" type="button" role="tab" aria-controls="share" 
                                    aria-selected="false">{{ translate('Share')}}</button>
                                @endif
                                <button class="nav-link {{$tabs_id == 3 ? 'active' : ''}}" id="upload-tab" data-bs-toggle="tab" data-bs-target="#upload" type="button" role="tab" aria-controls="upload" 
                                    aria-selected="false">{{ ($user->id==Auth::id()) ? translate('My Courses') : translate('Uploaded course')}}</button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade {{$tabs_id == 1 ? 'show active' : ''}} pt-3" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <form wire:submit.prevent="save" action="#" method="POST" role="form text-left">
                                    <div class="row">
                                        <div class="col-md-4 pt-4 text-center">
                                            <div class="row d-flex justify-content-center">
                                                <img style='width:180px; cursor:pointer;' 
                                                    class="d-flex justify-content-center"
                                                    id="user_photo_img"
                                                    @if($user->id==Auth::id())
                                                        onclick="$('#photo').trigger('click');"
                                                    @endif
                                                    @if ($user_edit_photo)
                                                        src="{{ $user_edit_photo->temporaryUrl() }}"
                                                    @elseif ($user_photo)
                                                        src="{{ userphoto($user_photo) }}"
                                                    @endif
                                                    />
                                                <input wire:model="user_edit_photo" type='file' name="photo" id="photo" style='display:none;'>
                                                @error('user_photo') <span class="error row">{{ translate($message) }}</span> @enderror
                                            </div>    
                                            @if($user->id!=Auth::id())
                                            <div class="row pt-3 text-primary">
                                                <a href="{{ route('send-message', $user_name) }}" class="text-xs">{{ sprintf(translate( 'Send Message to %s'), $user->name) }}</a>
                                            </div>    
                                            @endif
                                        </div>   
                                        <div class="col-md-8">                        
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="user-name" class="form-control-label">{{ translate('Full Name') }}</label>
                                                        <div class="@error('user_name')border border-danger rounded-3 @enderror">
                                                            @if($user->id!=Auth::id())
                                                                <span wire:model="user_name" class="form-control" 
                                                                    type="text" placeholder="{{translate('Name')}}" id="user-name" >{{ $user_name }}</span>
                                                            @else
                                                                <input wire:model="user_name" class="form-control" 
                                                                    type="text" placeholder="{{translate('Name')}}" id="user-name" />
                                                            @endif
                                                        </div>
                                                        @error('user_name') <div class="text-danger">{{ translate($message) }}</div> @enderror
                                                    </div>
                                                </div>

                                                @if( ($user->id==Auth::id()) || (Auth::user()->role=='admin') || !empty($hide_email) )
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="user-email" class="form-control-label">{{ translate('Email') }}</label>
                                                        <div class="@error('user_email') border border-danger rounded-3 @enderror">
                                                        @if( $user->id==Auth::id())
                                                            <input wire:model="user_email" class="form-control" type="email" placeholder="you@example.com" id="user-email"
                                                                @if($user->id!=Auth::id())
                                                                    readonly
                                                                @endif
                                                                 />
                                                        @else
                                                            <span wire:model="user_email" class="form-control" type="email" placeholder="you@example.com" id="user-email"
                                                                    >{{ $user_email }}</span>
                                                        @endif
                                                        </div>
                                                        @if($user->id==Auth::id())
                                                        <label class="form-control-label cursor-pointer" >
                                                            <span class="mt-1 px-1"><input type="checkbox" wire:model="hide_email" value='1' /></span>
                                                            <span class="mt-1 px-1">{{ translate('Hide to another users.') }}</span>
                                                        </label>
                                                        @endif
                                                        @error('user_email') <div class="text-danger">{{ translate($message) }}</div> @enderror
                                                    </div>
                                                </div>
                                                @endif
                                           
                                                @if( ($user->id==Auth::id()) || (Auth::user()->role=='admin') || !empty($hide_phone) )
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="user_phone" class="form-control-label">{{ translate('Phone') }}</label>
                                                        <div class="@error('user_phone') border border-danger rounded-3 @enderror">
                                                        @if( $user->id==Auth::id())
                                                            <input wire:model="user_phone" class="form-control" 
                                                                @if($user->id!=Auth::id())
                                                                    readonly
                                                                @endif
                                                                type="tel" placeholder="40770888444" id="phone" />
                                                        @else
                                                            <span wire:model="user_phone" class="form-control" 
                                                                    type="tel" placeholder="40770888444" id="phone" >
                                                                    {{ $user_phone }}</span>
                                                        @endif
                                                        </div>
                                                        @if($user->id==Auth::id())
                                                        <label class="form-control-label cursor-pointer" >
                                                            <span class="mt-1 px-1"><input type="checkbox" wire:model="hide_phone" value='1' /></span>
                                                            <span class="mt-1 px-1">{{ translate('Hide to another users.') }}</span>
                                                        </label>
                                                        @endif
                                                        @error('user_phone') <div class="text-danger">{{ translate($message) }}</div> @enderror
                                                    </div>
                                                </div>
                                                @endif

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="user_location" class="form-control-label">{{ translate('University')}}</label>
                                                        <div class="@error('user_location') border border-danger rounded-3 @enderror">
                                                        @if( $user->id==Auth::id())
                                                            <select wire:model="user_university" class="form-control" name="user_university" id="user_university">
                                                            <option value=''>{{translate('Select the university')}}</option>
                                                            @foreach($university_options as $univ)
                                                            <option value="{{ $univ->id }}">{{ ln($univ)??$univ->mainname }}</option>
                                                            @endforeach
                                                            </select>
                                                        @else
                                                        <span wire:model="user_university" class="form-control" name="user_university" id="user_university"
                                                            style='min-height:1.3rem;'
                                                            >
                                                            {{ !empty($user->university) ? $user->university->mainname : '' }}
                                                            <!-- @foreach($university_options as $univ)
                                                                {{ $user_university==$univ->id ? (ln($univ)??$univ->mainname) : '' }}
                                                            @endforeach -->
                                                            </span>
                                                        @endif
                                                        </div>
                                                        @error('user_location') <div class="text-danger">{{ translate($message) }}</div> @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="about">{{ 'About Me' }}</label>
                                                <div class="@error('user_about')border border-danger rounded-3 @enderror">
                                                @if( $user->id==Auth::id())
                                                    <textarea wire:model="user_about" class="form-control" id="about" rows="3" 
                                                        @if($user->id!=Auth::id())
                                                            readonly
                                                        @endif
                                                        placeholder="{{translate('Say something about yourself')}}"></textarea>
                                                @else
                                                <span wire:model="user_about" class="form-control" id="about" rows="3" 
                                                        placeholder="{{translate('Say something about yourself')}}"
                                                        style='min-height:4rem;'
                                                        >
                                                        {{  $user_about  }}
                                                    </span>
                                                @endif
                                                </div>
                                                @error('user_about') <div class="text-danger">{{ translate($message) }}</div> @enderror
                                            </div>

                                            <div class="d-flex justify-content-center">
                                                @if($user->id==Auth::id())
                                                    <button type="submit" class="btn btn-primary mt-4 mb-4 mx-2">{{ translate('Save') }}</button>
                                                @else
                                                    <!-- <a href="{{ route('collection-shared-forme') }}" class="btn btn-secondary mt-4 mb-4 mx-2">{{ translate('Shared Collections for me') }}</a> -->
                                                    <!-- <a href="{{ route('send-message', $user_email) }}" class="btn btn-secondary mt-4 mb-4 mx-2">{{ translate('Send Message') }}</a> -->
                                                @endif
                                            </div>
                                        </div>
                                        
                                    </div>
                                </form>
                            </div>

                            @if($user->id==Auth::id())
                            <!-- #################### shared for Me ######################## -->
                            <div class="tab-pane fade {{$tabs_id == 2 ? 'show active' : ''}} pt-3" id="share" role="tabpanel" aria-labelledby="share-tab">
                                <table class="align-items-center mb-0 w-100" id='all-course-table'>
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center" >
                                                {{ translate('ID')}}
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">
                                                {{ translate('User Name')}}
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">
                                                {{ translate('Collection Name')}}
                                            </th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                {{ translate('Number of Files')}}
                                            </th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                {{ translate('Added Date')}}
                                            </th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
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
                                        @endif

                                        @foreach($pagination as $row)
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
                                            <span  data-bs-toggle="tooltip" 
                                                    wire:click="$emit('share_url', '{{$row->id}}', '{{$skey}}')"
                                                    onclick="shareme( '{{route('collection-shares', $skey )}}' )"
                                                    data-bs-original-title="{{translate('copy shared url')}}"
                                                    class="mx-1" >
                                                    <i class="cursor-pointer fa fa-copy text-secondary"></i>
                                                </span>
                                            
                                                <a  data-bs-toggle="tooltip" 
                                                    href="{{route('send-message', $row->coll->owner->email)}}"
                                                    data-bs-original-title="{{translate('send message to this user.')}}"
                                                    class="mx-1" >
                                                    <i class="cursor-pointer fa fa-envelope text-secondary"></i>
                                                </a>
                                            
                                                <a href="{{route('collection-files', $row->coll->id)}}" 
                                                    class="mx-1" 
                                                    data-bs-toggle="tooltip"
                                                    data-bs-original-title="collection files"
                                                    >
                                                    <i class="cursor-pointer fas fa-list-ul text-secondary"></i>
                                                </a>
                                                <span  data-bs-toggle="tooltip" data-bs-original-title="{{translate('delete this collection share')}}"
                                                        class="mx-1" 
                                                        data-id='{{$row->id}}'  onclick="ConfirmFunction('{{ translate('Are you sure to delete this collection?')}}', stopShareCollection, '{{$row->id}}')">
                                                    <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                                </span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>  
                                <div class="align-items-center justify-content-center mt-5 mb-0 w-100 text-center" >
                                    <button type="button" class="btn btn-primary" onclick="location.href='{{route('message')}}'">
                                                    {{ translate("Send Message") }}
                                                </button>
                                                </div>
                            </div>
                            @endif


                            <!-- #################### My Upload courses ######################## -->
                            <div class="tab-pane fade {{$tabs_id == 3 ? 'show active' : ''}} pt-3" id="upload" role="tabpanel" aria-labelledby="upload-tab">
                                <ul class="list-group">
                                    @foreach($myUpload_courses as $course)
                                    <li class="list-group-item border-0 d-flex  flex-column p-md-3 p-lg-4 p-2 mb-2 bg-gray-100 border-radius-lg">
                                        <div class="row">
                                            <div class="col-8 d-flex flex-column">
                                                <h6 class="mb-3 text-sm">{{ $course->title }}</h6>
                                                <span class="mb-2 text-xs">{{ translate('User Name:' )}}<span
                                                        class="text-dark font-weight-bold ms-2">{{ $course->creator->name }}</span></span>
                                                <span class="mb-2 text-xs">{{ translate('Email Address:' )}} <span
                                                        class="text-dark ms-2 font-weight-bold">{{ $course->creator->email }}</span></span>
                                                <span class="mb-2 text-xs">{{ translate('University:' )}} <span
                                                        class="text-dark ms-2 font-weight-bold">{{ $course->creator->location }}</span></span>
                                            </div>
                                            <div class="col-4 text-right">
                                                <a class="btn btn-link text-danger text-gradient px-1 mb-0" 
                                                    onclick="ConfirmFunction('{{ translate('Are you sure to delete this uploaded course?')}}', deleteUploadedCourse, '{{$course->id}}')"
                                                            href="javascript:;"><i
                                                        class="far fa-trash-alt me-2"></i>Delete</a>
                                                @if($course->status==0)
                                                <br>
                                                <span class="text-info">waiting for approval</span>
                                                @endif
                                                
                                            </div>
                                            </div>
                                            <div class="row d-flex align-items-center">
                                            <div class="col-9">
                                                <span class="mb-2 text-xs">File: <span
                                                        class="text-dark font-weight-bold me-3">{{ filetypename($course->filetype) }}</span></span>
                                                <span class="mb-2 text-xs">size: <span
                                                        class="text-dark me-3 font-weight-bold">{{size($course->filesize)}}</span></span>
                                                <span class="mb-2 text-xs">uploaded date: <span
                                                        class="text-dark me-3 font-weight-bold"> {{ agotime($course->created_at) }}</span></span>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                                <div class="align-items-center justify-content-center mt-5 mb-0 w-100 text-center" >
                                    <button type="button" class="btn btn-primary" onclick="location.href='{{route('course-material')}}'">
                                                    {{ translate("Uplaod File") }}
                                                </button>
                                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-none d-md-block">
                        <div style='min-height:50vh;'>
                            <a href="{{ env('ADVERTISE2_LINK') }}">
                                <img src="{{ asset('uploads/' . env('ADVERTISE2_URL'))}}"
                                    class="w-100"
                                    />
                                </a>                                
                        </div>
                    </div>
                </div>
  
            </div>
        </div>
    </div>
</div>
<input id='copy_sharekey' type='text' value='' style='position:absolute;left:-100px; top:-100px;' />

<script>
    var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>

<script>
    function shareme(share_url)
    {
        document.getElementById("copy_sharekey").value=share_url;
        document.getElementById("copy_sharekey").select();
        document.execCommand('copy');
        alert("you can share this collection as following url: \r\n" + document.getElementById("copy_sharekey").value);
    }
        
    function stopShareCollection(del_id)
    {
        window.livewire.emit('stopShareCollection', del_id);
    }

    function deleteUploadedCourse(course_id)
    {
        window.livewire.emit('delete_course', course_id);
    }

    $(document).ready( function() {
        setTimeout(function() {
            $('#user-name').focus();$('#user-name').select();
        }, 100);
    });
</script>