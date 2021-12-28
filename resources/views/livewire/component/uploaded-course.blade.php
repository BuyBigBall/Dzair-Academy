<div class="card">
    <div class="card-header pb-0 px-3">
        <h6 class="mb-0">{{ translate('Uplpoaded course' )}}</h6>
    </div>
    <div class="card-body pt-4 p-3">
        <ul class="list-group">
        @foreach($new_courses as $course)
            <li class="list-group-item border-0 d-flex  flex-column p-4 mb-2 bg-gray-100 border-radius-lg">
            <div class="d-flex">
                <div class="d-flex flex-column">
                    <h6 class="mb-3 text-sm">{{ $course->title }}</h6>
                    <span class="mb-2 text-xs">{{ translate('User Name:' )}}<span
                            class="text-dark font-weight-bold ms-2">{{ $course->creator->name }}</span></span>
                    <span class="mb-2 text-xs">{{ translate('Email Address:' )}} <span
                            class="text-dark ms-2 font-weight-bold">{{ $course->creator->email }}</span></span>
                    <span class="mb-2 text-xs">{{ translate('Univercity:' )}} <span
                            class="text-dark ms-2 font-weight-bold">{{ $course->creator->location }}</span></span>
                    <!-- <span class="text-xs">File: <span
                            class="text-dark ms-2 font-weight-bold">zip 12.3K  uploaded date : 2021-12-5 12:32</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="#">download</a></span> -->
                </div>
                <div class="ms-auto">
                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" 
                        onclick="ConfirmFunction('{{ translate('Are you sure to delete this uploaded course?')}}', deleteUploadedCourse, '{{$course->id}}')"
                                href="javascript:;"><i
                            class="far fa-trash-alt me-2"></i>Delete</a>
                    <a class="btn btn-link text-dark px-3 mb-0" 
                        onclick="ConfirmFunction('{{ translate('Are you sure to agree this uploaded course?')}}', agreeUploadedCourse, '{{$course->id}}')"
                        ><i
                            class="fas fa-check text-dark me-2" aria-hidden="true"></i>Agree</a>
                </div>
                </div>
                <div class="d-flex align-items-center">
                <div class="d-flex">
                    <span class="mb-2 text-xs">File: <span
                            class="text-dark font-weight-bold me-3">{{ filetypename($course->filetype) }}</span></span>
                    <span class="mb-2 text-xs">size: <span
                            class="text-dark me-3 font-weight-bold">{{size($course->filesize)}}</span></span>
                    <span class="mb-2 text-xs">uploaded date: <span
                            class="text-dark me-3 font-weight-bold"> {{ agotime($course->created_at) }}</span></span>
                </div>
                <div class="ms-auto">
                    <a class="btn btn-link text-secondary px-3 mb-0" 
                        wire:click.prevent="$emit('download', {{$course->id}})"
                        href="javascript:;"><i
                            class="fa fa-download"></i></a>
                </div>
            </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>

<script>
    function agreeUploadedCourse(course_id)
    {
        window.livewire.emit('agree_course', course_id);
    }
    function deleteUploadedCourse(course_id)
    {
        window.livewire.emit('delete_course', course_id);
    }
</script>