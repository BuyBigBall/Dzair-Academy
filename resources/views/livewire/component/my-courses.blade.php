<div>
    <ul class="list-group">
        @foreach($myUpload_courses as $course)
        <li
            class="list-group-item border-0 d-flex  flex-column p-md-3 p-lg-4 p-2 mb-2 bg-gray-100 border-radius-lg">
            <div class="row">
                <div class="col-8 d-flex flex-column">
                    <h6 class="mb-3 text-sm">{{ $course->title }}</h6>
                    <span class="mb-2 text-xs">{{ translate('User Name:' )}}
                        <span class="text-dark font-weight-bold ms-2">{{ $course->creator->name }}</span>
                    </span>
                    @if( !empty(Auth::id()) && ($user_self->id==Auth::id() ||
                    Auth::user()->role=='admin') || !!empty($hide_email) )
                    <span class="mb-2 text-xs">{{ translate('Email Address:' )}}
                        <span class="text-dark ms-2 font-weight-bold">{{ $course->creator->email }}</span>
                    </span>
                    @endif
                    <span class="mb-2 text-xs">{{ translate('University:' )}}
                        <span class="text-dark ms-2 font-weight-bold">{{ $course->creator->location }}</span>
                    </span>
                </div>

                @if( !empty(Auth::id()) && Auth::user()->role=='admin' )
                <div class="col-4 text-right">
                    <a
                        class="btn btn-link text-secondary px-1 mb-0 text-xs"
                        onclick="ConfirmFunction('{{ translate('Are you sure to delete this uploaded course?')}}', deleteUploadedCourse, '{{$course->id}}')"
                        href="javascript:;">
                        <i class="far fa-trash-alt me-2 text-sm"></i>Delete</a>
                    @if($course->status==0)
                    <br>
                        <span class="text-info text-sm">waiting for approval</span>
                        @endif

                    </div>
                    @endif
                </div>
                <div class="row d-flex align-items-center">
                    <div class="col-9">
                        <span class="mb-2 text-xs">File:
                            <span class="text-dark font-weight-bold me-3">{{ filetypename($course->filetype) }}</span>
                        </span>
                        <span class="mb-2 text-xs">size:
                            <span class="text-dark me-3 font-weight-bold">{{size($course->filesize)}}</span>
                        </span>
                        <span class="mb-2 text-xs">uploaded date:
                            <span class="text-dark me-3 font-weight-bold">
                                {{ agotime($course->created_at) }}</span>
                        </span>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    <div
        class="align-items-center justify-content-center mt-5 mb-0 w-100 text-center">
        <button
            type="button"
            class="btn btn-primary"
            onclick="location.href='{{route('course-material')}}'">
            {{ translate("Uplaod File") }}
        </button>
    </div>
</div>
