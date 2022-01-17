<div class="card">
    <div class="card-header pb-0 px-3">
        <h6 class="mb-0">{{ translate('Translated Course') }}</h6>
    </div>
    <div class="card-body pt-4 p-3">
        <ul class="list-group">
            @foreach($new_courses as $course)
            <li class="list-group-item border-0 d-flex p-md-3 p-lg-4 p-2 mb-2 bg-gray-100 border-radius-lg">
                <div class="d-flex flex-column w-100">
                    <div class="d-flex mb-3 justify-content-between w-100">
                        <span class="text-sm text-dark ">{{ translate('Course Title:') }}</span>
                        <span class="text-sm ">{{$course->course->title}}</span>
                        <span class="text-sm ">{{$course->title}}</span>
                    </div>
                    <div class="row align-items-end">
                        <div class="col-8 d-flex flex-column">
                            <span class="mb-2 text-xs">Translator Name: <span
                                    class="text-dark font-weight-bold ms-2">
                                    <a href="{{route('user-profile', 'user_id='.$course->created_by)}}">
                                    {{$course->creator->name}}</a></span></span>
                            <span class="mb-2 text-xs">Email Address: <span
                                    class="text-dark ms-2 font-weight-bold">{{$course->creator->email}}</span></span>
                            <span class="text-xs">Translated date: <span
                                    class="text-dark ms-2 font-weight-bold">{{agotime($course->created_at)}}</span></span>
                            <span class="mb-2 text-xs">Language: <span
                                class="text-dark font-weight-bold ms-2">{{$course->language}}</span></span>
                        </div>

                        <div class="col-4 d-flex">
                            <a class="btn btn-link text-dark px-1 px-md-2 px-lg-3 mb-0" 
                                wire:click.prevent="$emit('ShowMaterialModal', {{$course->course->id}})"
                                ><i class="far fa-eye me-2"></i>View</a>
                <!-- href="{{route('translate-course') . '?id=' . $course->course->id}}" -->
                            <a class="btn btn-link text-dark px-1 px-md-2 px-lg-3 mb-0" 
                                onclick="ConfirmFunction('{{ translate('Are you sure to agree this course translation?')}}', agreeTranslatedCourse, '{{$course->id}}')"
                                ><i
                                    class="fas fa-check text-dark me-2" aria-hidden="true"></i>Agree</a>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>

<script>
    function agreeTranslatedCourse(course_id)
    {
        window.livewire.emit('agree_translate', course_id);
    }
</script>